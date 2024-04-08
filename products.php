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
<?php include("templates/header.php"); ?>
<?php include("templates/circle.php"); ?>
<?php
session_start();
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
                <!-- <form action="addToCart.php" method="post" class="add-to-cart-form">
                    <input type="hidden" name="productId" value="<?php echo $product['product_id']; ?>">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" name="addToCart" class="add-to-cart-button">Add to Cart</button>
                </form> -->
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
</div>

        <h4>Description</h4>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </div>
    <div class="side_bar">
        <a href ="signin.php">
            <h3>Sign In</h3>
        </a>
        
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </div>
</div>
<?php include("templates/footer.php"); ?>