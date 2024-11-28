<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmaJá - Mapa</title>
    <link rel="stylesheet" href="../css/map.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=account_circle" />
    <script type="module" src="https://unpkg.com/@googlemaps/extended-component-library@0.6"></script>
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

    <!-- Mapa -->
    <gmpx-api-loader key="AIzaSyDtDzbMwvBcxsTZXTdLKUeSGTJfPLBscl4" solution-channel="GMP_GE_mapsandplacesautocomplete_v1">
    </gmpx-api-loader>
    <gmp-map center="-19.9145145,-43.9332529" zoom="13" map-id="DEMO_MAP_ID">
        <div slot="control-block-start-inline-start" class="place-picker-container">
            <gmpx-place-picker placeholder="Digite um endereço"></gmpx-place-picker>
        </div>
        <gmp-advanced-marker></gmp-advanced-marker>
    </gmp-map>

    <!-- Scripts -->
    <script src="../js/map.js"></script>
</body>
</html>
