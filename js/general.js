// conectarea
document.getElementById('profile-link').addEventListener('click', function(e) {
    const user = localStorage.getItem('user');
    if (!user) {
        e.preventDefault();
        window.location.href = 'conect-page.html';
    }
});

// header
let lastScrollY = window.scrollY;
let headerHidden = false;

window.addEventListener('scroll', () => {
    const currentScrollY = window.scrollY;
    const scrollDelta = currentScrollY - lastScrollY;

    const header = document.querySelector('.header');

    // Scroll în jos
    if (scrollDelta > 0) {
        if (currentScrollY > 95 && !headerHidden) {
            header.classList.add('hide-header');
            headerHidden = true;
        }
    }

    // Scroll în sus
    if (scrollDelta < 0) {
        if (currentScrollY < lastScrollY - 10 && headerHidden) {
            header.classList.remove('hide-header');
            headerHidden = false;
        }
    }

    lastScrollY = currentScrollY;
});

//search
const searchBtn = document.querySelector('.search-button');
const searchModal = document.getElementById('search-modal');
const searchInput = document.getElementById('search-input');
const searchSubmit = document.getElementById('search-submit');

searchBtn.addEventListener('click', () => {
    searchModal.classList.remove('hidden');
    searchInput.focus();
    document.body.style.overflow = 'hidden';
});
searchModal.addEventListener('click', (e) => {
    if (e.target === searchModal) {
        searchModal.classList.add('hidden');
        document.body.style.overflow = '';
    }
});

// menu
const menuBtn = document.querySelector('.menu-togle');
const menuModal = document.getElementById('menu-modal');
const menuCloseButton = document.getElementById('menu-close-button');
menuBtn.addEventListener('click', () => {
    const isHidden = menuModal.classList.contains('hidden');

    if (isHidden) {
        menuModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    } else {
        menuModal.classList.add('hidden');
        document.body.style.overflow = '';
    }
});
menuCloseButton.addEventListener('click', () => {
    menuModal.classList.add('hidden');
    document.body.style.overflow = '';
});
menuModal.addEventListener('click', (e) => {
    if (e.target === menuModal) {
        menuModal.classList.add('hidden');
        document.body.style.overflow = '';
    }
});

// cosul
const cartButton = document.getElementById('shopbag-button');
const cartModal = document.getElementById('cart-modal');
const cartCloseButton = document.getElementById('cart-close-button');

cartCloseButton.addEventListener('click', () => {
    cartModal.classList.add('hidden');
});
cartModal.addEventListener('click', (e) => {
    if (e.target === cartModal) {
        cartModal.classList.add('hidden');
    }
});
function getCart() {
    const cartStr = localStorage.getItem('cart');
    if (!cartStr) return [];
    try {
        return JSON.parse(cartStr);
    } catch {
        return [];
    }
}
function renderCart() {
    const cartItemsContainer = cartModal.querySelector('.cart-items');
    const cartTotal = document.getElementById('cart-total');
    let cart = getCart();
    let total = 0;

    cartItemsContainer.innerHTML = '';

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p>Your shopping bag is empty.</p>';
    } else {
        cart.forEach(item => {
            total += item.price * item.quantity;
            const div = document.createElement('div');
            div.classList.add('cart-item');
            div.innerHTML = `
                <div class="cart-item-image">
                    <img src="${item.image}" alt="Product Image">
                </div>
                <div class="cart-item-details">
                    <div class="first-row">
                        <span class="cart-item-name">${item.name}</span>
                        <span class="cart-item-price">${(item.price * item.quantity).toFixed(2)}€</span>
                    </div>
                    <div class="second-row">
                        <span class="cart-item-size">Size: ${item.size}</span>
                        <span class="cart-item-color">Color: <div style="background:${item.color};"></div></span>
                    </div>
                    <div class="third-row">
                        <div class="cart-item-quantity">
                            <button class="quantity-decrease" data-key="${item.key}">-</button>
                            <span class="quantity-value">${item.quantity}</span>
                            <button class="quantity-increase" data-key="${item.key}">+</button>
                        </div>
                        <img src="icons/octicon_trash-24.svg" class="remove-from-cart-button" data-key="${item.key}" style="cursor:pointer;">
                    </div>
                </div>
            `;
            cartItemsContainer.appendChild(div);
        });
    }

    cartTotal.textContent = total.toFixed(2) + '€';

    cartItemsContainer.querySelectorAll('.remove-from-cart-button').forEach(btn => {
        btn.addEventListener('click', function() {
            const key = this.getAttribute('data-key');
            let cart = getCart();
            cart = cart.filter(item => item.key !== key);
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCart();
        });
    });

    cartItemsContainer.querySelectorAll('.quantity-decrease').forEach(btn => {
        btn.addEventListener('click', function() {
            const key = this.getAttribute('data-key');
            let cart = getCart();
            const item = cart.find(i => i.key === key);
            if (item && item.quantity > 1) {
                item.quantity--;
                localStorage.setItem('cart', JSON.stringify(cart));
                renderCart();
            }
        });
    });

    cartItemsContainer.querySelectorAll('.quantity-increase').forEach(btn => {
        btn.addEventListener('click', function() {
            const key = this.getAttribute('data-key');
            let cart = getCart();
            const item = cart.find(i => i.key === key);
            if (item) {
                item.quantity++;
                localStorage.setItem('cart', JSON.stringify(cart));
                renderCart();
            }
        });
    });

    document.getElementById('checkout-button').addEventListener('click', ()=>{
    let cart = {};
    localStorage.removeItem('cart');
    cartItemsContainer.innerHTML = '<p>Your shopping bag is empty.</p>';
    });
}
cartButton.addEventListener('click', () => {
    const isHidden = cartModal.classList.contains('hidden');
    if (isHidden) {
        renderCart();
        cartModal.classList.remove('hidden');
    } else {
        cartModal.classList.add('hidden');
    }
});



// footer
const right = document.querySelector('footer .right');
const image = document.querySelector('footer .center img');

if (image && top) {
    const imageHeight = image.offsetHeight;
    right.style.top = `calc(20% + ${imageHeight}px)`;
    window.addEventListener('resize', () => {
        const newImageHeight = image.offsetHeight;
        right.style.top = `calc(20% + ${newImageHeight}px + 20px)`;
    });
}


// Cautare la click
searchSubmit.addEventListener('click', () => {
    const query = searchInput.value.trim();
    if (query) {
        localStorage.setItem('searchQuery', query);
        window.location.href = `products-page.html?search=${encodeURIComponent(query)}`;
    }
});

searchInput.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
        searchSubmit.click();
    }
});