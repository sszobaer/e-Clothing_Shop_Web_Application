<?php
session_start();
if (isset($_SESSION['email'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Velora Admin - Products</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="../../assets/css/after_login.css">
    </head>

    <body>
        <?php 
            require_once "./sidebar.php";
            require_once "../../controllers/addProductController.php";
        ?>
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

            <!-- Products Content -->
            <div class="container-fluid mt-4">
                <h2>Manage Products</h2>
                <div class="mb-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        <i class="bi bi-plus-circle me-2"></i>Add Product
                    </button>
                </div>

                <div class="card">
                    <div class="card-header">Product List</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($products)) { ?>
                                        <?php foreach ($products as $product) { ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($product['product_id']); ?></td>
                                                <td><?php echo htmlspecialchars($product['name']); ?></td>
                                                <td><?php echo htmlspecialchars($product['category']); ?></td>
                                                <td> &#2547;<?php echo number_format($product['price'], 2); ?></td>
                                                <td><?php echo htmlspecialchars($product['stock']); ?></td>
                                                <td>
                                                    <?php if (!empty($product['image'])) { ?>
                                                        <img src="../../uploads/products/<?php echo htmlspecialchars($product['image']); ?>"
                                                            alt="Product Image"
                                                            style="width:60px; height:60px; object-fit:cover; border-radius:5px;">
                                                    <?php } else { ?>
                                                        <span class="text-muted">No image</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm me-1">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </button>
                                                    <form action="../controllers/delete_product.php" method="POST" style="display:inline;">
                                                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this product?');">
                                                            <i class="bi bi-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">No products found.</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Add Product Modal -->
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="../../controllers/addProductController.php" method="POST" enctype="multipart/form-data" id="addProductForm">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="productName" name="product_name" placeholder="Enter product name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="productCategory" class="form-label">Category</label>
                                    <select class="form-select" id="productCategory" name="category" required>
                                        <option value="">Select Category</option>
                                        <option value="Casual">Casual</option>
                                        <option value="Outerwear">Outerwear</option>
                                        <option value="Formal">Formal</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="productPrice" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="productPrice" name="price" placeholder="Enter price" required>
                                </div>

                                <div class="mb-3">
                                    <label for="productStock" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="productStock" name="stock" placeholder="Enter stock quantity" required>
                                </div>

                                <div class="mb-3">
                                    <label for="productImage" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" id="productImage" name="product_image" accept="image/*" required>
                                    <img id="imagePreview" class="image-preview mt-2" alt="Image Preview" style="max-width: 100%; display: none;">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="saveProduct">Save Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                // Image preview functionality
                document.getElementById('productImage').addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    const preview = document.getElementById('imagePreview');
                    if (file) {
                        preview.src = URL.createObjectURL(file);
                        preview.style.display = 'block';
                    } else {
                        preview.style.display = 'none';
                    }
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