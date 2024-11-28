$(document).ready(function() {
    $('#submitBtn').click(function() {
        // Coletar os dados do formulário
        const nome = $('#nome').val();
        const email = $('#email').val();
        const promotional_emails = $('#promotional_emails').is(':checked') ? 1 : 0;

        // Enviar os dados via AJAX
        $.ajax({
            url: '../php/submit-consent.php', // Caminho correto para o PHP
            type: 'POST',
            data: {
                nome: nome,
                email: email,
                promotional_emails: promotional_emails
            },
            success: function(response) {
                // Exibir resposta do servidor
                $('#responseMessage').html(response);
                // Limpar o formulário
                $('#newsletterConsentForm')[0].reset();
            },
            error: function(xhr, status, error) {
                $('#responseMessage').html('Ocorreu um erro ao enviar o formulário.');
            }
        });
    });
});
