<?php include("templates/header.php"); ?>
<body>
<?php include("templates/nav.php"); ?>
<?php 

require_once "includes/dbConnect.php";

$userId = $_GET["userId"];

$get_user = "SELECT * FROM `users` LEFT JOIN `genders` USING (`genderId`) WHERE userId=$userId LIMIT 1";

$get_user_res = $dbConn->query($get_user);
$get_user_row = $get_user_res->fetch_assoc();

?>
<div class="header">
    <h1>Header</h1>
</div>
<div class="row">
    <div class="content">
        <h3>Edit User</h3>
<form action="processes/edit_user.php" method="post">
    <label for="fullname">Full Name: </label><br>
    <input type="text" id="fullname" name="fullname" placeholder="Full Name" autofocus required value="<?php print $get_user_row["fullname"]; ?>"/><br>

    <label for="email_address">Email Address: </label><br>
    <input type="email" id="email_address" name="email_address" placeholder="Email Address" value="<?php print $get_user_row["email"]; ?>" /><br>
    
    <label for="password">Password: </label><br>
    <input type="password" id="password" name="password" placeholder="Password" /><br>
    <label for="gender">Gender : </label><br>
    <select id="gender" required name="gender">
        <option value="<?php print $get_user_row["genderId"]; ?>"><?php print $get_user_row["gender"]; ?></option>
        <option value="">--Select Gender--</option>
<?php

$select_gender = "SELECT * FROM genders ORDER BY genderId ASC";

$gender_res = $dbConn->query($select_gender);

if($gender_res->num_rows > 0){
while($gender_row = $gender_res->fetch_assoc()){
print "<option value='".$gender_row["genderId"]."'>".$gender_row["gender"]."</option>";
}
}
?>
    </select>
    <br>
    <label for="Address"> Address : </label><br>
<textarea id="Address" name="Address" placeholder="Enter your Address here" col="30" rows="5"><?php print $get_user_row["address"]; ?></textarea>
    <br>
    <input type="submit" name="" value="Update Details" />
    <input type="hidden" name="userId" value="<?php print $get_user_row["userId"]; ?>" />
    <br>
</form>
    </div>
    <div class="side_bar">
        <h3>Sign In</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </div>
</div>
<?php include("templates/footer.php"); ?>