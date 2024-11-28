<?php
$host = 'localhost'; // Ou o endereço do seu servidor
$dbname = 'FarmaJa';
$username = 'root';
$password = ''; // Adicione sua senha do banco de dados aqui

try {
    // Conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $promotional_emails = isset($_POST['promotional_emails']) ? (int)$_POST['promotional_emails'] : 0;

        // Inserir os dados no banco de dados
        $stmt = $pdo->prepare("INSERT INTO contatos (nome, email, mensagem, promotional_emails) VALUES (?, ?, '', ?)");
        $stmt->execute([$nome, $email, $promotional_emails]);

        echo "Cadastro realizado com sucesso!";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
