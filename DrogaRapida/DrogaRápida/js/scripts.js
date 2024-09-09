// Função para validar formulário de contato
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('contatoForm');
    
    if (form) {
        form.addEventListener('submit', function (event) {
            var nome = document.getElementById('nome').value;
            var email = document.getElementById('email').value;
            var mensagem = document.getElementById('mensagem').value;

            if (!nome || !email || !mensagem) {
                alert('Por favor, preencha todos os campos.');
                event.preventDefault(); // Previne o envio do formulário se algum campo estiver vazio
            }
        });
    }
});

let currentIndex = 0;
const slidesToShow = 5; // Número de produtos visíveis ao mesmo tempo

function moveSlide(direction) {
    const slides = document.querySelector('.slides');
    const totalSlides = slides.children.length;
    currentIndex = (currentIndex + direction + totalSlides) % totalSlides;
    slides.style.transform = `translateX(-${currentIndex * (100 / slidesToShow)}%)`;
}

document.querySelector('.prev').addEventListener('click', () => moveSlide(-1));
document.querySelector('.next').addEventListener('click', () => moveSlide(1));

//código da isncrição

document.getElementById('emailForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Impede o envio do formulário padrão
    
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;

    // Envia uma solicitação para o servidor
    fetch('send_email.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}`
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('response').innerText = data;
    })
    .catch(error => {
        document.getElementById('response').innerText = 'Erro ao enviar o email. Tente novamente mais tarde.';
        console.error('Erro:', error);
    });
});