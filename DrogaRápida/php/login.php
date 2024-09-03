<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root"; // Usuário padrão do WAMP
$password = ""; // Senha padrão do WAMP
$dbname = "drogarapida";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Buscar usuário no banco de dados
$sql = "SELECT senha FROM usuarios WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verificar senha
    if (password_verify($senha, $row['senha'])) {
        echo "Login bem-sucedido!";
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Nenhum usuário encontrado.";
}

$conn->close();
?>
