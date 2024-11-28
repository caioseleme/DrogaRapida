<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmaJá - Registro</title>
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=account_circle" />
</head>
<body>
<!-- Cabeçalho -->
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
                    session_start();
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

<!-- Seção de Registro -->
<section class="auth">
    <h1>Registrar</h1>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = htmlspecialchars($_POST['nome']);
        $email = htmlspecialchars($_POST['email']);
        $telefone = htmlspecialchars($_POST['telefone']);
        $senha = htmlspecialchars($_POST['senha']);
        $confirmar_senha = htmlspecialchars($_POST['confirmar-senha']);
        $fk_plano_id = htmlspecialchars($_POST['fk_plano_id']);

    // Validação dos campos
    if (empty($nome) || empty($email) || empty($telefone) || empty($senha) || empty($confirmar_senha) || empty($fk_plano_id)) {
        echo "<p style='color: red;'>Todos os campos são obrigatórios.</p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: red;'>E-mail inválido.</p>";
    } elseif ($senha !== $confirmar_senha) {
        echo "<p style='color: red;'>As senhas não correspondem.</p>";
    } else {
        // Conexão com o banco de dados
        $conn = new mysqli('localhost', 'root', '', 'farmaja');

        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Verificar se o e-mail já existe
        $sql_check_email = "SELECT * FROM CLIENTES WHERE email = '$email'";
        $result = $conn->query($sql_check_email);

        if ($result->num_rows > 0) {
            echo "<p style='color: red;'>Este e-mail já está em uso. Por favor, use outro e-mail.</p>";
        } else {
            // Inserção no banco de dados
            $sql = "INSERT INTO CLIENTES (nome, email, telefone, senha, fk_plano_id) 
                    VALUES ('$nome', '$email', '$telefone', '$senha', $fk_plano_id)";

            if ($conn->query($sql) === TRUE) {
                // Redireciona para a página de login após o registro
                header("Location: login.php"); // Altere para o caminho correto do seu login
                exit(); // Certifique-se de que o script pare após o redirecionamento
            } else {
                echo "<p style='color: red;'>Erro: " . $conn->error . "</p>";
            }
        }

        $conn->close();
    }
}
?>

    <main>
        <form action="" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" placeholder="Ex.: (99) 99999-9999" maxlength="15" oninput="formatarTelefone(this)" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <label for="confirmar-senha">Confirmar Senha:</label>
            <input type="password" id="confirmar-senha" name="confirmar-senha" required>

            <label for="fk_plano_id">Plano:</label>
            <select id="fk_plano_id" name="fk_plano_id" required>
                <option value="">Selecione um plano</option>
                <option value="1">Plano Grátis</option>
                <option value="2">Plano Gold</option>
                <option value="3">Plano Diamond</option>
            </select>

            <button type="submit">Registrar</button>
        </form>
    </main>
    <p>Já possui uma conta? <a href="login.php">Fazer login</a></p>
</section>

<!-- Rodapé -->
<footer>
    <p>&copy; 2024 FarmaJá. Todos os direitos reservados.</p>
</footer>
<script src="../js/register.js"></script>
</body>
</html>
