<?php 
    session_start(); 
    if(isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velora Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/after_login.css">
</head>
<body>
    <?php require_once "./sidebar.php"?>
    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i class="bi bi-person-circle"></i> Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="container-fluid mt-4">
            <h2>Welcome to Velora Admin Panel</h2>
            <div class="row mt-4">
                <!-- Card: Total Sales -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Total Sales</div>
                        <div class="card-body">
                            <h5 class="card-title">$12,345</h5>
                            <p class="card-text">Total revenue this month</p>
                        </div>
                    </div>
                </div>
                <!-- Card: New Orders -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">New Orders</div>
                        <div class="card-body">
                            <h5 class="card-title">24</h5>
                            <p class="card-text">Pending orders</p>
                        </div>
                    </div>
                </div>
                <!-- Card: Active Users -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Active Users</div>
                        <div class="card-body">
                            <h5 class="card-title">1,234</h5>
                            <p class="card-text">Users online now</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="card mt-4">
                <div class="card-header">Recent Orders</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#1234</td>
                                <td>John Doe</td>
                                <td>2025-10-01</td>
                                <td>$150.00</td>
                                <td><span class="badge bg-success">Delivered</span></td>
                                <td><button class="btn btn-primary btn-sm">View</button></td>
                            </tr>
                            <tr>
                                <td>#1235</td>
                                <td>Jane Smith</td>
                                <td>2025-10-01</td>
                                <td>$89.99</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td><button class="btn btn-primary btn-sm">View</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    } else {
        header("Location: ../login.php");
        exit();
    }
?>