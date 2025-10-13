<?php
$basePath = dirname(__DIR__);

require_once $basePath . '/model/products.php';
require_once $basePath . '/config/db.php';


// Fetch products
$products = getAllProducts();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $name = trim($_POST['product_name']);
    $category = trim($_POST['category']);
    $price = trim($_POST['price']);
    $stock = trim($_POST['stock']);
    $createdAt = date('Y-m-d H:i:s');
    $updatedAt = date('Y-m-d H:i:s');

    // Check if all fields are filled
    if (empty($name) || empty($category) || empty($price) || empty($stock) || empty($_FILES['product_image']['name'])) {
        echo "<script>
                alert('Please fill out all fields before submitting.');
                window.history.back();
              </script>";
        exit();
    }

    // Image upload handling
    $imageName = uniqid() . '_' . basename($_FILES['product_image']['name']);
    $uploadDir = '../uploads/products/';
    $uploadPath = $uploadDir . $imageName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $uploadPath)) {

        // Prepare product data
        $product = [
            'name' => $name,
            'category' => $category,
            'price' => $price,
            'stock' => $stock,
            'image' => $imageName,
            'createdAt' => $createdAt,
            'updatedAt' => $updatedAt
        ];

        // Insert into DB
        if (insertProducts($product)) {
            header("Location: ../views/admin/products.php?success=1");
            exit();
        } else {
            echo "<script>
                    alert('Error inserting product into the database.');
                    window.history.back();
                  </script>";
            exit();
        }
    } else {
        echo "<script>
                alert('Error uploading image. Please try again.');
                window.history.back();
              </script>";
        exit();
    }
}
?>
