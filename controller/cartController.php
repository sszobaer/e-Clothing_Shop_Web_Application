<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$action = $input['action'] ?? '';
$product = $input['product'] ?? [];
$id = $input['id'] ?? '';

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

switch ($action) {
  case 'add':
    $id = $product['id'];
    if (isset($_SESSION['cart'][$id])) {
      $_SESSION['cart'][$id]['quantity']++;
    } else {
      $_SESSION['cart'][$id] = [
        'id' => $id,
        'name' => $product['name'],
        'price' => $product['price'],
        'image' => $product['image'],
        'quantity' => 1
      ];
    }
    echo json_encode(['success' => true, 'cart' => array_values($_SESSION['cart'])]);
    break;

  case 'increase':
    if (isset($_SESSION['cart'][$id])) {
      $_SESSION['cart'][$id]['quantity']++;
    }
    echo json_encode(['cart' => array_values($_SESSION['cart'])]);
    break;

  case 'decrease':
    if (isset($_SESSION['cart'][$id])) {
      $_SESSION['cart'][$id]['quantity']--;
      if ($_SESSION['cart'][$id]['quantity'] <= 0) {
        unset($_SESSION['cart'][$id]);
      }
    }
    echo json_encode(['cart' => array_values($_SESSION['cart'])]);
    break;

  default:
    echo json_encode(['success' => false, 'message' => 'Invalid action']);
    break;
}
?>
