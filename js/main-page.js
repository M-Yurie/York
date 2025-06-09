// caruselul
// Selectori pentru noul carusel
const carousellItems = document.querySelectorAll('.hero-section .carousell-item');
const carousellTrack = document.querySelector('.hero-section .carousell-track');
const leftButton = document.getElementById('hero-section-back-button');
const rightButton = document.getElementById('hero-section-next-button');

let currentIndex = 0;
const totalItems = carousellItems.length;

// Funcția de schimbare a imaginii
function switchImage(index) {
    if (index === currentIndex) return;

    const newTransformValue = -index * 100;
    carousellTrack.style.transform = `translateX(${newTransformValue}%)`;

    // Clasa 'active' pentru efecte vizuale (dacă ai)
    carousellItems[currentIndex].classList.remove('active');
    carousellItems[index].classList.add('active');

    currentIndex = index;
}

// Navigare stânga
leftButton.addEventListener('click', () => {
    const prevIndex = (currentIndex - 1 + totalItems) % totalItems;
    switchImage(prevIndex);
});

// Navigare dreapta
rightButton.addEventListener('click', () => {
    const nextIndex = (currentIndex + 1) % totalItems;
    switchImage(nextIndex);
});

// Auto-schimbare la fiecare 5 secunde
setInterval(() => {
    const nextIndex = (currentIndex + 1) % totalItems;
    switchImage(nextIndex);
}, 8000);



// brand line
const brandsTrack = document.querySelector('.brands-track');
brandsTrack.innerHTML += brandsTrack.innerHTML; // dublează conținutul


// intro section
document.addEventListener("DOMContentLoaded", () => {
  const spans = document.querySelectorAll(".intro-section span");
  const colors = ["pink", "orange", "blue", "green"];

  spans.forEach((span, index) => {
    span.classList.add("fade-in");
    span.style.animationDelay = `${index * 0.2}s`;

    const initialColor = colors[Math.floor(Math.random() * colors.length)];
    span.classList.add(initialColor);
  });

  setInterval(() => {
    spans.forEach(span => {
      colors.forEach(color => span.classList.remove(color));
      const newColor = colors[Math.floor(Math.random() * colors.length)];
      span.classList.add(newColor);
    });
  }, 2000); 
});


// inspo section
const tabs = document.querySelectorAll('.inspo-tab');
const contents = document.querySelectorAll('.inspo-content-exp');

tabs.forEach((tab, index) => {
    tab.addEventListener('click', () => {
        contents.forEach(content => content.classList.remove('visible'));
        tabs.forEach(t => t.classList.remove('active-tab'));

        const selectedContent = document.querySelector(`#inspo-content-exp-${index + 1}`);
        selectedContent.classList.add('visible');
        tab.classList.add('active-tab');
    });
});


