<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velora Admin - Orders</title>
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

        <!-- Orders Content -->
        <div class="container-fluid mt-4">
            <h2>Manage Orders</h2>
            <div class="mb-3">
                <div class="input-group w-50">
                    <input type="text" class="form-control" placeholder="Search orders..." id="searchOrders">
                    <button class="btn btn-primary" type="button"><i class="bi bi-search"></i></button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Order List</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="ordersTable">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-order-id="1234" data-product-id="P001" data-stock="50">
                                    <td>#1234</td>
                                    <td>John Doe</td>
                                    <td>2025-10-01</td>
                                    <td>$150.00</td>
                                    <td>Cash on Delivery</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" onclick="viewOrder('1234')"><i class="bi bi-eye"></i> View</button>
                                        <button class="btn btn-success btn-sm confirm-cod" onclick="confirmCOD('1234', 'P001')">Confirm COD</button>
                                    </td>
                                </tr>
                                <tr data-order-id="1235" data-product-id="P002" data-stock="20">
                                    <td>#1235</td>
                                    <td>Jane Smith</td>
                                    <td>2025-10-01</td>
                                    <td>$89.99</td>
                                    <td>Online Payment</td>
                                    <td><span class="badge bg-success">Delivered</span></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" onclick="viewOrder('1235')"><i class="bi bi-eye"></i> View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Details Modal -->
        <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderDetailsModalLabel">Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Order ID:</strong> <span id="orderId"></span></p>
                        <p><strong>Customer:</strong> <span id="orderCustomer"></span></p>
                        <p><strong>Date:</strong> <span id="orderDate"></span></p>
                        <p><strong>Amount:</strong> <span id="orderAmount"></span></p>
                        <p><strong>Payment Method:</strong> <span id="orderPayment"></span></p>
                        <p><strong>Status:</strong> <span id="orderStatus"></span></p>
                        <p><strong>Product:</strong> <span id="orderProduct"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample product data (in a real application, this would come from a backend)
        const products = {
            'P001': {
                name: 'Velora T-Shirt',
                stock: 50
            },
            'P002': {
                name: 'Velora Jacket',
                stock: 20
            }
        };

        // View order details
        function viewOrder(orderId) {
            const row = document.querySelector(`tr[data-order-id="${orderId}"]`);
            document.getElementById('orderId').textContent = row.cells[0].textContent;
            document.getElementById('orderCustomer').textContent = row.cells[1].textContent;
            document.getElementById('orderDate').textContent = row.cells[2].textContent;
            document.getElementById('orderAmount').textContent = row.cells[3].textContent;
            document.getElementById('orderPayment').textContent = row.cells[4].textContent;
            document.getElementById('orderStatus').textContent = row.cells[5].textContent;
            const productId = row.dataset.productId;
            document.getElementById('orderProduct').textContent = products[productId].name;
        }

        // Confirm COD delivery and reduce stock
        function confirmCOD(orderId, productId) {
            const row = document.querySelector(`tr[data-order-id="${orderId}"]`);
            const statusCell = row.cells[5];
            const currentStock = parseInt(row.dataset.stock);

            if (row.cells[4].textContent === 'Cash on Delivery' && statusCell.textContent.includes('Pending')) {
                // Update status to Delivered
                statusCell.innerHTML = '<span class="badge bg-success">Delivered</span>';
                // Disable Confirm COD button
                row.cells[6].querySelector('.confirm-cod').disabled = true;
                // Reduce stock by 1
                products[productId].stock = currentStock - 1;
                row.dataset.stock = products[productId].stock;
                // In a real app, send updated stock to backend
                alert(`Order #${orderId} confirmed as delivered. Stock for ${products[productId].name} reduced to ${products[productId].stock}.`);
            } else {
                alert('This order is not eligible for COD confirmation.');
            }
        }

        // Search functionality (client-side)
        document.getElementById('searchOrders').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#ordersTable tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
    </script>
</body>

</html>