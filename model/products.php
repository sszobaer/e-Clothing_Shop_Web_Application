<?php
$basePath = dirname(__DIR__); 
require_once $basePath . '/config/db.php';

    function insertProducts($product) {
    $conn = getConnection();

    $sql = "INSERT INTO products (
        product_id, name, category, price, stock, image, created_at, updated_at
    ) VALUES (
        NULL,
        '{$product['name']}',
        '{$product['category']}',
        '{$product['price']}',
        '{$product['stock']}',
        '{$product['image']}',
        '{$product['createdAt']}',
        '{$product['updatedAt']}'
    )";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "Insert error: " . mysqli_error($conn); // Debugging
        return false;
    }
}

function getAllProducts() {
    $conn = getConnection();
    $sql = "SELECT * FROM products ORDER BY product_id DESC";
    $result = mysqli_query($conn, $sql);

    $products = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
    }
    return $products;
}
?>