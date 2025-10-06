localStorage.setItem('selectedProductId', 'product-1');
// product cards
let products = {
    'product-1': {
        'id': 'p1',
        'name': `Breezaya Women Plain Color Spaghetti Strap Tank Top, Fashionable For Summer`,
        'type': 'shirt',
        'size': ['S', 'M', 'L', 'XL'],
        'price': 8.09,
        'main-image': 'products/product-1/main.jpg',
        'images': [
            'products/product-1/000000.jpg',
            'products/product-1/ffffff_1.jpg',
            'products/product-1/ffffff_2.jpg',
            'products/product-1/8B2141.jpg',
            'products/product-1/AB1127.jpg',
            'products/product-1/C3E4C5.jpg',
            'products/product-1/DEB429.jpg',
        ],
        'stock': 21,
        'date-added': '2024-06-05',
        'color': ['#000000', '#ffffff', '#8B2141', '#AB1127', '#C3E4C5', '#DEB429'],
        'rating': 4.88,
        'tags': [
            'summer',
            'shirt',
            'fashion', 
            'casual',
            'comfortable',
            'lightweight',
            'floral',
            'white',
            'cotton',]
    },
    'product-2': {
        'id': 'p2',
        'name': `Green/Pink Contrast Color Letter Star Print Round Neck T-shirt`,
        'type': 't-shirt',
        'size': ['S', 'M', 'L'],
        'price': 14.43,
        'main-image': 'products/product-2/main.webp',
        'images': [
            'products/product-2/B8CE93_1.webp',
            'products/product-2/B8CE93_2.webp',
            'products/product-2/B8CE93_3.webp',
            'products/product-2/F6C8D8_1.webp',
            'products/product-2/F6C8D8_2.webp',
            'products/product-2/F6C8D8_3.webp',
            'products/product-2/other.webp'
        ],
        'stock': 16,
        'date-added': '2024-06-08',
        'color': ['#B8CE93', '#F6C8D8'],
        'rating': 4.75,
        'tags': [
            't-shirt',
            'contrast color',
            'letter print',
            'star print',
            'round neck',
            'casual',
            'comfortable',
            'lightweight',
            'green',
            'pink',
            'cotton blend',
            'summer',
        ]
    },
    'product-3':{
        'id': 'p3',
        'name': `Manfinity EMRG Men's Casual Star & Slogan Print Drawstring Hooded Sweatshirt, Autumn/Winter`,
        'type': 'sweatshirt',
        'size': ['S', 'M', 'L', 'XL', 'XXL'],
        'price': 14.02,
        'main-image': 'products/product-3/main.jpg',
        'images': [
            'products/product-3/000000-1.jpg',
            'products/product-3/000000-2.jpg',
            'products/product-3/000000-3.jpg',
            'products/product-3/000000-4.jpg',
            'products/product-3/000000-5.jpg',
            'products/product-3/A8A8AA-1.jpg',
            'products/product-3/A8A8AA-2.jpg',
            'products/product-3/A8A8AA-3.jpg',
            'products/product-3/A8A8AA-4.jpg',
        ],
        'stock': 6,
        'date-added': '2024-06-01',
        'color': ['#A8A8AA', '#000000'],
        'rating': 3.99,
        'tags': [
            't-shirt',
            'contrast color',
            'letter print',
            'star print',
            'round neck',
            'casual',
            'comfortable',
            'lightweight',
            'green',
            'pink',
            'cotton blend',
            'summer',
        ]
    },

    'product-4':{
        'id': 'p4',
        'name': `Manfinity EMRG Men's Casual Star & Slogan Print Drawstring Hooded Sweatshirt, Autumn/Winter`,
        'type': 'sweatshirt',
        'size': ['S', 'M', 'L', 'XL', 'XXL'],
        'price': 14.02,
        'main-image': 'products/product-3/main.jpg',
        'images': [
            'products/product-3/000000-1',
            'products/product-3/000000-2',
            'products/product-3/000000-3',
            'products/product-3/000000-4',
            'products/product-3/000000-5',
            'products/product-3/000000-6',
            'products/product-3/A8A8AA-1',
            'products/product-3/A8A8AA-2',
            'products/product-3/A8A8AA-3',
            'products/product-3/A8A8AA-4',
            'products/product-3/A8A8AA-5',
        ],
        'stock': 6,
        'date-added': '2024-06-01',
        'color': ['#A8A8AA', '#000000'],
        'rating': 3.99,
        'tags': [
            't-shirt',
            'contrast color',
            'letter print',
            'star print',
            'round neck',
            'casual',
            'comfortable',
            'lightweight',
            'green',
            'pink',
            'cotton blend',
            'summer',
        ]
    },
    'product-5':{
        'id': 'p5',
        'name': `Manfinity EMRG Men's Casual Star & Slogan Print Drawstring Hooded Sweatshirt, Autumn/Winter`,
        'type': 'sweatshirt',
        'size': ['S', 'M', 'L', 'XL', 'XXL'],
        'price': 14.02,
        'main-image': 'products/product-3/main.jpg',
        'images': [
            'products/product-3/000000-1',
            'products/product-3/000000-2',
            'products/product-3/000000-3',
            'products/product-3/000000-4',
            'products/product-3/000000-5',
            'products/product-3/000000-6',
            'products/product-3/A8A8AA-1',
            'products/product-3/A8A8AA-2',
            'products/product-3/A8A8AA-3',
            'products/product-3/A8A8AA-4',
            'products/product-3/A8A8AA-5',
        ],
        'stock': 6,
        'date-added': '2024-06-01',
        'color': ['#A8A8AA', '#000000'],
        'rating': 3.99,
        'tags': [
            't-shirt',
            'contrast color',
            'letter print',
            'star print',
            'round neck',
            'casual',
            'comfortable',
            'lightweight',
            'green',
            'pink',
            'cotton blend',
            'summer',
        ]
    },
    'product-6':{
        'id': 'p6',
        'name': `Manfinity EMRG Men's Casual Star & Slogan Print Drawstring Hooded Sweatshirt, Autumn/Winter`,
        'type': 'sweatshirt',
        'size': ['S', 'M', 'L', 'XL', 'XXL'],
        'price': 14.02,
        'main-image': 'products/product-3/main.jpg',
        'images': [
            'products/product-3/000000-1',
            'products/product-3/000000-2',
            'products/product-3/000000-3',
            'products/product-3/000000-4',
            'products/product-3/000000-5',
            'products/product-3/000000-6',
            'products/product-3/A8A8AA-1',
            'products/product-3/A8A8AA-2',
            'products/product-3/A8A8AA-3',
            'products/product-3/A8A8AA-4',
            'products/product-3/A8A8AA-5',
        ],
        'stock': 6,
        'date-added': '2024-06-01',
        'color': ['#A8A8AA', '#000000'],
        'rating': 3.99,
        'tags': [
            't-shirt',
            'contrast color',
            'letter print',
            'star print',
            'round neck',
            'casual',
            'comfortable',
            'lightweight',
            'green',
            'pink',
            'cotton blend',
            'summer',
        ]
    },
    'product-7':{
        'id': 'p7',
        'name': `Manfinity EMRG Men's Casual Star & Slogan Print Drawstring Hooded Sweatshirt, Autumn/Winter`,
        'type': 'sweatshirt',
        'size': ['S', 'M', 'L', 'XL', 'XXL'],
        'price': 14.02,
        'main-image': 'products/product-3/main.jpg',
        'images': [
            'products/product-3/000000-1',
            'products/product-3/000000-2',
            'products/product-3/000000-3',
            'products/product-3/000000-4',
            'products/product-3/000000-5',
            'products/product-3/000000-6',
            'products/product-3/A8A8AA-1',
            'products/product-3/A8A8AA-2',
            'products/product-3/A8A8AA-3',
            'products/product-3/A8A8AA-4',
            'products/product-3/A8A8AA-5',
        ],
        'stock': 6,
        'date-added': '2024-06-01',
        'color': ['#A8A8AA', '#000000'],
        'rating': 3.99,
        'tags': [
            't-shirt',
            'contrast color',
            'letter print',
            'star print',
            'round neck',
            'casual',
            'comfortable',
            'lightweight',
            'green',
            'pink',
            'cotton blend',
            'summer',
        ]
    },
    'product-8':{
        'id': 'p8',
        'name': `Manfinity EMRG Men's Casual Star & Slogan Print Drawstring Hooded Sweatshirt, Autumn/Winter`,
        'type': 'sweatshirt',
        'size': ['S', 'M', 'L', 'XL', 'XXL'],
        'price': 14.02,
        'main-image': 'products/product-3/main.jpg',
        'images': [
            'products/product-3/000000-1',
            'products/product-3/000000-2',
            'products/product-3/000000-3',
            'products/product-3/000000-4',
            'products/product-3/000000-5',
            'products/product-3/000000-6',
            'products/product-3/A8A8AA-1',
            'products/product-3/A8A8AA-2',
            'products/product-3/A8A8AA-3',
            'products/product-3/A8A8AA-4',
            'products/product-3/A8A8AA-5',
        ],
        'stock': 6,
        'date-added': '2024-06-01',
        'color': ['#A8A8AA', '#000000'],
        'rating': 3.99,
        'tags': [
            't-shirt',
            'contrast color',
            'letter print',
            'star print',
            'round neck',
            'casual',
            'comfortable',
            'lightweight',
            'green',
            'pink',
            'cotton blend',
            'summer',
        ]
    },
    'product-9':{
        'id': 'p9',
        'name': `Manfinity EMRG Men's Casual Star & Slogan Print Drawstring Hooded Sweatshirt, Autumn/Winter`,
        'type': 'sweatshirt',
        'size': ['S', 'M', 'L', 'XL', 'XXL'],
        'price': 14.02,
        'main-image': 'products/product-3/main.jpg',
        'images': [
            'products/product-3/000000-1',
            'products/product-3/000000-2',
            'products/product-3/000000-3',
            'products/product-3/000000-4',
            'products/product-3/000000-5',
            'products/product-3/000000-6',
            'products/product-3/A8A8AA-1',
            'products/product-3/A8A8AA-2',
            'products/product-3/A8A8AA-3',
            'products/product-3/A8A8AA-4',
            'products/product-3/A8A8AA-5',
        ],
        'stock': 6,
        'date-added': '2024-06-01',
        'color': ['#A8A8AA', '#000000'],
        'rating': 3.99,
        'tags': [
            't-shirt',
            'contrast color',
            'letter print',
            'star print',
            'round neck',
            'casual',
            'comfortable',
            'lightweight',
            'green',
            'pink',
            'cotton blend',
            'summer',
        ]
    }
    // Space for more products for future use
}


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
        localStorage.setItem('selectedProduct', JSON.stringify(product));
        window.location.href = 'a-product-page.html';
    });

    cardDesc.appendChild(namePara);
    cardDesc.appendChild(priceSpan);
    cardDesc.appendChild(addButton);

    card.appendChild(cardImage);
    card.appendChild(cardDesc);

    return card;
}


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

