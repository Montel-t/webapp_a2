<?php
session_start();
require_once 'includes/dbConnect.php';

// 1. Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle it accordingly
    // Consider adding a message to inform the user
    $_SESSION['error'] = 'Please log in to proceed to checkout.';
    header('Location: login.php');
    exit();
}

$customerId = $_SESSION['user_id'];

// 2. Validate the cart is not empty
if (empty($_SESSION['cart'])) {
    // Consider adding an error message to session and redirecting to a product page
    $_SESSION['error'] = 'Your cart is empty.';
    header('Location: products.php'); // Redirect to a page where the user can continue shopping
    exit;
}

// 3. Ensure a shipping address is provided
$shippingAddress = $_POST['shipping_address'] ?? ''; // Use the null coalescing operator to avoid undefined index notice
if (empty($shippingAddress)) {
    // Consider a more user-friendly approach, such as redirecting back to the cart page with an error message
    $_SESSION['error'] = 'Shipping address is required.';
    header('Location: viewCart.php');
    exit;
}

// Calculate total price from the cart
// This is a placeholder. Implement this according to your cart structure.
$totalPrice = array_sum(array_column($_SESSION['cart'], 'price'));

// Begin transaction
$dbConn->begin_transaction();

try {
    // Insert the order
    $sqlOrder = "INSERT INTO orders (customer_id, total_price, shipping_address) VALUES (?, ?, ?)";
    $stmtOrder = $dbConn->prepare($sqlOrder);
    $stmtOrder->bind_param("ids", $customerId, $totalPrice, $shippingAddress);
    $stmtOrder->execute();
    $orderId = $dbConn->insert_id; // Get the ID of the created order
    
    // Insert each order item
    $sqlItem = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
    $stmtItem = $dbConn->prepare($sqlItem);
    
    foreach ($_SESSION['cart'] as $productId => $quantity) {
        // Assuming $quantity is directly the quantity value here
        $stmt = $dbConn->prepare("SELECT price FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($product = $result->fetch_assoc()) {
            $price = $product['price'];
            // Now, insert the order item with the fetched price
            $stmtItem->bind_param("iiid", $orderId, $productId, $quantity, $price);
            $stmtItem->execute();
        }
    }
    
    // Commit transaction
    $dbConn->commit();
    
// Clear the cart and redirect to the View Orders page with a success message
unset($_SESSION['cart']);
$_SESSION['success'] = 'Order placed successfully.';
header('Location: viewOrders.php'); // Redirect to the view orders page
exit(); // Ensure the script stops executing after the redirect
} catch (Exception $e) { // Catch block to handle exceptions
    // Rollback transaction on error
    $dbConn->rollback();
    
    // Log the error and/or add to session error message
    error_log("Error processing order: " . $e->getMessage());
    $_SESSION['error'] = 'There was an error processing your order. Please try again.';
    
    // Redirect back to the cart or an error page
    header('Location: viewCart.php');
    exit();
}