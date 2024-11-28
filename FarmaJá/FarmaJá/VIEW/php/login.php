<?php
session_start(); // Iniciar a sessão

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);

    // Conexão com o banco de dados
    $conn = new mysqli('localhost', 'root', '', 'farmaja');

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Verificar se o e-mail existe no banco de dados
    $sql = "SELECT * FROM CLIENTES WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc(); // Pega os dados do usuário
        // Verifica se a senha corresponde (para simplificação, senha não encriptada)
        if ($senha == $usuario['senha']) {
            // Armazenar o e-mail e o primeiro nome na sessão
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['nome'] = $usuario['nome']; // Armazenar o nome completo ou apenas o primeiro nome

            // Redirecionar para a página inicial ou página de sucesso do login
            header("Location: ../php/index.php");
            exit();
        } else {
            echo "<p style='color: red;'>Senha incorreta. Tente novamente.</p>";
        }
    } else {
        echo "<p style='color: red;'>E-mail não encontrado. Tente novamente.</p>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmaJá - Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=account_circle" />
</head>
<body>
<header>
    <div class="nav-container">
        <a href="../php/index.php" class="logo">
            <img src="../images/logo.png" alt="Logo" />
        </a>
        <nav>
            <a href="../php/index.php" class="index-button">Início</a>
            <a href="../php/produtos.php" class="product-button">Produtos</a>
            <a href="../php/contato.php" class="contact-button">Contato</a>
            <a href="../php/mapa.php" class="map-button">Mapa</a>
        </nav>
        <div class="header-actions">
            <form action="../php/search.php" method="get" class="search-form">
                <input type="text" name="query" placeholder="Pesquisar...">
            </form>
            <a href="../php/carrinho.php" class="cart-icon">
                <img src="../images/cart-icon.png" alt="Carrinho">
                <span class="cart-count">0</span>
            </a>
            <div class="user-dropdown">
                <span class="material-symbols-outlined" alt="Usuário" class="user-icon">account_circle</span>
                <?php
                // Exibe o nome do usuário se ele estiver logado
                if (isset($_SESSION['nome'])) {
                    echo "<span class='user-name'>" . $_SESSION['nome'] . "</span>";
                }
                ?>
                <ul class="dropdown-menu">
                    <?php
                    // Se o usuário estiver logado, mostrar o link de logout
                    if (isset($_SESSION['email'])) {
                        echo "<li><a href='../php/logout.php'>Sair</a></li>";
                    } else {
                        echo "<li><a href='../php/registro.php'>Registrar</a></li>";
                        echo "<li><a href='../php/login.php'>Login</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</header>

<!-- Seção de Login -->
<section class="auth">
    <h1>Login</h1>

    <form action="" method="POST">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit">Entrar</button>
    </form>

    <p>Ainda não tem uma conta? <a href="registro.php">Registrar-se</a></p>
</section>

<!-- Rodapé -->
<footer>
    <p>&copy; 2024 FarmaJá. Todos os direitos reservados.</p>
</footer>

</body>
</html>
