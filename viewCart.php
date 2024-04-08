<?php
session_start();
require_once "includes/dbConnect.php"; 

// Handle POST requests for cart updates
if (isset($_POST['updateCart'])) {
    foreach ($_POST['quantities'] as $productId => $quantity) {
        if ($quantity == 0) {
            unset($_SESSION['cart'][$productId]); // Remove item if quantity is 0
        } else {
            $_SESSION['cart'][$productId] = $quantity; // Update quantity
        }
    }
}

// Display Cart
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "Your cart is empty.";
} else {
    echo "<h3>Your Cart</h3>";
    echo "<form action='' method='post'>";
    echo "<ul>";

    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $productId => $quantity) {
        // Fetch product details from the database using $productId
        $stmt = $dbConn->prepare("SELECT name, price FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($product = $result->fetch_assoc()) {
            echo "<li>";
            echo "Product: " . htmlspecialchars($product['name']) . ", ";
            echo "Price: $" . number_format($product['price'], 2) . ", ";
            echo "Quantity: <input type='number' name='quantities[$productId]' value='$quantity' min='0' max='99'>";
            echo "</li>";
            $totalPrice += $product['price'] * $quantity;
        }
    }

    echo "</ul>";
    echo "<p>Total Price: $" . number_format($totalPrice, 2) . "</p>";
    echo "<button type='submit' name='updateCart'>Update Cart</button>";
    echo "</form>";
    echo "<a href='checkout.php'>Proceed to Checkout</a>";
}

?>
