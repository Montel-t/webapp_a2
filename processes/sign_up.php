<?php
    require_once "../includes/dbConnect.php";

    $fname = mysqli_real_escape_string($dbConn, ucwords(strtolower($_POST["fullname"])));
    $email = mysqli_real_escape_string($dbConn, strtolower($_POST["email_address"]));
    $pass = mysqli_real_escape_string($dbConn, $_POST["password"]);
    $gender = mysqli_real_escape_string($dbConn, $_POST["gender"]);
    $Add = mysqli_real_escape_string($dbConn, $_POST["Address"]);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die('Invalid email');
    }

    $email_exist = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $email_exist_res = $dbConn->query($email_exist);
    if($email_exist_res->num_rows > 0){
        die('Email aleady exist'); 
    }

    $hash_pass = PASSWORD_HASH($pass, PASSWORD_DEFAULT);
    $insert_qry = "INSERT INTO users(fullname, email, genderId, password, address)VALUES('$fname', '$email', '$gender', '$hash_pass', '$Add')";

    if($dbConn->query($insert_qry) === TRUE){
        header("Location: ../ViewUsers.php");
    }else{
        print "Process Failed" . $insert_qry . "<br>" . $dbConn->error;
    }
?>