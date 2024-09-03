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
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar_senha = $_POST['confirmar-senha'];

// Validar senhas
if ($senha !== $confirmar_senha) {
    die("As senhas não coincidem.");
}

// Hash da senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// Inserir dados no banco de dados
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha_hash')";

if ($conn->query($sql) === TRUE) {
    echo "Registro efetuado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
