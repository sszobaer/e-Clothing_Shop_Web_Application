<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$isInViews = strpos($_SERVER['REQUEST_URI'], '/views/') !== false;
$basePath = $isInViews ? '../' : '';

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
            <img src="<?= htmlspecialchars($item['image']) ?>"
              alt="<?= htmlspecialchars($item['name']) ?>"
              class="cart-item-img">

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
    box-shadow: -4px 0 10px rgba(0, 0, 0, 0.2);
    transition: right 0.4s ease;
    z-index: 1050;
    overflow-y: auto;
  }

  .cart-sidebar.active {
    right: 0;
  }

  .cart-header {
    background: var(--bs-primary);
    color: #fff;
    padding: 1rem;
  }

  .cart-item {
    border-bottom: 1px solid #eee;
    padding: 1rem 0;
  }

  .cart-item img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 6px;
    margin-right: 1rem;
  }

  .cart-footer {
    background: #f8f9fa;
    border-top: 1px solid #ddd;
  }

  .qty-btn {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    font-weight: bold;
    line-height: 1;
    padding: 0;
  }

  .qty-btn:hover {
    background-color: var(--bs-primary);
    color: #fff;
  }
</style>

<script src="<?php echo $basePath; ?>assets/javascripts/cart.js"></script>