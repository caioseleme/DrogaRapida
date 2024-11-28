// Exemplo de dados de produtos no carrinho
const cartItems = [
    { id: 1, name: 'Produto 1', price: 29.9, quantity: 1 },
    { id: 2, name: 'Produto 2', price: 39.9, quantity: 2 },
    { id: 3, name: 'Produto 3', price: 49.9, quantity: 1 }
];

// Carrega os itens do carrinho ao carregar a página
window.onload = function() {
    loadCartItems();
};

// Função para carregar os itens do carrinho na tabela
function loadCartItems() {
    const cartTableBody = document.getElementById('cart-items');
    let total = 0;

    // Limpa a tabela antes de adicionar os itens
    cartTableBody.innerHTML = '';

    cartItems.forEach(item => {
        const row = document.createElement('tr');
        
        row.innerHTML = `
            <td>${item.name}</td>
            <td><input type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${item.id}, this.value)"></td>
            <td>R$ ${item.price.toFixed(2)}</td>
            <td>R$ ${(item.price * item.quantity).toFixed(2)}</td>
            <td><button onclick="removeItem(${item.id})">Remover</button></td>
        `;

        cartTableBody.appendChild(row);
        total += item.price * item.quantity;
    });

    // Atualiza o valor total do carrinho
    document.getElementById('cart-total').innerText = `R$ ${total.toFixed(2)}`;
}

// Função para atualizar a quantidade de um item
function updateQuantity(id, newQuantity) {
    const item = cartItems.find(item => item.id === id);
    if (item) {
        item.quantity = parseInt(newQuantity);
        reloadCart();
    }
}

// Função para remover um item do carrinho
function removeItem(id) {
    const index = cartItems.findIndex(item => item.id === id);
    if (index !== -1) {
        const removedItem = cartItems.splice(index, 1)[0]; // Remove o item e guarda o valor removido
        alert(`O item ${removedItem.name} foi removido do carrinho.`);
        reloadCart();
    }
}

// Função para recarregar o carrinho após uma modificação
function reloadCart() {
    loadCartItems(); // Recarrega os itens e recalcula o total
}

// Função para finalizar a compra
function finishPurchase() {
    if (cartItems.length === 0) {
        alert('Seu carrinho está vazio!');
    } else {
        // Limpa os itens do carrinho
        cartItems.length = 0;
        reloadCart();
        alert('Compra finalizada com sucesso! Obrigado pela sua compra.');

        // Redireciona para a página index.php
        window.location.href = '../php/index.php';
    }
}
