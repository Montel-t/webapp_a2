<?php include("templates/header.php"); ?>
<?php include("templates/header.php"); ?>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: #f4f4f4;
    }
    .header {
        text-align: center;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .row {
        display: flex;
        justify-content: center;
        padding: 20px;
    }
    .content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        margin-right: 20px;
    }
    .side_bar {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        width: 300px;
    }
    input[type=text], input[type=email], input[type=password], textarea, select {
        width: 100%;
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
        font-size: 16px;
    }
    input[type=submit]:hover {
        background-color: #45a049;
    }
    a {
        color: #4CAF50;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
<body>
<div class="header">
    <h1>Join WatchStore</h1>
</div>
<div class="row">
    <div class="content">
        <h3>Sign Up</h3>
        <form action="processes/sign_up.php" method="post">
            <label for="fullname">Full Name: </label><br>
            <input type="text" id="fullname" name="fullname" placeholder="Full Name" required autofocus><br>

            <label for="email_address">Email Address: </label><br>
            <input type="email" id="email_address" name="email_address" placeholder="Email Address" required><br>
            
            <label for="password">Password: </label><br>
            <input type="password" id="password" name="password" placeholder="Password" required><br>

            <label for="gender">Gender:</label><br>
            <select id="gender" name="gender" required>
                <option value="">--Select Gender--</option>
                <?php
                require_once "includes/dbConnect.php";
                $select_gender = "SELECT * FROM genders ORDER BY genderId ASC";
                $gender_res = $dbConn->query($select_gender);

                if ($gender_res->num_rows > 0) {
                    while ($gender_row = $gender_res->fetch_assoc()) {
                        echo "<option value='".$gender_row["genderId"]."'>".$gender_row["gender"]."</option>";
                    }
                }
                ?>
            </select><br>

            <label for="Address">Address:</label><br>
            <textarea id="Address" name="Address" placeholder="Enter your Address here" rows="5" required></textarea><br>

            <input type="submit" value="Sign Up"><br>
        </form>
    </div>
    <div class="side_bar">
        <a href="signin.php">
            <h3>Already have an account? Sign In</h3>
        </a>
        <p>Discover our exclusive collection of luxury watches and join the WatchStore community today.</p>
    </div>
</div>
<?php include("templates/footer.php"); ?>
</body>
</html>
