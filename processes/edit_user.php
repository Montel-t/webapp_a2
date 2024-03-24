<?php
    require_once "../includes/dbConnect.php";

    $fname = mysqli_real_escape_string($dbConn, ucwords(strtolower($_POST["fullname"])));
    $email = mysqli_real_escape_string($dbConn, strtolower($_POST["email_address"]));
    $gender = mysqli_real_escape_string($dbConn, $_POST["gender"]);
    $Add = mysqli_real_escape_string($dbConn, $_POST["Address"]);
    $userId = mysqli_real_escape_string($dbConn, $_POST["userId"]);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die('Invalid email');
    }

    $email_exist = "SELECT email FROM users WHERE email='$email' AND userId != '$userId' LIMIT 1";
    $email_exist_res = $dbConn->query($email_exist);
    if($email_exist_res->num_rows > 0){
        die('Email aleady exist'); 
    }

    $update_qry = "UPDATE users SET fullname = '$fname', email = '$email', genderId = '$gender', address = '$Add' WHERE userId = '$userId' LIMIT 1";

    if($dbConn->query($update_qry) === TRUE){
        header("Location: ../ViewUsers.php");
    }else{
        print "Process Failed" . $update_qry . "<br>" . $dbConn->error;
    }
?>