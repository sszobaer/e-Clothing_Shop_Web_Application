<?php 
session_start(); 
if (isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velora Admin - Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/after_login.css">
</head>
<body>
    <?php 
        require_once "./sidebar.php";
        require_once "../../controller/userManagementController.php"; 
    ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
                        aria-label="Toggle navigation">
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

        <!-- Customers Content -->
        <div class="container-fluid mt-4">
            <h2>Manage Customers</h2>
            <div class="mb-3">
                <button class="btn btn-primary" onclick="exportCustomers()">
                    <i class="bi bi-download me-2"></i>Export CSV
                </button>
            </div>
            <div class="card">
                <div class="card-header">Customer List</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="customersTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Total Orders</th>
                                    <th>Last Order Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($users)) : ?>
                                    <?php foreach ($users as $user): ?>
                                        <tr data-user-id="<?= htmlspecialchars($user['user_id']); ?>">
                                            <td><?= htmlspecialchars($user['user_id']); ?></td>
                                            <td><?= htmlspecialchars($user['fullName']); ?></td>
                                            <td><?= htmlspecialchars($user['email']); ?></td>
                                            <td><?= htmlspecialchars($user['total_orders'] ?? 0); ?></td>
                                            <td><?= htmlspecialchars($user['last_order_date'] ?? 'N/A'); ?></td>
                                            <td>
                                                <button class="btn btn-primary btn-sm me-1" data-bs-toggle="modal" 
                                                        data-bs-target="#customerDetailsModal" 
                                                        onclick='viewCustomer(<?= json_encode($user); ?>)'>
                                                    <i class="bi bi-eye"></i> View
                                                </button>
                                                <button class="btn btn-info btn-sm me-1" onclick="sendEmail('<?= htmlspecialchars($user['email']); ?>')">
                                                    <i class="bi bi-envelope"></i> Email
                                                </button>
                                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" 
                                                        data-bs-target="#editCustomerModal"
                                                        onclick='fillEditModal(<?= json_encode($user); ?>)'>
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No customers found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Details Modal -->
        <div class="modal fade" id="customerDetailsModal" tabindex="-1" 
             aria-labelledby="customerDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customerDetailsModalLabel">Customer Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Customer ID:</strong> <span id="customerId"></span></p>
                        <p><strong>Name:</strong> <span id="customerName"></span></p>
                        <p><strong>Email:</strong> <span id="customerEmail"></span></p>
                        <p><strong>Total Orders:</strong> <span id="customerOrders"></span></p>
                        <p><strong>Last Order Date:</strong> <span id="customerLastOrder"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Customer Modal -->
        <div class="modal fade" id="editCustomerModal" tabindex="-1" 
             aria-labelledby="editCustomerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="editCustomerForm" method="POST" action="../../controller/updateUserController.php">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCustomerModalLabel">Edit Customer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="user_id" id="editUserId">
                            <div class="mb-3">
                                <label for="editFullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="editFullName" name="fullName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="editEmail" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="editTotalOrders" class="form-label">Total Orders</label>
                                <input type="number" class="form-control" id="editTotalOrders" name="total_orders">
                            </div>
                            <div class="mb-3">
                                <label for="editLastOrderDate" class="form-label">Last Order Date</label>
                                <input type="date" class="form-control" id="editLastOrderDate" name="last_order_date">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // View Modal
        function viewCustomer(user) {
            document.getElementById('customerId').textContent = user.user_id;
            document.getElementById('customerName').textContent = user.fullName;
            document.getElementById('customerEmail').textContent = user.email;
            document.getElementById('customerOrders').textContent = user.total_orders ?? 0;
            document.getElementById('customerLastOrder').textContent = user.last_order_date ?? 'N/A';
        }

        // Fill Edit Modal
        function fillEditModal(user) {
            document.getElementById('editUserId').value = user.user_id;
            document.getElementById('editFullName').value = user.fullName;
            document.getElementById('editEmail').value = user.email;
            document.getElementById('editTotalOrders').value = user.total_orders ?? 0;
            document.getElementById('editLastOrderDate').value = user.last_order_date ?? '';
        }

        // Realistic mailto email link
        function sendEmail(email) {
            window.location.href = `mailto:${email}?subject=Hello from Velora Admin&body=Dear Customer,`;
        }

        // Export users to CSV
        function exportCustomers() {
            const table = document.getElementById('customersTable');
            let csv = [];
            const rows = table.querySelectorAll('tr');
            for (let i = 0; i < rows.length; i++) {
                const cols = rows[i].querySelectorAll('td, th');
                const row = [];
                for (let j = 0; j < cols.length - 1; j++) {
                    row.push(cols[j].innerText);
                }
                csv.push(row.join(','));
            }
            const csvContent = "data:text/csv;charset=utf-8," + csv.join("\n");
            const link = document.createElement("a");
            link.setAttribute("href", encodeURI(csvContent));
            link.setAttribute("download", "customers.csv");
            link.click();
        }
    </script>
</body>
</html>
<?php
} else {
    header("Location: ../login.php");
    exit();
}
?>
