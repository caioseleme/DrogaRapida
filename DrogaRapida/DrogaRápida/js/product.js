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
