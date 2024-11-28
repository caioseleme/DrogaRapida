<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmaJá - Home</title>
    <link rel="stylesheet" href="../css/styles.css">
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

<!-- Seção Principal -->
<section class="hero">
    <h1>Bem-vindo à FarmaJá</h1>
    <p>Entregamos seus medicamentos com rapidez e segurança.</p>
</section>

<!-- Seção de Categorias -->
<section class="categories">
    <h2>Categorias de Produtos</h2>
    <div class="category-list">
        <div class="category">
            <a href="../php/produtos-detalhes.php?categoria=analgesicos">
                <img src="../images/analgesicos.jpg" alt="Analgesicos">
                <h3>Analgesicos</h3>
            </a>
        </div>
        <div class="category">
            <a href="../php/produtos-detalhes.php?categoria=antibioticos">
                <img src="../images/antibioticos.jpg" alt="Antibioticos">
                <h3>Antibioticos</h3>
            </a>
        </div>
        <div class="category">
            <a href="../php/produtos-detalhes.php?categoria=antialergicos">
                <img src="../images/antialergicos.avif" alt="Antialergicos">
                <h3>Antialergicos</h3>
            </a>
        </div>
    </div>
</section>

<!-- Seção de Indicações de Farmácias -->
<section class="pharmacy-recommendations">
    <h2>Farmácias Recomendadas em Belo Horizonte</h2>
    <div class="pharmacy-list">
        <div class="pharmacy">
            <a href="https://www.araujo.com.br/" target="_blank">
                <img src="../images/araujo.png" alt="Drogaria Araujo">
                <h3>Drogaria Araujo</h3>
            </a>
        </div>
        <div class="pharmacy">
            <a href="https://www.drogariaspacheco.com.br/" target="_blank">
                <img src="../images/pacheco.jpg" alt="Drogarias Pacheco">
                <h3>Drogarias Pacheco</h3>
            </a>
        </div>
        <div class="pharmacy">
            <a href="https://www.drogaraia.com.br/" target="_blank">
                <img src="../images/drogaraia.jpg" alt="Drogaria Droga Raia">
                <h3>Droga Raia</h3>
            </a>
        </div>
    </div>
</section>

