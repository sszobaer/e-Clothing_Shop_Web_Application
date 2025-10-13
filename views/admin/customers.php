<?php 
    session_start(); 
    if(isset($_SESSION['email'])) {
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
    <?php require_once "./sidebar.php" ?>

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

        <!-- Customers Content -->
        <div class="container-fluid mt-4">
            <h2>Manage Customers</h2>
            <div class="mb-3">
                <button class="btn btn-primary" onclick="exportCustomers()"><i class="bi bi-download me-2"></i>Export CSV</button>
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
                                <tr data-customer-id="C001">
                                    <td>C001</td>
                                    <td>John Doe</td>
                                    <td>john.doe@email.com</td>
                                    <td>5</td>
                                    <td>2025-10-01</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#customerDetailsModal" onclick="viewCustomer('C001')"><i class="bi bi-eye"></i> View</button>
                                        <button class="btn btn-info btn-sm"><i class="bi bi-envelope"></i> Email</button>
                                    </td>
                                </tr>
                                <tr data-customer-id="C002">
                                    <td>C002</td>
                                    <td>Jane Smith</td>
                                    <td>jane.smith@email.com</td>
                                    <td>3</td>
                                    <td>2025-09-28</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#customerDetailsModal" onclick="viewCustomer('C002')"><i class="bi bi-eye"></i> View</button>
                                        <button class="btn btn-info btn-sm"><i class="bi bi-envelope"></i> Email</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Details Modal -->
        <div class="modal fade" id="customerDetailsModal" tabindex="-1" aria-labelledby="customerDetailsModalLabel" aria-hidden="true">
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
                        <p><strong>Address:</strong> <span id="customerAddress"></span></p>
                        <p><strong>Phone:</strong> <span id="customerPhone"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="editCustomer()">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample customer data
        const customers = {
            'C001': {
                name: 'John Doe',
                email: 'john.doe@email.com',
                orders: 5,
                lastOrder: '2025-10-01',
                address: '123 Main St, City, State 12345',
                phone: '+1 (555) 123-4567'
            },
            'C002': {
                name: 'Jane Smith',
                email: 'jane.smith@email.com',
                orders: 3,
                lastOrder: '2025-09-28',
                address: '456 Oak Ave, Town, State 67890',
                phone: '+1 (555) 987-6543'
            }
        };

        // View customer details
        function viewCustomer(customerId) {
            const customer = customers[customerId];
            document.getElementById('customerId').textContent = customerId;
            document.getElementById('customerName').textContent = customer.name;
            document.getElementById('customerEmail').textContent = customer.email;
            document.getElementById('customerOrders').textContent = customer.orders;
            document.getElementById('customerLastOrder').textContent = customer.lastOrder;
            document.getElementById('customerAddress').textContent = customer.address;
            document.getElementById('customerPhone').textContent = customer.phone;
        }

        // Export customers to CSV (simulated)
        function exportCustomers() {
            let csvContent = "ID,Name,Email,Total Orders,Last Order Date,Address,Phone\n";
            Object.keys(customers).forEach(key => {
                const customer = customers[key];
                csvContent += `${key},${customer.name},${customer.email},${customer.orders},${customer.lastOrder},"${customer.address}",${customer.phone}\n`;
            });
            const blob = new Blob([csvContent], {
                type: 'text/csv'
            });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'customers.csv';
            a.click();
            window.URL.revokeObjectURL(url);
        }

        // Edit customer (placeholder - would open edit form in real app)
        function editCustomer() {
            alert('Edit customer functionality - integrate with backend form.');
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