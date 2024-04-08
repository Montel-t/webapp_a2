<?php include("templates/header.php"); ?>
<?php include("templates/circle.php"); ?>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: #f4f4f4;
    }
    .header, .content, .side_bar {
        text-align: center;
        background-color: #fff;
        padding: 20px;
        margin: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    input[type=text], input[type=email], textarea {
        width: 90%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>
<body>
<div class="header">
    <h1>Contact Us</h1>
</div>
<div class="row">
    <div class="content">
        <h3>Get in Touch</h3>
        <p>We're here to answer any questions you have or provide you with an estimate. Just send us a message in the form below with any queries you might have.</p>
        <form action="send_message.php" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br>
            <input type="submit" value="Send">
        </form>
    </div>
    <div class="side_bar">
        <h3>Quick Links</h3>
        <p>Looking for quick answers? Check out our <a href="faq.php">FAQ</a> page or reach out directly via the contact form. Our team is ready to assist you!</p>
    </div>
</div>
<?php include("templates/footer.php"); ?>