<div class="carousel">
    <div class="slides" id="slides">
        <!-- Slide 1 -->
        <div class="slide" >
            <!-- Produto 1 -->
            <div onclick="window.location='../php/produtos-detalhes.php?id=1'" class="product-card">
                <span class="discount-badge">52% OFF</span>
                <img src="../images/expec.jpg" alt="Produto 1">
                <div class="product-info">
                    <h3 class="product-title">Expec Xarope com 120ml</h3>
                    <p class="product-price">R$ 22,99</p>
                </div>
            </div>
        </div>
        <div class="slide" >
            <!-- Produto 2 -->
            <div onclick="window.location='../php/produtos-detalhes.php?id=2'" class="product-card">
                <span class="discount-badge">33% OFF</span>
                <img src="../images/diltiazem.png" alt="Produto 2">
                <div class="product-info">
                    <h3 class="product-title">Diltiazem 60mg EMS Genérico com 50 Comprimidos</h3>
                    <p class="product-price">R$ 29,99</p>
                </div>
            </div>
        </div>      
        <div class="slide">
            <!-- Produto 3 -->
            <div onclick="window.location='../php/produtos-detalhes.php?id=3'" class="product-card">
                <span class="discount-badge">62% OFF</span>
                <img src="../images/ciclobenzaprina.png" alt="Produto 3">
                <div class="product-info">
                    <h3 class="product-title">Ciclobenzaprina 10mg EMS Genérico com 30 Comprimidos Revestidos</h3>
                    <p class="product-price">R$ 15,99</p>
                </div>
            </div>
        </div>
        <div class="slide">
            <!-- Produto 4 -->
            <div onclick="window.location='../php/produtos-detalhes.php?id=4'" class="product-card">
                <span class="discount-badge">71% OFF</span>
                <img src="../images/amoxicilina.png" alt="Produto 4">
                <div class="product-info">
                    <h3 class="product-title">Amoxicilina + Clavulanato de Potássio 875mg EMS Genérico com 12 Comprimidos</h3>
                    <p class="product-price">R$ 45,99</p>
                </div>
            </div>
        </div>
        <div class="slide">
            <!-- Produto 5 -->
            <div onclick="window.location='../php/produtos-detalhes.php?id=5'" class="product-card">
                <span class="discount-badge">19% OFF</span>
                <img src="../images/novalgina.jpg" alt="Produto 5">
                <div class="product-info">
                    <h3 class="product-title">Novalgina 1G 20 Comprimidos Dipirona</h3>
                    <p class="product-price">R$ 33,89</p>
                </div>
            </div>
        </div>
        <div class="slide">
            <!-- Produto 6 -->
            <div onclick="window.location='../php/produtos-detalhes.php?id=6'" class="product-card">
                <span class="discount-badge">67% OFF</span>
                <img src="../images/lamotrigina.png" alt="Produto 6">
                <div class="product-info">
                    <h3 class="product-title">Lamotrigina 50mg Eurofarma Genérico com 30 Comprimidos</h3>
                    <p class="product-price">R$ 13,99</p>
                </div>
            </div>
        </div>
        <div class="slide">
            <!-- Produto 7 -->
            <div onclick="window.location='../php/produtos-detalhes.php?id=7'" class="product-card">
                <span class="discount-badge">54% OFF</span>
                <img src="../images/aripiprazol.png" alt="Produto 7">
                <div class="product-info">
                    <h3 class="product-title">Aripiprazol 10mg Nova Química Genérico com 30 Comprimidos</h3>
                    <p class="product-price">R$ 101,99</p>
                </div>
            </div>
        </div>
        <div class="slide">
            <!-- Produto 8 -->
            <div onclick="window.location='../php/produtos-detalhes.php?id=8'" class="product-card">
                <span class="discount-badge">83% OFF</span>
                <img src="../images/rosuvastatina.png" alt="Produto 8">
                <div class="product-info">
                    <h3 class="product-title">Rosuvastatina 20mg EMS Genérico com 30 Comprimidos</h3>
                    <p class="product-price">R$ 28,99</p>
                </div>
            </div>
        </div>
        <div class="slide">
            <!-- Produto 9 -->
            <div onclick="window.location='../php/produtos-detalhes.php?id=9'" class="product-card">
                <span class="discount-badge">3% OFF</span>
                <img src="../images/fisioton.jpg" alt="Produto 9">
                <div class="product-info">
                    <h3 class="product-title">Fisioton 400mg com 60 Comprimidos</h3>
                    <p class="product-price">R$ 186,89</p>
                </div>
            </div>
        </div>
        <div class="slide">
            <!-- Produto 10 -->
            <div onclick="window.location='../php/produtos-detalhes.php?id=10'" class="product-card">
                <span class="discount-badge">23% OFF</span>
                <img src="../images/allegraD.png" alt="Produto 10">
                <div class="product-info">
                    <h3 class="product-title">Allegra 120mg Antialérgico com 10 Comprimidos</h3>
                    <p class="product-price">R$ 64,89</p>
                </div>
            </div>
        </div>
        <div class="slide">
            <!-- Produto 11 -->
            <div onclick="window.location='../php/produtos-detalhes.php?id=11'" class="product-card">
                <span class="discount-badge">64% OFF</span>
                <img src="../images/noxx.jpg" alt="Produto 11">
                <div class="product-info">
                    <h3 class="product-title">Noxx 40Mg Solução Injetável 0,4ml com 10 Seringas Preenchidas + Sistema de Segurança</h3>
                    <p class="product-price">R$ 295,99</p>
                </div>
            </div>
        </div>
        <div class="slide">
            <!-- Produto 12 -->
            <div onclick="window.location='../php/produtos-detalhes.php?id=12'" class="product-card">
                <span class="discount-badge">16% OFF</span>
                <img src="../images/enterogermina.jpg" alt="Produto 12">
                <div class="product-info">
                    <h3 class="product-title">Probiótico Enterogermina Plus 5ml com 5 Frascos</h3>
                    <p class="product-price">R$ 39,99</p>
                </div>
            </div>
        </div>
    </div>
    <button class="prev" id="prev"><</button>
    <button class="next" id="next">></button>
</div>

<section class="newsletter-consent">
    <h2>Receba Ofertas e Novidades</h2>
    <form id="newsletterConsentForm" method="POST" class="newsletter-consent-form">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label>
            <input type="checkbox" id="promotional_emails" name="promotional_emails">
            Desejo receber emails promocionais.
        </label>
        
        <button type="button" id="submitBtn">Enviar</button>
        <div id="responseMessage"></div>
    </form>    
</section>

<!-- Rodapé -->
<footer>
    <p>&copy; 2024 FarmaJá. Todos os direitos reservados.</p>
</footer>

<script src="../js/scripts.js"></script>
<script src="../js/forms.js"></script>
</body>
</html>
