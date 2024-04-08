<?php
session_start();
require_once "includes/dbConnect.php";
if (!isset($_SESSION["user_info"]) || !is_array($_SESSION["user_info"]) || $_SESSION["user_info"]["module"] != 0) {
    header("Location: ./signin.php?not_set");
    exit();
}
include("templates/header.php");
include("templates/circle.php"); 
?>
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .header {
        background-color: #FFF;
        text-align: center;
        padding: 20px 0;
        margin-bottom: 20px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }

    .row {
        display: grid;
        grid-template-columns: auto;
        padding: 20px;
    }

    .content {
        background-color: #ffffff;
        padding: 20px;
        margin: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        border-radius: 8px;
    }

    .side_bar {
        background-color: #ffffff;
        padding: 20px;
        margin: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        border-radius: 8px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    td {
        font-size: 14px;
    }

    a {
        color: #007bff;
        transition: color 0.2s;
    }

    a:hover {
        color: #0056b3;
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .row {
            grid-template-columns: 1fr;
        }
    }
</style>
<body>
<div class="header">
    <h1>USERS LIST</h1>
</div>
<div class="row">
    <div class="content">
        <h3>USERS LIST</h3>
        <table>
            <!-- Table Headers -->
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Last Modified</th>
                <th>Actions</th>
            </tr>
            <!-- PHP to populate table rows -->
            <?php
            $select_users = "SELECT users.*, genders.gender FROM users LEFT JOIN genders ON users.genderId = genders.genderId ORDER BY fullname ASC";
            $users_res = $dbConn->query($select_users);
            if ($users_res->num_rows > 0) {
                $sn = 0;
                while ($user_row = $users_res->fetch_assoc()) {
                    $sn++;
                    echo "<tr>";
                    echo "<td>{$sn}.</td>";
                    echo "<td>{$user_row['fullname']}</td>";
                    echo "<td>{$user_row['email']}</td>";
                    echo "<td>{$user_row['gender']}</td>";
                    echo "<td>" . date("d-F-Y H:i:s", strtotime($user_row["date_updated"])) . "</td>";
                    echo "<td>[ <a href='edit_users.php?userId={$user_row["userId"]}'>Edit</a> ] [ <a href='processes/del_users.php?userId={$user_row["userId"]}' onclick='return confirm(\"Are you sure you want to delete?\");'>Del</a> ]</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No Data</td></tr>";
            }
            ?>
        </table>
        <p></p>
    </div>
    <div class="side_bar">
        <h3>Quick Links</h3>
        <p>Access your settings or learn more about our service...</p>
    </div>
</div>
<?php include("templates/footer.php"); ?>
