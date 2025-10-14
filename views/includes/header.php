<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Detect current directory depth (for correct linking)
$isInViews = strpos($_SERVER['REQUEST_URI'], '/views/') !== false;
$basePath = $isInViews ? '../' : '';

// Session-based flags
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$userRole = $_SESSION['role'] ?? null;
?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <!-- Brand -->
    <a class="navbar-brand fw-bold" href="<?php echo $basePath; ?>index.php">Velora</a>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Nav Links -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">

        <li class="nav-item">
          <a class="nav-link" href="<?php echo $basePath; ?>index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo $basePath; ?>views/men.php">Men</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo $basePath; ?>views/collections.php">Collections</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Sale</a>
        </li>

        <a class="nav-link" href="javascript:void(0)" id="cartButton">
          <i class="fa-solid fa-cart-shopping me-1"></i> Cart
        </a>


        <!-- My Account -->
        <?php if ($isLoggedIn): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-user me-1"></i> My Account
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
              <?php if ($userRole === 'admin'): ?>
                <li><a class="dropdown-item" href="<?php echo $basePath; ?>views/admin/dashboard.php">Admin Dashboard</a></li>
              <?php else: ?>
                <li><a class="dropdown-item" href="<?php echo $basePath; ?>views/user/dashboard.php">User Dashboard</a></li>
              <?php endif; ?>
              <li><a class="dropdown-item text-danger" href="<?php echo $basePath; ?>controller/logoutController.php">Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-user me-1"></i> My Account
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
              <li><a class="dropdown-item" href="<?php echo $basePath; ?>views/login.php">Login</a></li>
              <li><a class="dropdown-item" href="<?php echo $basePath; ?>views/registration.php">Register</a></li>
            </ul>
          </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>

<!-- Include global cart sidebar -->
<?php include $basePath . 'views/includes/cartSidebar.php'; ?>