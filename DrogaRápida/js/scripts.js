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
