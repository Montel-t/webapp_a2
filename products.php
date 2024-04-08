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

.content {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }

    .product-info {
        padding: 10px;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    h3 {
        color: #333;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .product-description {
        font-size: 16px;
        color: #666;
        margin: 10px 0;
    }

    .product-price {
        font-weight: bold;
        margin-bottom: 20px;
    }

    /* Enhancements for the product display grid */
    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 300px)); /* Adjusted for better spacing */
        gap: 30px; /* Increased gap for a better look */
        justify-content: center; /* Centers grid items when they don't fill the entire row */
    }

    @media (max-width: 768px) {
        .grid-container {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
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
        <div class="products-display grid-container">
            <?php
            // session_start();
            require_once "includes/dbConnect.php";

            $query = "SELECT * FROM products WHERE stock > 0";
            $result = $dbConn->query($query);

            if ($result->num_rows > 0) {
                while ($product = $result->fetch_assoc()) {
                    echo "<div class='product grid-item'>";
                    echo "<div class='product-info'>";
                    echo "<img src='" . htmlspecialchars($product['image_url']) . "' alt='" . htmlspecialchars($product['name']) . "' class='product-image'>";
                    echo "<h4>" . htmlspecialchars($product['name']) . "</h4>";
                    echo "<p class='product-description'>" . htmlspecialchars($product['description']) . "</p>";
                    echo "<p class='product-price'>Price: $" . number_format($product['price'], 2) . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No products found.</p>";
            }
            ?>
        </div>
    </div>
    <div class="side_bar">
        <a href="signin.php">
            <h3>Sign In</h3>
        </a>
        <p>Become a part of our exclusive community and enjoy the benefits.</p>
    </div>
</div>
<?php include("templates/footer.php"); ?>