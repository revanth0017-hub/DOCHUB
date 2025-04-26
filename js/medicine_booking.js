const cart = [];
let total = 0;
// Add to cart functionality
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function() {
        const id = this.dataset.id;
        const name = this.dataset.name;
        const price = parseFloat(this.dataset.price);
        const quantity = parseInt(this.previousElementSibling.value);

        addToCart(id, name, price, quantity);
        updateCartDisplay();
    });
});
// Search functionality
document.getElementById('searchMedicine').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase().trim();
    const medicineCards = document.querySelectorAll('#medicinesList .col-md-4');
    medicineCards.forEach(card => {
        const medicineName = card.querySelector('.medicine-details h5').textContent.toLowerCase();
        const medicineDesc = card.querySelector('.medicine-details p').textContent.toLowerCase();
        if (medicineName.includes(searchTerm) || medicineDesc.includes(searchTerm)) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
});
// Cart functions
function addToCart(id, name, price, quantity) {
    const existingItem = cart.find(item => item.id === id.toString());
    if (existingItem) {
        existingItem.quantity += quantity;
    } else {
        cart.push({ id: id.toString(), name, price, quantity });
    }
    updateTotal();
}
function updateCartDisplay() {
    const cartDiv = document.getElementById('cartItems');
    cartDiv.innerHTML = '';
    cart.forEach(item => {
        cartDiv.innerHTML += `
            <div class="cart-item">
                <div>
                    <div>${item.name}</div>
                    <small>Qty: ${item.quantity} × ₹${item.price}</small>
                </div>
                <div>
                    <span>₹${(item.price * item.quantity).toFixed(2)}</span>
                    <i class="bi bi-trash text-danger ms-2" 
                       onclick="removeItem('${item.id}')"></i>
                </div>
            </div>
        `;
    });
}
function removeItem(id) {
    const index = cart.findIndex(item => item.id === id.toString());
    if (index > -1) {
        cart.splice(index, 1);
        updateCartDisplay();
        updateTotal();
    }
}
function updateTotal() {
    total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    document.getElementById('totalAmount').textContent = total.toFixed(2);
}
// Order placement
document.getElementById('checkoutBtn').addEventListener('click', async function() {
    if (!validateForm()) return;
    const orderData = {
        patientName: document.getElementById('patientName').value,
        age: document.getElementById('age').value,
        phone: document.getElementById('phone').value,
        place: document.getElementById('place').value,
        items: cart,
        total: total
    };
    try {
        const response = await fetch('process_order.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(orderData)
        });
        const result = await response.json();
        if (result.success) {
            alert('Order placed successfully!');
            cart.length = 0;
            updateCartDisplay();
            updateTotal();
            document.getElementById('patientForm').reset();
            loadOrders();
        } else {
            alert('Error placing order: ' + result.message);
        }
    } catch (error) {
        alert('Error processing order. Please try again.');
    }
});
// Load and display orders
async function loadOrders() {
    try {
        const response = await fetch('get_orders.php');
        const orders = await response.json();
        const ordersDiv = document.getElementById('ordersList');
        ordersDiv.innerHTML = orders.map(order => `
            <div class="card order-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Order #${order.id}</h6>
                        <div>
                            <small>${new Date(order.order_date).toLocaleDateString()}</small>
                            <i class="bi bi-printer ms-2 print-receipt" 
                               onclick="printReceipt(${order.id})"></i>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p>Patient: ${order.patient_name}</p>
                    <p>Total Amount: ₹${order.total_amount}</p>
                    <p>Status: <span class="badge bg-${order.status === 'pending' ? 'warning' : 'success'}">
                        ${order.status}</span></p>
                </div>
            </div>
        `).join('');
    } catch (error) {
        console.error('Error loading orders:', error);
    }
}
// Print receipt
function printReceipt(orderId) {
    window.open(`print_receipt.php?order_id=${orderId}`, '_blank');
}
// Form validation
function validateForm() {
    const form = document.getElementById('patientForm');
    if (!form.checkValidity()) {
        alert('Please fill in all required fields');
        return false;
    }
    if (cart.length === 0) {
        alert('Your cart is empty');
        return false;
    }
    return true;
}
// Initial load
document.addEventListener('DOMContentLoaded', loadOrders);