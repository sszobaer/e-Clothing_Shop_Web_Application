<?php
session_start();
require_once "../controller/addProductController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Men's Collection - Velora</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
  <?php require_once "../views/includes/header.php"?>

  <!-- Men's Collection -->
  <section class="collections-section py-5">
    <div class="container">
      <h2 class="text-center mb-5 section-title">Men's Collection</h2>
      <div class="row g-4" id="collectionGrid">

        <?php if (!empty($products)) { ?>
          <?php foreach ($products as $product) { ?>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="card h-100 shadow-sm">
                <img src="../uploads/products/<?php echo htmlspecialchars($product['image']); ?>" 
                     class="card-img-top" 
                     alt="<?php echo htmlspecialchars($product['name']); ?>">
                <div class="card-body text-center">
                  <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                  <p class="text-muted mb-2"><?php echo htmlspecialchars($product['category']); ?></p>
                  <p class="fw-bold mb-3">&#2547;<?php echo number_format($product['price'], 2); ?></p>
                  <button class="btn btn-primary add-to-cart"
                          data-id="<?php echo $product['product_id']; ?>"
                          data-name="<?php echo htmlspecialchars($product['name']); ?>"
                          data-price="<?php echo htmlspecialchars($product['price']); ?>"
                          data-image="../uploads/products/<?php echo htmlspecialchars($product['image']); ?>">
                    <i class="fa-solid fa-cart-plus me-2"></i>Add to Cart
                  </button>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } else { ?>
          <div class="text-center text-muted">No products found.</div>
        <?php } ?>

      </div>
    </div>
  </section>

  <?php require_once "../views/footer.php"; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
  // Update cart display
  function updateCartUI(cart) {
    const cartItems = document.getElementById('cartItems');
    const cartTotal = document.getElementById('cartTotal');
    cartItems.innerHTML = '';
    let total = 0;

    cart.forEach(item => {
      total += item.price * item.quantity;
      cartItems.insertAdjacentHTML('beforeend', `
        <div class="cart-item d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <img src="${item.image}" alt="${item.name}" width="60" height="60" class="me-2 rounded">
            <div>
              <p class="mb-0 fw-semibold">${item.name}</p>
              <small class="text-muted">৳${item.price} × ${item.quantity}</small>
            </div>
          </div>
          <strong>৳${(item.price * item.quantity).toFixed(2)}</strong>
        </div>
      `);
    });

    cartTotal.textContent = total.toFixed(2);
  }
  </script>
</body>
</html>
