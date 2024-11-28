document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelector('.slides');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const slideItems = document.querySelectorAll('.slide');
    
    let visibleSlides = 6; // Número de slides visíveis
    let currentSlide = 0;
    const totalSlides = slideItems.length;

    // Função para atualizar a posição dos slides
    function updateSlidePosition() {
        const slideWidth = slideItems[0].offsetWidth + parseInt(getComputedStyle(slideItems[0]).marginRight);
        slides.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
    }

    // Função para mover para o slide anterior
    function moveToPrevSlide() {
        if (currentSlide === 0) {
            currentSlide = totalSlides - visibleSlides; // Vai para o último conjunto de slides visíveis
        } else {
            currentSlide--;
        }
        updateSlidePosition();
    }

    // Função para mover para o próximo slide
    function moveToNextSlide() {
        if (currentSlide >= totalSlides - visibleSlides) {
            currentSlide = 0; // Volta para o primeiro slide
        } else {
            currentSlide++;
        }
        updateSlidePosition();
    }

    // Eventos para os botões
    prevButton.addEventListener('click', moveToPrevSlide);
    nextButton.addEventListener('click', moveToNextSlide);

    // Atualizar o carrossel ao redimensionar a janela
    window.addEventListener('resize', updateSlidePosition);

    // Navegação automática opcional a cada 5 segundos
    setInterval(moveToNextSlide, 5000);
});

