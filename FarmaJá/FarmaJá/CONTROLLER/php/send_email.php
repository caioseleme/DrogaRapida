<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Valida os dados
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($name)) {
        $to = "seuemail@dominio.com"; // Substitua pelo seu endereço de e-mail
        $subject = "Novo interessado: $name";
        $message = "Nome: $name\nEmail: $email";
        $headers = "From: noreply@seudominio.com"; // Substitua pelo endereço de e-mail do seu domínio

        // Envia o e-mail
        if (mail($to, $subject, $message, $headers)) {
            echo "Inscrição enviada com sucesso!";
        } else {
            echo "Erro ao enviar o e-mail.";
        }
    } else {
        echo "Dados inválidos.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>