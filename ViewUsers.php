<?php include("templates/header.php"); ?>
<body>
<?php include("templates/nav.php"); ?>
<div class="header">
    <h1>Header</h1>
</div>
<div class="row">
    <div class="content">
        <h3>Our Products</h3>
<table>
<tr>
    <th>#</th>
    <th>Full Name</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Last Modified</th>
    <th>Actions</th>
</tr>
<?php
require_once "includes/dbConnect.php";

$select_users = "SELECT * FROM `users` LEFT JOIN `genders` USING (`genderId`) ORDER by `fullname` ASC";

$users_res = $dbConn->query($select_users);

if($users_res->num_rows > 0){
$sn = 0;
while($user_row = $users_res->fetch_assoc()){
    $sn++;
    ?>
    <tr>
        <td><?php print $sn; ?>. </td>
        <td><?php print $user_row["fullname"]; ?></td>
        <td><?php print $user_row["email"]; ?></td>
        <td><?php print $user_row["gender"]; ?></td>
        <td><?php print date("d-F-Y H:i:s", strtotime($user_row["date_updated"])); ?></td>
        <td>
            [ <a href="edit_users.php?userId=<?php print $user_row["userId"]; ?>">Edit</a> ] 
            [ <a href="processes/del_users.php?userId=<?php print $user_row["userId"]; ?>" OnClick="return confirm('Are you sure you want to delete <?php print $user_row["fullname"]; ?> from the database?');">Del</a> ]
        </td>
    </tr>
    <?php
}
}else{
    ?>
    <tr>
        <td colspan="6">No Data</td>
    </tr>
    <?php
}
?>
</table>

        <h4>Description</h4>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </div>
    <div class="side_bar">
        <h3>Sign In</h3>
        
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </div>
</div>
<?php include("templates/footer.php"); ?>