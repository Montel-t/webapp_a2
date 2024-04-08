<?php include("templates/header.php"); ?>
<?php include("templates/circle.php"); ?>

<body>
<div class="header">
    <h1>FAQ - WatchStore</h1>
</div>

<section class="faq-section" id="faq">
    <div class="container">
        <h2>Frequently Asked Questions</h2>
        <div class="faq">
            <div class="faq-question">What is your return policy?</div>
            <div class="faq-answer">
                <p>Our return policy allows you to return products within 30 days of receiving them.</p>
            </div>

            <div class="faq-question">How do I track my order?</div>
            <div class="faq-answer">
                <p>You can track your order by logging into your account and visiting the orders section.</p>
            </div>

            <div class="faq-question">Do you offer technical support?</div>
            <div class="faq-answer">
                <p>Yes, we offer 24/7 technical support for all our products. Please contact us via email or phone.</p>
            </div>
        </div>
    </div>
</section>

<style>
.faq-section {
    background-color: #f5f5f5; /* Adjust to fit your site's design */
    padding: 20px;
}
.faq {
    margin-top: 10px;
}
.faq-question {
    cursor: pointer;
    padding: 10px;
    background-color: #e9ecef;
    margin-top: 5px;
    border: none;
    border-radius: 5px;
}
.faq-answer {
    display: none;
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ccc;
}
.container {
    width: 80%;
    margin: 0 auto; /* Center the container */
}
</style>

<script>
document.querySelectorAll('.faq-question').forEach(item => {
    item.addEventListener('click', () => {
        const answer = item.nextElementSibling;
        answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
    });
});
</script>

<?php include("templates/footer.php"); ?>
</body>
