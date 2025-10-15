<?php
    session_start(); 
    if(isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velora Customer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/after_login.css">
</head>

<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg px-3" style="background-color: #17524e;">
    <button class="btn btn-light d-lg-none" id="toggleSidebar">☰</button>
</nav>
   <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h3 class="text-nav text-center mb-4">Velora Customer Portal</h3>
        <nav class="nav flex-column">
            <a class="nav-link active" href="#dashboard" onclick="showSection('dashboard')"><i class="bi bi-house-door me-2"></i>Dashboard</a>
            <a class="nav-link" href="#cart" onclick="showSection('cart')"><i class="bi bi-cart me-2"></i>Cart</a>
            <a class="nav-link" href="#orders" onclick="showSection('orders')"><i class="bi bi-cart-check me-2"></i>Order History</a>
            <a class="nav-link" href="#profile" onclick="showSection('profile')"><i class="bi bi-person me-2"></i>Profile</a>
            <a class="nav-link" href="#settings" onclick="showSection('settings')"><i class="bi bi-gear me-2"></i>Settings</a>
            <a class="nav-link" href="../../controller/logoutController.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
        </nav>
    </div>

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
                            <a class="nav-link text-white" href="#profile" onclick="showSection('profile')"><i class="bi bi-person-circle"></i> Welcome, <span id="userName"><?= "MR." ." ". $_SESSION['fullName'] ?></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="container-fluid mt-4">
            <div id="dashboard" class="section active">
                <h2>Welcome to Your Velora Dashboard</h2>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Cart Items</div>
                            <div class="card-body">
                                <h5 class="card-title" id="cartCount">2 Items</h5>
                                <p class="card-text">You have items in your cart.</p>
                                <a href="#cart" class="btn btn-primary" onclick="showSection('cart')">View Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Recent Orders</div>
                            <div class="card-body">
                                <h5 class="card-title">5 Orders</h5>
                                <p class="card-text">You have 5 orders in the past 30 days.</p>
                                <a href="#orders" class="btn btn-primary" onclick="showSection('orders')">View Orders</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Saved Addresses</div>
                            <div class="card-body">
                                <h5 class="card-title">1 Address</h5>
                                <p class="card-text">Manage your shipping addresses.</p>
                                <a href="#profile" class="btn btn-primary" onclick="showSection('profile')">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart Section -->
            <div id="cart" class="section d-none">
                <h2>Your Cart</h2>
                <div class="card mt-4">
                    <div class="card-header">Cart Items</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="cartTable">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-product-id="P001">
                                        <td>
                                            <div class="cart-item d-flex align-items-center">
                                                <img src="https://via.placeholder.com/50" alt="Velora T-Shirt" class="me-2">
                                                Velora T-Shirt
                                            </div>
                                        </td>
                                        <td>$29.99</td>
                                        <td>
                                            <input type="number" class="form-control quantity-input" value="2" min="1" onchange="updateCartTotal()">
                                        </td>
                                        <td class="item-total">$59.98</td>
                                        <td>
                                            <button class="btn btn-danger btn-sm" onclick="removeFromCart('P001')"><i class="bi bi-trash"></i> Remove</button>
                                        </td>
                                    </tr>
                                    <tr data-product-id="P002">
                                        <td>
                                            <div class="cart-item d-flex align-items-center">
                                                <img src="https://via.placeholder.com/50" alt="Velora Jacket" class="me-2">
                                                Velora Jacket
                                            </div>
                                        </td>
                                        <td>$89.99</td>
                                        <td>
                                            <input type="number" class="form-control quantity-input" value="1" min="1" onchange="updateCartTotal()">
                                        </td>
                                        <td class="item-total">$89.99</td>
                                        <td>
                                            <button class="btn btn-danger btn-sm" onclick="removeFromCart('P002')"><i class="bi bi-trash"></i> Remove</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-end">
                            <h5>Total: <span id="cartTotal">$149.97</span></h5>
                            <button class="btn btn-primary mt-2" onclick="proceedToCheckout()">Proceed to Checkout</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order History Section -->
            <div id="orders" class="section d-none">
                <h2>Order History</h2>
                <div class="card mt-4">
                    <div class="card-header">Your Orders</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="ordersTable">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-order-id="1234">
                                        <td>#1234</td>
                                        <td>2025-10-01</td>
                                        <td>$150.00</td>
                                        <td>Cash on Delivery</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" onclick="viewOrder('1234')"><i class="bi bi-eye"></i> View</button>
                                        </td>
                                    </tr>
                                    <tr data-order-id="1235">
                                        <td>#1235</td>
                                        <td>2025-09-28</td>
                                        <td>$89.99</td>
                                        <td>Online Payment</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" onclick="viewOrder('1235')"><i class="bi bi-eye"></i> View</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Section -->
            <div id="profile" class="section d-none">
                <h2>Your Profile</h2>
                <div class="card mt-4">
                    <div class="card-header">Profile Information</div>
                    <div class="card-body">
                        <form id="profileForm">
                            <div class="mb-3">
                                <label for="profileName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="profileName" value=<?=$_SESSION['fullName'] ?> required>
                            </div>
                            <div class="mb-3">
                                <label for="profileEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="profileEmail" value=<?=$_SESSION['email'] ?> required>
                            </div>
                            <div class="mb-3">
                                <label for="profilePhone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="profilePhone" value=<?=$_SESSION['phone'] ?>>
                            </div>
                            <div class="mb-3">
                                <label for="profileAddress" class="form-label">Address</label>
                                <textarea class="form-control" id="profileAddress" rows="3">123 Main St, City, State 12345</textarea>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="saveProfile()">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Settings Section -->
            <div id="settings" class="section d-none">
                <h2>Account Settings</h2>
                <div class="card mt-4">
                    <div class="card-header">Manage Your Account</div>
                    <div class="card-body">
                        <form id="settingsForm">
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="newPassword" placeholder="Enter new password">
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                <label class="form-check-label" for="emailNotifications">Receive Email Notifications</label>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="saveSettings()">Save Settings</button>
                            <button type="button" class="btn btn-warning ms-2" onclick="resetSettings()">Reset</button>
                        </form>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample cart and order data
        const cart = {
            'P001': {
                name: 'Velora T-Shirt',
                price: 29.99,
                quantity: 2,
                image: 'https://via.placeholder.com/50'
            },
            'P002': {
                name: 'Velora Jacket',
                price: 89.99,
                quantity: 1,
                image: 'https://via.placeholder.com/50'
            }
        };

        const orders = {
            '1234': {
                id: '#1234',
                date: '2025-10-01',
                amount: '$150.00',
                payment: 'Cash on Delivery',
                status: 'Delivered',
                product: 'Velora T-Shirt'
            },
            '1235': {
                id: '#1235',
                date: '2025-09-28',
                amount: '$89.99',
                payment: 'Online Payment',
                status: 'Pending',
                product: 'Velora Jacket'
            }
        };

        // Show/hide sections
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.add('d-none');
                section.classList.remove('active');
            });
            const targetSection = document.getElementById(sectionId);
            targetSection.classList.remove('d-none');
            targetSection.classList.add('active');

            document.querySelectorAll('.sidebar .nav-link').forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${sectionId}`) {
                    link.classList.add('active');
                }
            });
        }

        // Update cart total
        function updateCartTotal() {
            let total = 0;
            const rows = document.querySelectorAll('#cartTable tbody tr');
            rows.forEach(row => {
                const productId = row.dataset.productId;
                const quantity = parseInt(row.querySelector('.quantity-input').value);
                const price = cart[productId].price;
                const itemTotal = price * quantity;
                row.querySelector('.item-total').textContent = `$${itemTotal.toFixed(2)}`;
                cart[productId].quantity = quantity;
                total += itemTotal;
            });
            document.getElementById('cartTotal').textContent = `$${total.toFixed(2)}`;
            updateCartCount();
        }

        // Remove item from cart
        function removeFromCart(productId) {
            if (confirm('Remove this item from your cart?')) {
                delete cart[productId];
                document.querySelector(`tr[data-product-id="${productId}"]`).remove();
                updateCartTotal();
                if (Object.keys(cart).length === 0) {
                    document.getElementById('cartTable').innerHTML = '<tr><td colspan="5" class="text-center">Your cart is empty.</td></tr>';
                }
            }
        }

        // Update cart count in dashboard
        function updateCartCount() {
            const count = Object.values(cart).reduce((sum, item) => sum + item.quantity, 0);
            document.getElementById('cartCount').textContent = `${count} Item${count !== 1 ? 's' : ''}`;
        }

        // Proceed to checkout (simulated)
        function proceedToCheckout() {
            if (Object.keys(cart).length === 0) {
                alert('Your cart is empty.');
                return;
            }
            alert('Proceeding to checkout... (In a real app, this would redirect to a checkout page.)');
        }

        // View order details
        function viewOrder(orderId) {
            const order = orders[orderId];
            document.getElementById('orderId').textContent = order.id;
            document.getElementById('orderDate').textContent = order.date;
            document.getElementById('orderAmount').textContent = order.amount;
            document.getElementById('orderPayment').textContent = order.payment;
            document.getElementById('orderStatus').textContent = order.status;
            document.getElementById('orderProduct').textContent = order.product;
        }

        // Save profile (simulated)
        function saveProfile() {
            if (document.getElementById('profileForm').checkValidity()) {
                const name = document.getElementById('profileName').value;
                document.getElementById('userName').textContent = name.split(' ')[0];
                alert('Profile updated successfully! (In a real app, this would update the backend.)');
            } else {
                alert('Please fill in all required fields.');
            }
        }

        // Save settings (simulated)
        function saveSettings() {
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            if (newPassword && newPassword !== confirmPassword) {
                alert('Passwords do not match.');
                return;
            }
            if (document.getElementById('settingsForm').checkValidity()) {
                alert('Settings saved successfully! (In a real app, this would update the backend.)');
            } else {
                alert('Please fill in all required fields.');
            }
        }

        // Reset settings
        function resetSettings() {
            if (confirm('Are you sure you want to reset settings?')) {
                document.getElementById('newPassword').value = '';
                document.getElementById('confirmPassword').value = '';
                document.getElementById('emailNotifications').checked = true;
                alert('Settings reset successfully.');
            }
        }
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
</body>

</html>

<?php
    } else {
        header("Location: ../login.php");
        exit();
    }
?>