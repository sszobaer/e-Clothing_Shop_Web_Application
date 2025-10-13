<?php 
    session_start(); 
    if(isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velora Admin - Settings</title>
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

        <!-- Settings Content -->
        <div class="container-fluid mt-4">
            <h2>Settings</h2>
            <div class="row">
                <!-- Site Settings Card -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">Site Settings</div>
                        <div class="card-body">
                            <form id="siteSettingsForm">
                                <div class="mb-3">
                                    <label for="siteName" class="form-label">Site Name</label>
                                    <input type="text" class="form-control" id="siteName" value="Velora" required>
                                </div>
                                <div class="mb-3">
                                    <label for="shippingRate" class="form-label">Shipping Rate ($)</label>
                                    <input type="number" step="0.01" class="form-control" id="shippingRate" value="5.99" required>
                                </div>
                                <div class="mb-3">
                                    <label for="taxRate" class="form-label">Tax Rate (%)</label>
                                    <input type="number" step="0.01" class="form-control" id="taxRate" value="8.25" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Site Settings</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Admin Settings Card -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">Admin Account</div>
                        <div class="card-body">
                            <form id="adminSettingsForm">
                                <div class="mb-3">
                                    <label for="adminEmail" class="form-label">Admin Email</label>
                                    <input type="email" class="form-control" id="adminEmail" value="admin@velora.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="newPassword" placeholder="Enter new password">
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailNotifications">
                                    <label class="form-check-label" for="emailNotifications">Enable Email Notifications</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Admin Settings</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle site settings form
        document.getElementById('siteSettingsForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Site settings saved successfully! (In a real app, this would update the backend.)');
        });

        // Handle admin settings form
        document.getElementById('adminSettingsForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const newPass = document.getElementById('newPassword').value;
            const confirmPass = document.getElementById('confirmPassword').value;
            if (newPass !== confirmPass) {
                alert('Passwords do not match!');
                return;
            }
            alert('Admin settings saved successfully! (In a real app, this would update the backend.)');
        });
    </script>
</body>
</html>
<?php
    } else {
        header("Location: ../login.php");
        exit();
    }
?>