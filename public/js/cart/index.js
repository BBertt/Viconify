function changeQuantity(button, delta) {
    const cartItem = button.closest('.cart-item');
    const quantityInput = cartItem.querySelector('.quantity');
    const price = parseFloat(cartItem.getAttribute('data-price'));
    const maxQuantity = parseInt(cartItem.getAttribute('data-max-quantity'));
    let quantity = parseInt(quantityInput.value);

    quantity += delta;
    if (quantity < 1) {
        quantity = 1;
    } else if (quantity > maxQuantity) {
        quantity = maxQuantity;
    }
    quantityInput.value = quantity;

    updateSubtotal();
}

function updateSubtotal() {
    let subtotal = 0;
    document.querySelectorAll('.cart-item').forEach(item => {
        const price = parseFloat(item.getAttribute('data-price'));
        const quantity = parseInt(item.querySelector('.quantity').value);
        subtotal += price * quantity;
    });

    document.getElementById('subtotal').textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(subtotal);
}

function prepareAndSubmitForm() {
    const form = document.getElementById('purchaseForm');
    document.querySelectorAll('.cart-item').forEach(item => {
        const cartId = item.getAttribute('data-cart-id');
        const quantity = item.querySelector('.quantity').value;

        const inputCartId = document.createElement('input');
        inputCartId.type = 'hidden';
        inputCartId.name = `products[${cartId}][CartID]`;
        inputCartId.value = cartId;

        const inputQuantity = document.createElement('input');
        inputQuantity.type = 'hidden';
        inputQuantity.name = `products[${cartId}][Quantity]`;
        inputQuantity.value = quantity;

        form.appendChild(inputCartId);
        form.appendChild(inputQuantity);
    });

    form.submit();
}
