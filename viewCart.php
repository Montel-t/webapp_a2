<?php
session_start(); // Start the session at the very top of the script
require_once "includes/dbConnect.php";
if (!isset($_SESSION["user_info"]) || !is_array($_SESSION["user_info"]) || $_SESSION["user_info"]["module"] != 1) {
    header("Location: ./signin.php?not_set");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h3 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }
        form {
            margin-top: 20px;
        }
        input[type='number'], textarea {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box; /* Added box-sizing */
        }
        input[type='submit'] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type='submit']:hover {
            background-color: #45a049;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    
    // session_start(); // Start the session at the very top of the script
    ?>
    <?php 
    require_once "includes/dbConnect.php";
    if(!isset($_SESSION["user_info"]) || !is_array($_SESSION["user_info"]) || $_SESSION["user_info"]["module"] != 1){
        header("Location: ./signin.php?not_set");
        exit();
    }?>
    <?php
    // session_start();
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
                echo "Product: " . htmlspecialchars($product['name']) . " ";
                echo "</br>";
                echo "Price: $" . number_format($product['price'], 2) . " ";
                echo "</br>";
                echo "Quantity: <input type='number' name='quantities[$productId]' value='$quantity' min='0' max='99'>";
                echo "</li>";
                $totalPrice += $product['price'] * $quantity;
            }
        }
    
        echo "</ul>";
        echo "<p>Total Price: $" . number_format($totalPrice, 2) . "</p>";
        echo "<button type='submit' name='updateCart'>Update Cart</button>";
        echo "</form>";
    
        // Shipping address form
        echo "<h3>Shipping Address</h3>";
        echo "<form action='checkout.php' method='post'>";
        echo "<label for='shippingAddress'>Enter your shipping address:</label><br/>";
        echo "<textarea id='shippingAddress' name='shipping_address' rows='4' cols='50' required></textarea><br/>";
        echo "<input type='submit' value='Proceed to Checkout'>";
        echo "</form>";
    }
    
    ?>
    <br>
    <a href='Users.php'>Return to Products</a>
    
</div>

</body>
</html>