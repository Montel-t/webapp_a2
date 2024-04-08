<?php include("templates/header.php"); ?>
<body>
<?php include("templates/circle.php"); ?>
<div class="header">
    <h1>Header</h1>
</div>
<div class="row">
    <div class="content">
        <h3>Our Products</h3>
<table>
<tr>
    <th>#</th>
    <th>Prod Name</th>
    <th>Desc</th>
    <th>Quantity</th>
    <th>Unit Price</th>
    <th>Actions</th>
</tr>
<tr>
    <td>1. </td>
    <td>Pen</td>
    <td>Colored Pen</td>
    <td>45</td>
    <td>Ksh. 30</td>
    <td>[ Edit ] [ Del ]</td>
</tr>
<tr>
    <td>2. </td>
    <td>Book</td>
    <td>Novel</td>
    <td>145</td>
    <td>Ksh. 130</td>
    <td>[ Edit ] [ <a href="" onclick="window.alert('You do not have the write to delete this record! \n Please contact the Administrator');">Del</a> ]</td>
</tr>
<tr>
    <td>3. </td>
    <td>Pencil</td>
    <td>Black</td>
    <td>455</td>
    <td>Ksh. 5</td>
    <td>[ Edit ] [ <a href="" onclick="return confirm('Are you sure you want to delete Pencil items from the database?');">Del</a> ]</td>
</tr>

</table>

        <h4>Description</h4>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </div>
    <div class="side_bar">
    <a href="signin.php">
          <h3>Sign In</h3>
</a>
        
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </div>
</div>
<?php include("templates/footer.php"); ?>