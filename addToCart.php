<?php
session_start(); // Start the session at the very top of the script
?>
<?php 
require_once "includes/dbConnect.php";
if(!isset($_SESSION["user_info"]) || !is_array($_SESSION["user_info"]) || $_SESSION["user_info"]["module"] != 1){
    header("Location: ./signin.php?not_set");
    exit();
}?>
<?php
// session_start();

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