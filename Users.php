<?php
session_start(); // Start the session at the very top of the script
?>
<?php 
require_once "includes/dbConnect.php";
if(!isset($_SESSION["user_info"]) || !is_array($_SESSION["user_info"]) || $_SESSION["user_info"]["module"] != 1){
    header("Location: ./signin.php?not_set");
    exit();
}?>
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 30px;
        padding: 40px;
        justify-content: center;
    }

    .grid-item {
        background-color: #fff;
        border: none;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border-radius: 10px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Ensure content is spaced evenly */
    }

    .product-image {
        width: 100%;
        height: auto;
        object-fit: cover; /* Adjusted for better image display */
    }

    .add-to-cart-form {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px; /* Ensure space between quantity input and button */
        padding: 20px;
    }

    .quantity-input, .add-to-cart-button {
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
    }

    .quantity-input {
        border: 1px solid #ccc;
        width: auto; /* Adjusted for better fit */
    }

    .add-to-cart-button {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .add-to-cart-button:hover {
        background-color: #0056b3;
    }

    .product-image:hover {
        transform: scale(1.02); /* Subtle zoom effect on hover */
        transition: transform 0.3s ease;
    }

    h3, h4, p {
        margin: 10px 0; /* Uniform margin for text elements */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .grid-container {
            padding: 20px;
        }

        .add-to-cart-form {
            flex-direction: column; /* Stack input and button on smaller screens */
        }
    }

    /* Sticky header with improved styling */
    .header {
        background-color: #FFF;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        z-index: 1000;
        position: sticky;
        top: 0;
        padding: 15px 0;
        margin-bottom: 20px; /* Added margin for separation from content */
        text-align: center;
    }
    
    /* Style adjustments for side bar links */
    .side_bar a {
        display: inline-block;
        background-color: #007BFF;
        color: #ffffff;
        padding: 10px 20px;
        margin: 10px 0;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }
    
    .side_bar a:hover {
        background-color: #0056b3;
    }
</style>
<?php include("templates/header.php"); ?>
<?php include("templates/circle.php"); ?>
<?php
// session_start();
require_once "includes/dbConnect.php";

// Fetch products from the database
$query = "SELECT * FROM products WHERE stock > 0"; // Adjust this query as needed
$result = $dbConn->query($query);
?>
<body>
<!-- <div class="header">
    <h1>WELCOME TO WATCHSTORE</h1>
</div> -->
<div class="row">
    <div class="content">
        <h3>Our Luxury Watches</h3>

        <!-- Products Display -->
        <div class="products-display grid-container">
    <?php if ($result->num_rows > 0): ?>
        <?php while($product = $result->fetch_assoc()): ?>
            <div class="product grid-item">
                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image">
                <h4><?php echo htmlspecialchars($product['name']); ?></h4>
                <p><?php echo htmlspecialchars($product['description']); ?></p>
                <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
                <form action="addToCart.php" method="post" class="add-to-cart-form">
                    <input type="hidden" name="productId" value="<?php echo $product['product_id']; ?>">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" name="addToCart" class="add-to-cart-button">Add to Cart</button>
                </form>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
</div>

        <h4>Description</h4>
        <p></p>
    </div>
    <div class="side_bar">
        <a href= "viewCart.php">
            <h3>CART</h3>
        </a>
        <a href= "logout.php">
            <h3>logout</h3>
        </a>
        
        <p></p>
    </div>
</div>
<?php include("templates/footer.php"); ?>