<?php include("templates/header.php"); ?>
<?php include("templates/circle.php"); ?>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
<style>
    .content, .side_bar {
        margin: 20px;
        padding: 15px;
        background-color: #f9f9f9;
        border: 1px solid #CCC;
        border-radius: 5px;
        text-align: left;
    }

    body {
        font-family: 'Roboto', sans-serif;
    }

    .header {
        text-align: center;
        background-color: #FFF;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .header h1 {
        margin: 0;
        color: #333;
    }

    @media (max-width: 768px) {
        .side_bar {
            display: none;
        }
    }
</style>
<body>
<div class="header">
    <h1>About WatchStore</h1>
</div>
<div class="row">
    <div class="content">
        <h3>Our Mission</h3>
        <p>At WatchStore, our mission is to provide watch enthusiasts with a platform that not only offers a wide selection of high-quality timepieces but also enriches their appreciation for the art and craftsmanship behind each watch. We are dedicated to bridging the gap between watchmakers and consumers, offering an immersive experience that goes beyond the traditional online shopping model.</p>
        
        <h3>Our Vision</h3>
        <p>Our vision is to become a globally recognized name in the luxury watch industry, known for our unparalleled selection, expert curation, and deep respect for the horology community. We aim to innovate the way people discover, learn about, and acquire luxury watches, making WatchStore a destination for collectors and enthusiasts at all levels.</p>

        <h3>Core Values</h3>
        <ul>
            <li><strong>Passion for Watches:</strong> Our love for horology drives everything we do.</li>
            <li><strong>Commitment to Quality:</strong> We meticulously curate our collection to ensure every timepiece meets our high standards.</li>
            <li><strong>Knowledge Sharing:</strong> We believe in educating our customers, offering detailed insights into the history, mechanics, and value of our watches.</li>
            <li><strong>Community:</strong> We're dedicated to building a vibrant community of watch lovers, offering a space for sharing, learning, and celebrating the world of watches.</li>
        </ul>
    </div>
    <div class="side_bar">
        <h3>Who We Are</h3>
        <p>The WatchStore team is composed of seasoned collectors, experienced horologists, and dedicated customer service professionals. Together, we share a commitment to bringing the best of the watch world to you.</p>
    </div>
</div>
<?php include("templates/footer.php"); ?>
