localStorage.setItem('selectedProductId', 'product-1');
// products data comes from server (window.productsData)
let products = window.productsData || {};


//pentru favorite
function getFavorites() {
    const favStr = localStorage.getItem('favorites');
    if (!favStr) return [];
    try {
        const favs = JSON.parse(favStr);
        return Array.isArray(favs) ? favs : [];
    } catch {
        return [];
    }
}
function saveFavorites(favs) {
    localStorage.setItem('favorites', JSON.stringify(favs));
}

// product type droptown
{
const productTypeBtn = document.querySelector('#sort-by-type-button');
const productTypeDropdown = document.getElementById('product-type-dropdown');

productTypeBtn.addEventListener('click', () => {
    const isHidden = productTypeDropdown.classList.contains('hidden');

    if (isHidden) {
        productTypeDropdown.classList.remove('hidden');
    } else {
        productTypeDropdown.classList.add('hidden');
    }
});
const productTypeItems = document.querySelectorAll('.product-type-dropdown .dropdown-item');
productTypeItems.forEach(item => {
    item.addEventListener('click', (event) => {
        const selectedValue = event.currentTarget.getAttribute('data-value');
        document.getElementById('product-type-value').innerHTML =
            selectedValue.charAt(0).toUpperCase() + selectedValue.slice(1);
        productTypeDropdown.classList.add('hidden');
        applyFiltersAndSort();
        // console.log(productTypeDropdown.classList.contains('hidden'));
    });
});
productTypeDropdown.addEventListener('mouseleave', () => {
        productTypeDropdown.classList.add('hidden');
});
productTypeBtn.addEventListener('mouseleave', () => {
        productTypeDropdown.classList.add('hidden');
});
}

// product size dropdown
{
const productSizeBtn = document.querySelector('#sort-by-size-button');
const productSizeDropdown = document.getElementById('size-dropdown');
productSizeBtn.addEventListener('click', () => {
    const isHidden = productSizeDropdown.classList.contains('hidden');

    if (isHidden) {
        productSizeDropdown.classList.remove('hidden');
    } else {
        productSizeDropdown.classList.add('hidden');
    }
});
const productSizeItems = document.querySelectorAll('.size-dropdown .dropdown-item');
productSizeItems.forEach(item => {
    item.addEventListener('click', (event) => {
        const selectedValue = event.currentTarget.getAttribute('data-value');
        document.getElementById('size-value').innerHTML = selectedValue.toUpperCase();
        productSizeDropdown.classList.add('hidden');
        applyFiltersAndSort();
    });
});
productSizeDropdown.addEventListener('mouseleave', () => {
    productSizeDropdown.classList.add('hidden');
    document.body.style.overflow = '';
}
);
productSizeBtn.addEventListener('mouseleave', () => {
    productSizeDropdown.classList.add('hidden');
    document.body.style.overflow = '';
}
);
}

// order by dropdown
{
const orderByBtn = document.querySelector('#order-by-button');
const orderByDropdown = document.getElementById('order-by-dropdown');
orderByBtn.addEventListener('click', () => {
    const isHidden = orderByDropdown.classList.contains('hidden');

    if (isHidden) {
        orderByDropdown.classList.remove('hidden');
    } else {
        orderByDropdown.classList.add('hidden');
    }
});
const orderByItems = document.querySelectorAll('.order-by-dropdown .dropdown-item');
orderByItems.forEach(item => {
    item.addEventListener('click', (event) => {
        let selectedValue = event.currentTarget.getAttribute('data-value');
        selectedValue = selectedValue.split('-');
        document.getElementById('order-by-value').innerHTML =
            selectedValue[0].charAt(0).toUpperCase() + selectedValue[0].slice(1) + ' ' +
            (selectedValue[1] ? selectedValue[1].charAt(0).toUpperCase() + selectedValue[1].slice(1) : '');
        orderByDropdown.classList.add('hidden');
        applyFiltersAndSort();
    });
});
orderByDropdown.addEventListener('mouseleave', () => {
    orderByDropdown.classList.add('hidden');
    document.body.style.overflow = '';
});
orderByBtn.addEventListener('mouseleave', () => {
    orderByDropdown.classList.add('hidden');
    document.body.style.overflow = '';
});
}

