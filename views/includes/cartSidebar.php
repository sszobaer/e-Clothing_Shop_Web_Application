<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$cartItems = $_SESSION['cart'] ?? [];
$total = 0;
?>

<!-- 🛒 Cart Sidebar -->
<div id="cartSidebar" class="cart-sidebar">
  <div class="cart-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Your Cart</h5>
    <button class="btn-close" id="closeCart"></button>
  </div>

  <!-- 🧾 Cart Content -->
  <div class="cart-body p-3" id="cartContent">
    <?php if (!empty($cartItems)): ?>
      <?php foreach ($cartItems as $id => $item): ?>
        <div class="cart-item d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
            <div>
              <p class="mb-0 fw-semibold"><?= htmlspecialchars($item['name']) ?></p>
              <small>৳<?= number_format($item['price']) ?> × <?= $item['quantity'] ?></small>
            </div>
          </div>
          <div class="d-flex align-items-center gap-2">
            <button class="btn btn-sm btn-outline-secondary qty-btn" data-id="<?= $id ?>" data-action="decrease">−</button>
            <span class="fw-bold"><?= $item['quantity'] ?></span>
            <button class="btn btn-sm btn-outline-secondary qty-btn" data-id="<?= $id ?>" data-action="increase">+</button>
            <span class="fw-bold">৳<?= number_format($item['price'] * $item['quantity']) ?></span>
          </div>
        </div>
        <?php $total += $item['price'] * $item['quantity']; ?>
      <?php endforeach; ?>
      <hr>
      <p class="fw-bold text-end">Total: ৳<?= number_format($total) ?></p>
    <?php else: ?>
      <p class="text-center text-muted mt-3">Your cart is empty.</p>
    <?php endif; ?>
  </div>

  <div class="cart-footer p-3 d-flex justify-content-between">
    <button class="btn btn-secondary w-50 me-2">Cash On Delivery</button>
    <button class="btn btn-primary w-50">Online Payment</button>
  </div>
</div>

<!-- 🧭 Styles -->
<style>
.cart-sidebar {
  position: fixed;
  top: 0;
  right: -400px;
  width: 400px;
  height: 100vh;
  background: #fff;
  box-shadow: -4px 0 10px rgba(0,0,0,0.2);
  transition: right 0.4s ease;
  z-index: 1050;
  overflow-y: auto;
}
.cart-sidebar.active { right: 0; }
.cart-header { background: var(--bs-primary); color: #fff; padding: 1rem; }
.cart-item { border-bottom: 1px solid #eee; padding: 1rem 0; }
.cart-item img { width: 60px; height: 60px; object-fit: cover; border-radius: 6px; margin-right: 1rem; }
.cart-footer { background: #f8f9fa; border-top: 1px solid #ddd; }
.qty-btn { width: 30px; height: 30px; border-radius: 50%; font-weight: bold; line-height: 1; padding: 0; }
.qty-btn:hover { background-color: var(--bs-primary); color: #fff; }
</style>

<!-- ⚙️ Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const cartSidebar = document.getElementById('cartSidebar');
  const closeCart = document.getElementById('closeCart');
  const headerCartBtn = document.getElementById('cartButton'); 


  // ✅ Toggle sidebar from header button
  if (headerCartBtn) {
    headerCartBtn.addEventListener('click', () => {
      cartSidebar.classList.toggle('active');
    });
  }

  // Close button
  if (closeCart) closeCart.addEventListener('click', () => cartSidebar.classList.remove('active'));

  // Prevent double-add issue using debounce
  let isAdding = false;

  // Handle Add to Cart buttons
  document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', async () => {
      if (isAdding) return;
      isAdding = true;

      const product = {
        id: button.dataset.id,
        name: button.dataset.name,
        price: button.dataset.price,
        image: button.dataset.image
      };

      if (button.classList.contains('added')) {
        button.innerText = '✅ Already in Cart';
        isAdding = false;
        return;
      }

      try {
        const res = await fetch('/e-Clothing_Shop_Web_Application/controller/cartController.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'add', product })
        });

        const data = await res.json();

        if (data.cart) {
          updateCartSidebar(data.cart);
          cartSidebar.classList.add('active');
          button.innerText = '✅ Already in Cart';
          button.classList.add('added');
        }
      } catch (err) {
        console.error('❌ Cart update failed:', err);
      }

      setTimeout(() => (isAdding = false), 500);
    });
  });
});

// 🔁 Update cart dynamically
async function updateCartSidebar(cart) {
  const cartContent = document.getElementById('cartContent');
  if (!cartContent) return;

  if (cart.length === 0) {
    cartContent.innerHTML = `<p class="text-center text-muted mt-3">Your cart is empty.</p>`;
    return;
  }

  let total = 0;
  cartContent.innerHTML = cart.map(item => {
    const subtotal = item.price * item.quantity;
    total += subtotal;
    return `
      <div class="cart-item d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <img src="${item.image}" alt="${item.name}">
          <div>
            <p class="mb-0 fw-semibold">${item.name}</p>
            <small>৳${item.price} × ${item.quantity}</small>
          </div>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button class="btn btn-sm btn-outline-secondary qty-btn" data-id="${item.id}" data-action="decrease">−</button>
          <span class="fw-bold">${item.quantity}</span>
          <button class="btn btn-sm btn-outline-secondary qty-btn" data-id="${item.id}" data-action="increase">+</button>
          <span class="fw-bold">৳${subtotal}</span>
        </div>
      </div>`;
  }).join('') + `<hr><p class="fw-bold text-end">Total: ৳${total}</p>`;

  document.querySelectorAll('.qty-btn').forEach(btn => {
    btn.addEventListener('click', async () => {
      const id = btn.dataset.id;
      const action = btn.dataset.action;

      const res = await fetch('/e-Clothing_Shop_Web_Application/controller/cartController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: action, id })
      });

      const data = await res.json();
      if (data.cart) updateCartSidebar(data.cart);
    });
  });
}
</script>
