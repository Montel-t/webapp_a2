<?php include("templates/header.php"); ?>
<?php include("templates/circle.php"); ?>
<body>
<div class="header">
    <h1>Header</h1>
</div>
<div class="row">
    <div class="content">
        <h3>Verify Code</h3>
<form action="processes/verify_code.php" method="post">


    <label for="secretCode">Enter Secret Code: </label><br>
    <input type="number" id="secretCode" name="secretCode" placeholder="Secret Code" /><br>
     
    <br>
    <a href="signin.php">I remember</a>
    <br>
    <input type="submit" name="" value="Verify Code" />
    <br>

</form>
    </div>
    <div class="side_bar">
    <a href="signin.php">
          <h3>Sign In</h3>
</a>
        
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </div>
</div>
<?php include("templates/footer.php"); ?>