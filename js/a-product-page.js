const product = window.productData;
if (!product) {
  window.location.href = '404.php';
}
const productView = document.querySelector('.product-view');
productView.querySelector('.main-image').style.backgroundImage = `url(../${product["main-image"]})`;
productView.querySelector('h1').textContent = product.name;
productView.querySelector('.price').textContent = `€${product.price.toFixed(2)}`;
productView.querySelector('.size-options').innerHTML = product.size.map(size => `<div value="${size}">${size}</div>`).join('');
productView.querySelector('.color-options').innerHTML = product.color.map(color => `<div value="${color}" id="${color}" style="background-color: ${color};"></div>`).join('');
productView.querySelector('#quantity-input').value = 1;
productView.querySelector('.thumbnails').innerHTML = product.images.map(image => `<img src="../${image}" alt="Product Image">`).join('');

// thumbnails
{
const thumbnailsContainer = productView.querySelector('.thumbnails');
const thumbnails = thumbnailsContainer.querySelectorAll('img');
const mainImage = productView.querySelector('.main-image');
const leftArrow = productView.querySelector('#arrow-left');
const rightArrow = productView.querySelector('#arrow-right');

let currentScroll = 0;
const scrollAmount = thumbnails[0].clientWidth * 3;

// nav to left
leftArrow.addEventListener('click', () => {
  currentScroll = Math.max(0, currentScroll - scrollAmount);
  thumbnailsContainer.scrollTo({
    left: currentScroll,
    behavior: 'smooth'
  });
});

// nav to right
rightArrow.addEventListener('click', () => {
  currentScroll = Math.min(
    thumbnailsContainer.scrollWidth - thumbnailsContainer.clientWidth,
    currentScroll + scrollAmount
  );
  thumbnailsContainer.scrollTo({
    left: currentScroll,
    behavior: 'smooth'
  });
});

thumbnails.forEach(thumb => {
  thumb.addEventListener('mouseenter', () => {
    mainImage.style.backgroundImage = `url(${thumb.src})`;
    thumbnails.forEach(t => t.classList.remove('selected'));
    thumb.classList.add('selected');
  });
});
}

// size
{
const sizeOptions = productView.querySelector('.size-options');
sizeOptions.addEventListener('click', (e) => {
    if (e.target.tagName === 'DIV') {
        sizeOptions.querySelectorAll('div').forEach(div => div.classList.remove('selected'));
        e.target.classList.add('selected');
    }
    });
}
    
// color
{
const colorOptions = productView.querySelector('.color-options');
colorOptions.addEventListener('click', (e) => {
    if (e.target.tagName === 'DIV') {
        colorOptions.querySelectorAll('div').forEach(div => div.classList.remove('selected'));
        e.target.classList.add('selected');
    }
    const selectedColor = colorOptions.querySelector('.selected');
    if (selectedColor) {
        const color = selectedColor.getAttribute('value');
        const imageName = product.images.find(image => image.includes(color.slice(1))) || product.images[0];
        console.log(color.slice(0,1)+' - '+imageName);
        productView.querySelector('.main-image').style.backgroundImage = `url(../${imageName})`;
    }
});
}

// cantitatea
{
const quantityInput = productView.querySelector('#quantity-input');
const decreaseBtn = productView.querySelector('#decrease-quantity');
const increaseBtn = productView.querySelector('#increase-quantity');
const maxQuantity = product.stock;

// Conversie inițială (asigură că e număr)
let currentQuantity = parseInt(quantityInput.textContent) || 1;

decreaseBtn.addEventListener('click', () => {
  if (currentQuantity > 1) {
    currentQuantity--;
    quantityInput.textContent = currentQuantity;
  }
});

increaseBtn.addEventListener('click', () => {
  if (currentQuantity < maxQuantity) {
    currentQuantity++;
    quantityInput.textContent = currentQuantity;
  }
});
}

// frontend-only wishlist toggle (localStorage favorites)
// ...existing code...

// Helpers pentru favorites
function getFavorites() {
    const favStr = localStorage.getItem('favorites');
    if (!favStr) return [];
    try {
        return JSON.parse(favStr);
    } catch {
        return [];
    }
}
function saveFavorites(favs) {
    localStorage.setItem('favorites', JSON.stringify(favs));
}

// Wishlist toggle
{
    const wishlistBtn = document.querySelector('.wishlist-togle');

    function updateWishlistBtn() {
        const favs = getFavorites();
        const isFav = favs.some(item => item.id === product.id);
        wishlistBtn.classList.toggle('active', isFav);
        wishlistBtn.querySelector('img').style.filter = isFav ? 'grayscale(0)' : 'grayscale(1)';
        wishlistBtn.firstChild.textContent = isFav ? 'REMOVE FROM WISHLIST' : 'ADD TO WISHLIST';
    }

    wishlistBtn.addEventListener('click', () => {
        let favs = getFavorites();
        const index = favs.findIndex(item => item.id === product.id);
        if (index !== -1) {
            favs.splice(index, 1);
        } else {
            favs.push(product);
        }
        saveFavorites(favs);
        updateWishlistBtn();
    });

  updateWishlistBtn();
}


// add to cart
{
  const addToCartBtn = document.querySelector('.add-to-cart');
  addToCartBtn.addEventListener('click', () => {
    const selectedSize = document.querySelector('.size-options .selected');
    const selectedColor = document.querySelector('.color-options .selected');
    const quantity = parseInt(document.getElementById('quantity-input').textContent) || 1;

    if (!selectedSize || !selectedColor) {
      alert('Please select size and color.');
      return;
    }

    const size = selectedSize.getAttribute('value');
    const color = selectedColor.getAttribute('value');

    const colorCode = color.replace('#', '');
    const image = product.images.find(img => img.includes(colorCode)) || product.images[0];

const cartItem = {
  key: `${product.id}_${size}_${color}`,
  id: product.id,
  name: product.name,
  price: product.price,
  size,
  color,
  image,
  quantity
};

let cart = getCart();

const existing = cart.find(item => item.key === cartItem.key);
if (existing) {
  existing.quantity += quantity;
} else {
  cart.push(cartItem);
}

localStorage.setItem('cart', JSON.stringify(cart));

addToCartBtn.textContent = "ADDED!";
setTimeout(() => addToCartBtn.textContent = "ADD TO CART", 1000);
  });
}


// description section
const tabs = document.querySelectorAll('.description-tab');
const contents = document.querySelectorAll('.description-content');

tabs.forEach((tab, index) => {
  tab.addEventListener('click', () => {
    contents[index].classList.toggle('hidden');
    tab.querySelector('span:last-child').textContent = contents[index].classList.contains('hidden') ? '+' : '-';
  });
});
