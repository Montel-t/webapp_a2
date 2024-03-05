<?php include("templates/header.php"); ?>
<body>
<?php include("templates/nav.php"); ?>
<div class="header">
    <h1>Header</h1>
</div>
<div class="row">
    <div class="content">
        <h3>Sign Up</h3>
<form action="" method="post">
    <label for="fullname">Full Name: </label><br>
    <input type="text" id="fullname" name="fullname" placeholder="Full Name" autofocus required /><br>

    <label for="email_address">Email Address: </label><br>
    <input type="email" id="email_address" name="email_address" placeholder="Email Address" /><br>
    
    <label for="password">Password: </label><br>
    <input type="password" id="password" name="password" placeholder="Password" /><br>
    <label for="gender">Gender : </label><br>
    <select id="gender" required name="gender">
        <option value="">--Select Gender--</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Rather not say">Rather not say</option>
    </select>
    <br>
    <label for="Address"> Address : </label><br>
<textarea id="Address" name="Address" placeholder="Enter your Address here" col="30" rows="5"></textarea>

    <br>

    <input type="submit" name="" value="Save Details" />


    <br>

    <br>
    <br>
    <br>

</form>
    </div>
    <div class="side_bar">
        <h3>Sign In</h3>
        
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </div>
</div>
<?php include("templates/footer.php"); ?>