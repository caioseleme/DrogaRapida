// Função para obter parâmetros da URL
function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

document.addEventListener('DOMContentLoaded', function () {
    const productId = getQueryParam('id');
    const productContainer = document.getElementById('product-container');

    // Dados fictícios para demonstração; substitua pelos reais
    const products = {
        1: {
            name: 'Expec Xarope com 120ml',
            description: 'Descrição detalhada do remédio 1. Inclui informações sobre uso, dosagem e efeitos colaterais.',
            image: src="../images/expec.jpg"
        },
        2: {
            name: 'Diltiazem 60mg EMS Genérico com 50 Comprimidos',
            description: 'Descrição detalhada do remédio 2. Inclui informações sobre uso, dosagem e efeitos colaterais.',
            image: '../images/diltiazem.png'
        },
        3: {
            name: 'Ciclobenzaprina 10mg EMS Genérico com 30 Comprimidos Revestidos',
            description: 'Descrição detalhada do remédio 2. Inclui informações sobre uso, dosagem e efeitos colaterais.',
            image: '../images/ciclobenzaprina.png'
        },
        4: {
            name: 'Amoxicilina + Clavulanato de Potássio 875mg EMS Genérico com 12 Comprimidos',
            description: 'Descrição detalhada do remédio 2. Inclui informações sobre uso, dosagem e efeitos colaterais.',
            image: '../images/amoxicilina.png'
        },
        5: {
            name: 'Novalgina 1G 20 Comprimidos Dipirona',
            description: 'Descrição detalhada do remédio 2. Inclui informações sobre uso, dosagem e efeitos colaterais.',
            image: '../images/novalgina.jpg'
        },
        6: {
            name: 'Lamotrigina 50mg Eurofarma Genérico com 30 Comprimidos',
            description: 'Descrição detalhada do remédio 2. Inclui informações sobre uso, dosagem e efeitos colaterais.',
            image: '../images/lamotrigina.png'
        },
        7: {
            name: 'Aripiprazol 10mg Nova Química Genérico com 30 Comprimidos',
            description: 'Descrição detalhada do remédio 2. Inclui informações sobre uso, dosagem e efeitos colaterais.',
            image: '../images/aripiprazol.png'
        },
        8: {
            name: 'Rosuvastatina 20mg EMS Genérico com 30 Comprimidos',
            description: 'Descrição detalhada do remédio 2. Inclui informações sobre uso, dosagem e efeitos colaterais.',
            image: '../images/rosuvastatina.png'
        },
        9: {
            name: 'Fisioton 400mg com 60 Comprimidos',
            description: 'Descrição detalhada do remédio 2. Inclui informações sobre uso, dosagem e efeitos colaterais.',
            image: '../images/fisioton.jpg'
        },
        10: {
            name: 'Allegra 120mg Antialérgico com 10 Comprimidos',
            description: 'Descrição detalhada do remédio 2. Inclui informações sobre uso, dosagem e efeitos colaterais.',
            image: '../images/allegraD.png'
        },
        11: {
            name: 'Noxx 40Mg Solução Injetável 0,4ml com 10 Seringas Preenchidas + Sistema de Segurança',
            description: 'Descrição detalhada do remédio 2. Inclui informações sobre uso, dosagem e efeitos colaterais.',
            image: '../images/noxx.jpg'
        },
        12: {
            name: 'Probiótico Enterogermina Plus 5ml com 5 Frascos',
            description: 'Descrição detalhada do remédio 2. Inclui informações sobre uso, dosagem e efeitos colaterais.',
            image: '../images/enterogermina.jpg'
        }
    };

    const product = products[productId];

    if (product) {
        productContainer.innerHTML = `
            <img src="${product.image}" alt="${product.name}" id="productimg">
            <h1>${product.name}</h1>
            <p>${product.description}</p>
            <button>Adicionar ao Carrinho</button>
        `;
    } else {
        productContainer.innerHTML = '<p>Produto não encontrado.</p>';
    }
});

