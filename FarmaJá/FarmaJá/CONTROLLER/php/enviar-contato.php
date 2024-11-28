<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    $to = "seu-email@dominio.com"; // Substitua pelo seu e-mail
    $subject = "Mensagem do Formulário de Contato";
    $message = "Nome: $nome\nE-mail: $email\n\nMensagem:\n$mensagem";
    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Falha ao enviar a mensagem.";
    }
} else {
    echo "Método de solicitação inválido.";
}
?>
