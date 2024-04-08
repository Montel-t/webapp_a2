<?php
session_start();

if (isset($_POST['addToCart'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$productId])) {
        // Update the quantity
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        // Add the new product
        $_SESSION['cart'][$productId] = $quantity;
    }

    // Redirect back to the products page or to the cart page
    header('Location: viewCart.php'); // Adjust the redirection as needed
    exit();
}
?>