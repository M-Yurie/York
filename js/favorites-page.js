// frontend-only favorites (localStorage)
localStorage.setItem('selectedProductId', 'product-1');

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

// product cards

function renderProductCards() {
    const container = document.querySelector('.products-cards');
    if (!container) return;

    container.innerHTML = '';
    const favs = getFavorites();
    if (favs.length === 0) {
        container.innerHTML = '<p style="padding:2rem;text-align:center;">No favorites yet.</p>';
        return;
    }
    favs.forEach(product => {
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
        renderProductCards(); // actualizează instant lista
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
        window.location.href = 'a-product-page.php';
    });

    cardDesc.appendChild(namePara);
    cardDesc.appendChild(priceSpan);
    cardDesc.appendChild(addButton);

    card.appendChild(cardImage);
    card.appendChild(cardDesc);

    return card;
}

document.addEventListener('DOMContentLoaded', () => {
    renderProductCards();
});