document.addEventListener("DOMContentLoaded", function () {
    // Seleciona todos os botões de "Adicionar ao Carrinho"
    const addToCartButtons = document.querySelectorAll(".add-to-cart");

    // Itera sobre os botões e adiciona um evento de clique
    addToCartButtons.forEach(button => {
        button.addEventListener("click", function () {
            const productId = this.getAttribute("data-id");
            const productName = this.getAttribute("data-name");
            const productPrice = parseFloat(this.getAttribute("data-price"));

            // Chama a função para adicionar o produto ao carrinho
            addToCart(productId, productName, productPrice);
        });
    });
});

// Função para adicionar um produto ao carrinho
function addToCart(productId, productName, productPrice) {
    // Obtém o carrinho atual do localStorage (ou inicializa um novo)
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Verifica se o produto já está no carrinho
    const existingProductIndex = cart.findIndex(item => item.id === productId);
    
    if (existingProductIndex !== -1) {
        // Incrementa a quantidade do produto existente
        cart[existingProductIndex].quantity += 1;
    } else {
        // Adiciona um novo produto ao carrinho
        cart.push({ id: productId, name: productName, price: productPrice, quantity: 1 });
    }

    // Atualiza o localStorage com o carrinho atualizado
    localStorage.setItem("cart", JSON.stringify(cart));

    // Exibe uma mensagem de sucesso
    alert(`O produto ${productName} foi adicionado ao carrinho!`);
}

document.addEventListener('DOMContentLoaded', function () {
    const productId = getQueryParam('id');
    const productContainer = document.getElementById('product-container');
    const ratingMessage = document.getElementById('rating-message');

    // Dados fictícios para demonstração; substitua pelos reais
    const products = {
        1: {
            name: 'Expec Xarope com 120ml',
            description: 'Descrição detalhada do remédio 1.',
            image: '../images/expec.jpg',
            rating: 3 // Média de avaliação
        },
        // Outros produtos...
    };

    const product = products[productId];

    if (product) {
        productContainer.innerHTML = `
            <img src="${product.image}" alt="${product.name}" id="productimg">
            <h1>${product.name}</h1>
            <p>${product.description}</p>
            <div class="star-rating" id="star-rating">
                <span class="star" data-value="1">☆</span>
                <span class="star" data-value="2">☆</span>
                <span class="star" data-value="3">☆</span>
                <span class="star" data-value="4">☆</span>
                <span class="star" data-value="5">☆</span>
            </div>
            <p id="rating-message">Avaliação: ${product.rating} estrelas</p>
            <button>Adicionar ao Carrinho</button>
        `;

        const stars = document.querySelectorAll('.star');
        let currentRating = product.rating; // Exibe a avaliação inicial

        // Função para selecionar as estrelas
        stars.forEach(star => {
            star.addEventListener('click', function () {
                currentRating = parseInt(star.getAttribute('data-value'));
                updateStars(currentRating);
                saveRating(productId, currentRating);
            });

            star.addEventListener('mouseover', function () {
                updateStars(parseInt(star.getAttribute('data-value')));
            });

            star.addEventListener('mouseout', function () {
                updateStars(currentRating);
            });
        });

        // Função para atualizar o estilo das estrelas
        function updateStars(rating) {
            stars.forEach(star => {
                const value = parseInt(star.getAttribute('data-value'));
                if (value <= rating) {
                    star.classList.add('selected');
                } else {
                    star.classList.remove('selected');
                }
            });
        }

        // Função para salvar a avaliação no localStorage
        function saveRating(productId, rating) {
            let ratings = JSON.parse(localStorage.getItem('ratings')) || {};
            ratings[productId] = rating;
            localStorage.setItem('ratings', JSON.stringify(ratings));
            ratingMessage.innerHTML = `Avaliação: ${rating} estrelas`;
        }

        // Atualiza as estrelas ao carregar a página com a avaliação já feita (se houver)
        const savedRatings = JSON.parse(localStorage.getItem('ratings')) || {};
        const savedRating = savedRatings[productId];
        if (savedRating) {
            currentRating = savedRating;
            updateStars(currentRating);
            ratingMessage.innerHTML = `Avaliação: ${currentRating} estrelas`;
        }
    } else {
        productContainer.innerHTML = '<p>Produto não encontrado.</p>';
    }
});
