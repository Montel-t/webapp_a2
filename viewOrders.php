<style>
    .grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Creates a responsive grid */
    gap: 20px; /* Space between items */
    padding: 20px; /* Padding around the grid */
}

.grid-item {
    display: flex;
    flex-direction: column;
    align-items: center; /* Center items horizontally */
    text-align: center; /* Center text */
    border: 1px solid #CCC;
    border-radius: 5px;
    padding: 15px;
    background-color: #f9f9f9; /* Light background for each product */
}

.product-image {
    width: 100%; /* Make image fill the container */
    height: auto;
    max-height: 200px; /* Limit image height */
    object-fit: contain; /* Ensure aspect ratio is maintained */
    margin-bottom: 15px; /* Space below the image */
}

.add-to-cart-form {
    margin-top: auto; /* Pushes the form to the bottom of the flex container */
}

.quantity-input {
    width: 60px;
    margin-right: 10px;
}

.add-to-cart-button {
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
}

.add-to-cart-button:hover {
    background-color: #45a049;
}

.product-image:hover {
    transform: scale(1.05);
    transition: transform 0.5s ease;
}

.grid-item {
    box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.grid-item:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 12px rgba(0,0,0,0.2);
}

.grid-item {
    box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.grid-item:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 12px rgba(0,0,0,0.2);
}

<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

body {
    font-family: 'Roboto', sans-serif;
}

@media (max-width: 768px) {
    .side_bar {
        display: none;
    }
}

.header {
    position: sticky;
    top: 0;
    background-color: #FFF;
    z-index: 1000;
}


</style>
<?php
session_start();
require_once "includes/dbConnect.php";

if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = 'You must be logged in to view your orders.';
    header("Location: signin.php");
    exit();
}

$userId = $_SESSION['user_id'];

// Handle the status update form submission
if (isset($_POST['updateStatus']) && isset($_POST['orderId'])) {
    $orderId = $_POST['orderId'];
    $updateQuery = "UPDATE orders SET status = 'Complete' WHERE order_id = ? AND customer_id = ?";
    $stmt = $dbConn->prepare($updateQuery);
    $stmt->bind_param("ii", $orderId, $userId);
    if ($stmt->execute()) {
        echo "<script>alert('Order status updated successfully.');</script>";
    } else {
        echo "<script>alert('Error updating order status.');</script>";
    }
    $stmt->close();
    // Refresh the page to show the updated status
    echo "<meta http-equiv='refresh' content='0'>";
}

// Rest of your script continues...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <style>
        /* Insert the provided CSS here */
    </style>
</head>
<body>
<?php include("templates/header.php"); ?>
<?php include("templates/circle.php"); ?>

<div class="content1">
    <h3>Your Orders</h3>
    <div class="products-display grid-container">
        <?php
        $query = "SELECT orders.order_id, orders.status, order_items.product_id, order_items.quantity, products.name, products.price, products.image_url FROM orders 
                  INNER JOIN order_items ON orders.order_id = order_items.order_id 
                  INNER JOIN products ON order_items.product_id = products.product_id 
                  WHERE orders.customer_id = ? ORDER BY orders.order_date DESC";
        if ($stmt = $dbConn->prepare($query)) {
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='grid-item'>";
                    echo "<img src='" . htmlspecialchars($row['image_url']) . "' alt='" . htmlspecialchars($row['name']) . "' class='product-image'>";
                    echo "<h4>" . htmlspecialchars($row['name']) . "</h4>";
                    echo "<p>Quantity: " . htmlspecialchars($row['quantity']) . "</p>";
                    echo "<p>Price: $" . number_format($row['price'], 2) . "</p>";
                     // Display current status
                     echo "<p>Status: " . htmlspecialchars($row['status']) . "</p>";

                     // Show a button to mark the order as complete if it's not already
                     if ($row['status'] !== 'Complete') {
                         echo "<form method='POST'>";
                         echo "<input type='hidden' name='orderId' value='{$row['order_id']}'>";
                         echo "<button type='submit' name='updateStatus' class='add-to-cart-button'>Mark as Complete</button>";
                         echo "</form>";
                     }
                    echo "</div>";
                }
            } else {
                echo "<p>You have no orders.</p>";
            }
            $stmt->close();
        } else {
            echo "<p>Error preparing query.</p>";
        }
        ?>
    </div>
</div>

<?php include("templates/footer.php"); ?>
</body>
</html>
