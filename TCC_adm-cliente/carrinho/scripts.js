let cartItems = [];
const menuItems = [
    { name: 'Mandioquinha e frango', price: 32, image: 'images/produto1.png' },
    { name: 'Fraldinha com batatas', price: 39, image: 'images/produto2.png' },
    { name: 'Costela com arroz Branco', price: 44, image: 'images/produto3.png' },
    { name: 'Picanha com arroz', price: 40, image: 'images/produto4.png' },
    { name: 'Frango a passarinho', price: 36, image: 'images/produto5.png' },
    { name: 'Carne no feijão preto', price: 35, image: 'images/produto6.jpg' },
    { name: 'Carne de porco com batatas', price: 29, image: 'images/produto7.jpg' },
    { name: 'Feijão tropeiro', price: 27, image: 'images/produto8.jpg' },
    { name: 'Escondidinho de frango', price: 19, image: 'images/produto9.jpg' },
    { name: 'Salada de frago Premium', price: 19, image: 'images/produto10.jpg' },
    { name: 'Salada de frango Simples', price: 14, image: 'images/produto11.jpg' },
    { name: 'Petit gâteau', price: 15, image: 'images/produto12.jpg' },
    { name: 'Torta de Frango', price: 7, image: 'images/produto13.jpg' },
    { name: 'Batata Rustica', price: 27, image: 'images/produto14.jpg' },
    { name: 'Xsalada', price: 23, image: 'images/produto15.jpg' },
    { name: 'Xbacon', price: 25, image: 'images/produto16.jpg' },
    { name: 'Smash álho', price: 22, image: 'images/produto17.jpg' },
    { name: 'Smash Classico', price: 20, image: 'images/produto18.jpeg' }
];

document.getElementById('search-bar').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    renderMenu(searchTerm);
});

function addToCart(item, price) {
    cartItems.push({ item, price });
    renderCart();
}

function removeFromCart(index) {
    cartItems.splice(index, 1);
    renderCart();
}

function renderCart() {
    const cartList = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    const checkoutButton = document.getElementById('checkout-button');
    cartList.innerHTML = '';

    let total = 0;
    cartItems.forEach((cartItem, index) => {
        const listItem = document.createElement('li');
        listItem.textContent = `${cartItem.item} - R$${cartItem.price.toFixed(2)}`;
        const removeButton = document.createElement('button');
        removeButton.textContent = 'Remover';
        removeButton.onclick = () => removeFromCart(index);
        listItem.appendChild(removeButton);
        cartList.appendChild(listItem);

        total += cartItem.price;
    });

    cartTotal.textContent = total.toFixed(2);
    checkoutButton.style.display = cartItems.length > 0 ? 'block' : 'none';
}

function renderMenu(searchTerm = '') {
    const menuList = document.getElementById('menu-items');
    menuList.innerHTML = '';
    
    const filteredItems = menuItems.filter(item => 
        item.name.toLowerCase().includes(searchTerm)
    );
    
    filteredItems.forEach(menuItem => {
        const productDiv = document.createElement('div');
        productDiv.className = 'product';
        productDiv.innerHTML = `
            <img src="${menuItem.image}" alt="${menuItem.name}">
            <span>${menuItem.name} - R$${menuItem.price.toFixed(2)}</span>
            <button onclick="addToCart('${menuItem.name}', ${menuItem.price})">Adicionar ao Carrinho</button>
        `;
        menuList.appendChild(productDiv);
    });
}

function openPaymentForm() {
    document.getElementById('payment-form').style.display = 'block';
}

function closePaymentForm() {
    document.getElementById('payment-form').style.display = 'none';
}

function applyPromoCode() {
    const promoCode = document.getElementById('promo-code').value;
    if (promoCode === '123ple') {
        let total = parseFloat(document.getElementById('cart-total').textContent);
        total *= 0.80; // Aplicando 20% de desconto
        document.getElementById('cart-total').textContent = total.toFixed(2);
        alert('Código promocional aplicado com sucesso!');
    } else {
        alert('Código promocional inválido.');
    }
}

function processPayment(event) {
    event.preventDefault();
    // Aqui você pode adicionar a lógica para processar o pagamento

    alert('Pagamento realizado com sucesso!');
    cartItems = [];
    renderCart();
    closePaymentForm();
}

// Renderizar o cardápio inicial