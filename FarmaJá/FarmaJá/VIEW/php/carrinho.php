<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="../css/cart.css">
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
            <div class="user-dropdown">
                <span class="material-symbols-outlined" alt="Usuário" class="user-icon">account_circle</span>
                <?php
                session_start();
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

    <!-- Seção do Carrinho -->
    <main class="cart-container">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Total</th>
                    <th>Remover</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                <!-- Os itens do carrinho serão inseridos dinamicamente aqui -->
            </tbody>
        </table>

        <!-- Total Geral -->
        <div class="cart-summary">
            <p>Total do Carrinho: <span id="cart-total">R$ 0,00</span></p>
            <button id="checkout-button" onclick="finishPurchase()">Finalizar Compra</button>

        </div>
    </main>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2024 FarmaJá. Todos os direitos reservados.</p>
    </footer>

    <script src="../js/cart.js"></script>
</body>
</html>
