<?php include("templates/header.php"); ?>
<?php include("templates/circle.php"); ?>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .header {
        text-align: center;
        padding: 20px;
        background-color: #f8f9fa;
        color: #333;
    }
    .header h1 {
        margin: 0;
    }
    .sectionmain-banner {
        position: relative;
        overflow: hidden;
    }
    .video video {
        width: 100%;
        height: auto;
    }
    #overlay {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
    }
    .vo-text h2 {
        font-size: 100px;
        margin: 0;
        padding: 20px;
        text-align: center;
    }
    .vo-text h2 em {
        font-style: normal;
        color: #4CAF50;
    }
    .main-banner .row {
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
    }
    .main-banner .content {
        flex: 1;
        min-width: 300px;
        padding: 20px;
    }
    .main-banner .content img {
        max-width: 100%;
        height: auto;
    }
    .side_bar, .side_bar2 {
        flex-basis: 100%;
        text-align: center;
        padding: 20px;
    }
    .side_bar a, .side_bar2 a {
        color: #4CAF50;
        text-decoration: none;
        font-weight: bold;
    }
    @media (max-width: 768px) {
        .main-banner .row {
            flex-direction: column;
        }
    }
</style>
<body>
<div class="header">
    <h1>Welcome to WatchStore</h1>
</div>

<section class="sectionmain-banner" id="top">
    <div id="overlay">  
        <div class="video">
            <video autoplay muted loop id="bg-video">
                <source src="images/watchvd.mp4" type="video/mp4" />
            </video>
        </div>  
        <div class="vo-text">
            <h2>Timeless <em>Quality</em></h2> 
        </div>
    </div>
</section>

<section class="main-banner">
    <div class="row">
        <div>
            <div class="content">
                <h3>Discover Timeless Quality</h3>
                <p>Welcome to WatchStore, where elegance meets precision. Explore our exquisite collection of watches crafted with timeless quality and attention to detail. Each timepiece tells a unique story, combining style and functionality.</p>

                <h4>Why Choose WatchStore?</h4>
                <p>At WatchStore, we pride ourselves on delivering exceptional watches that stand the test of time. Our commitment to quality ensures that every watch in our collection is a testament to craftsmanship and sophistication.</p>
            </div>
        </div>

        <div>
            <div class="content" style="padding:0;">
                <img id="watchbg" src="images/watch.png" alt="Watch Showcase" style="width:auto;height:500px;padding:0;"/>
                <h3>Explore Our Collection</h3>
                <p>Indulge in the world of horology with our diverse range of watches. From classic designs to modern innovations, our collection caters to every style and occasion. Discover the perfect timepiece that complements your individuality.</p>

                <h4>Unmatched Elegance</h4>
                <p>Our watches are more than just timekeepers; they are a reflection of your taste and personality. Elevate your style with our watches, designed to make a statement and leave a lasting impression.</p>
            </div>
        </div>

        <div class="side_bar">
            <a href="signin.php">
                <h3>Sign In</h3>
            </a>
            <p>Sign in to your WatchStore account to track your orders, manage your wishlist, and stay updated on the latest arrivals and exclusive offers.</p>
        </div>

        <div class="side_bar2">
            <h3>Join WatchStore Community</h3>
            <p>Sign up for a WatchStore account to unlock a world of exclusive benefits. Join our community of watch enthusiasts and receive updates on new releases, promotions, and events.</p>
        </div>
    </div>
</section>

<?php include("templates/footer.php"); ?>
</body>
</html>
