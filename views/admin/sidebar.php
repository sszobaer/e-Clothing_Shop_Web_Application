<?php
// Get current file name (like 'dashboard.php', 'products.php')
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg px-3" style="background-color: #17524e;">
    <button class="btn btn-light d-lg-none" id="toggleSidebar">☰</button>
    <span class="ms-2 text-white fw-bold">Velora Admin</span>
</nav>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <h3 class="text-center mb-4 text-white">Velora Admin</h3>
    <nav class="nav flex-column">
        <a class="nav-link <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>" href="./dashboard.php">
            <i class="bi bi-house-door me-2"></i>Dashboard
        </a>
        <a class="nav-link <?php echo ($current_page == 'products.php') ? 'active' : ''; ?>" href="./products.php">
            <i class="bi bi-shop me-2"></i>Products
        </a>
        <a class="nav-link <?php echo ($current_page == 'orders.php') ? 'active' : ''; ?>" href="./orders.php">
            <i class="bi bi-cart me-2"></i>Orders
        </a>
        <a class="nav-link <?php echo ($current_page == 'customers.php') ? 'active' : ''; ?>" href="./customers.php">
            <i class="bi bi-person me-2"></i>Customers
        </a>
        <a class="nav-link <?php echo ($current_page == 'settings.php') ? 'active' : ''; ?>" href="./settings.php">
            <i class="bi bi-gear me-2"></i>Settings
        </a>
        <a class="nav-link" href="#">
            <i class="bi bi-box-arrow-right me-2"></i>Logout
        </a>
    </nav>
</div>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <!-- Your page content here -->
</div>

<!-- JS for toggle sidebar -->
<script>
    const toggleBtn = document.getElementById("toggleSidebar");
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("mainContent");

    toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("active");
        mainContent.classList.toggle("shifted");
    });

    // Optional: Close sidebar on link click for mobile
    document.querySelectorAll('.sidebar a').forEach(link => {
        link.addEventListener('click', () => {
            if(window.innerWidth < 769) {
                sidebar.classList.remove('active');
                mainContent.classList.remove('shifted');
            }
        });
    });
</script>
