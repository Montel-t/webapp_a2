<?php

require_once "../includes/dbConnect.php";

$secretCode = mysqli_real_escape_string($dbConn, $_POST["secretCode"]);

$spot_code = "SELECT * FROM users WHERE secretCode = '$secretCode' LIMIT 1";
$spot_code_res = $dbConn->query($spot_code);
if($spot_code_res->num_rows > 0){

    $update_qry = "UPDATE users SET secretCode = 0, is_verified = 1 WHERE secretCode = '$secretCode' LIMIT 1";

    if($dbConn->query($update_qry) === TRUE){

        $_SESSION["consort"] = $spot_code_res->fetch_assoc();
        header("Location: ../ViewUsers.php");
    }else{
        print "Process Failed" . $update_qry . "<br>" . $dbConn->error;
    }

}else{
    unset($_SESSION["consort"]);
    header("Location: ../signin.php?wrong_cred");
    exit();
}