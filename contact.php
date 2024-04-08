<?php include("templates/header.php"); ?>
<body>
<?php include("templates/circle.php"); ?>
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