function applyFiltersAndSort() {
    const typeFilter = document.getElementById('product-type-value').textContent.toLowerCase();
    const sizeFilter = document.getElementById('size-value').textContent.toUpperCase();
    const sortText = document.getElementById('order-by-value').textContent.toLowerCase();

    let filtered = Object.values(products);

    if (typeFilter !== 'all' && typeFilter !== 'any' && typeFilter !== '') {
        filtered = filtered.filter(p => p.type.toLowerCase() === typeFilter);
    }

    if (sizeFilter !== 'ALL' && sizeFilter !== 'ANY' && sizeFilter !== '') {
        filtered = filtered.filter(p => p.size.includes(sizeFilter));
    }

    // Sortare
    if (sortText.includes('price')) {
        filtered.sort((a, b) => sortText.includes('asc') ? a.price - b.price : b.price - a.price);
    } else if (sortText.includes('rating')) {
        filtered.sort((a, b) => sortText.includes('asc') ? a.rating - b.rating : b.rating - a.rating);
    } else if (sortText.includes('newest')) {
        filtered.sort((a, b) => {
            const dateA = new Date(a['date-added']);
            const dateB = new Date(b['date-added']);
            return dateB - dateA;
        });
    } else if (sortText.includes('oldest')) {
        filtered.sort((a, b) => {
            const dateA = new Date(a['date-added']);
            const dateB = new Date(b['date-added']);
            return dateA - dateB;
        });
    }

    renderFilteredProducts(filtered);
}

function renderFilteredProducts(productsToShow) {
    const container = document.querySelector('.products-cards');
    container.innerHTML = '';
    productsToShow.forEach(product => {
        const card = createProductCard(product);
        container.appendChild(card);
    });
}

function createProductCard(product) {
    const card = document.createElement('div');
    card.classList.add('card');

    const cardImage = document.createElement('div');
    cardImage.classList.add('card-image');
    cardImage.style.backgroundImage = `url('${product['main-image']}')`; 

    const favoriteIcon = document.createElement('div');
    favoriteIcon.classList.add('favorite-icon');
    const favImg = document.createElement('img');
    favImg.src = 'icons/heart_icon_orange.svg';
    favImg.alt = '';

    function updateFavoriteIcon() {
        const favs = getFavorites();
        const isFav = favs.some(item => item.id === product.id);
        favImg.src = isFav ? 'icons/heart_icon_orange_filled.svg' : 'icons/heart_icon_orange.svg';
        favoriteIcon.classList.toggle('active', isFav);
    }
    updateFavoriteIcon();

    favoriteIcon.addEventListener('click', (e) => {
        e.stopPropagation();
        let favs = getFavorites();
        const index = favs.findIndex(item => item.id === product.id);
        if (index !== -1) {
            favs.splice(index, 1);
        } else {
            favs.push(product);
        }
        saveFavorites(favs);
        updateFavoriteIcon();
    });

    favoriteIcon.appendChild(favImg);
    cardImage.appendChild(favoriteIcon);

    const cardDesc = document.createElement('div');
    cardDesc.classList.add('card-description');

    const namePara = document.createElement('p');
    namePara.textContent = product.name;

    const priceSpan = document.createElement('span');
    priceSpan.textContent = `${product.price}€`;

    const addButton = document.createElement('button');
    addButton.textContent = 'Add to cart';
    addButton.addEventListener('click', () => {
        window.location.href = `a-product-page.php?id=${encodeURIComponent(product.id)}`;
    });

    cardDesc.appendChild(namePara);
    cardDesc.appendChild(priceSpan);
    cardDesc.appendChild(addButton);

    card.appendChild(cardImage);
    card.appendChild(cardDesc);

    return card;
}


// frontend-only (favorites saved in localStorage)
function renderProductCards() {
    const container = document.querySelector('.products-cards');
    if (!container) return;

    Object.values(products).forEach(product => {
        const card = createProductCard(product);
        container.appendChild(card);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    renderProductCards();
});
