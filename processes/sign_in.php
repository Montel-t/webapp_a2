<?php
require_once "../includes/dbConnect.php";
session_start(); 

$entered_email = mysqli_real_escape_string($dbConn, strtolower($_POST["email_address"]));
$entered_password = mysqli_real_escape_string($dbConn, $_POST["password"]);

// verify the entered email exists
$spot_email = "SELECT * FROM users WHERE email = '$entered_email' LIMIT 1";
$spot_email_res = $dbConn->query($spot_email);
if($spot_email_res->num_rows > 0){

    $user = $spot_email_res->fetch_assoc(); // Fetch user data
    $stored_password = $user["password"]; // Use $user directly

    if(password_verify($entered_password, $stored_password)){
        if($user["is_verified"] == 1){
            // Correctly assign the user ID to the session for checkout.php to use
            $_SESSION['user_id'] = $user['userId']; // Ensure you have a 'userId' column in your 'users' table

            // Assign additional relevant user information to session
            $_SESSION["user_info"] = [
                "email" => $user["email"],
                "module" => $user["module"], // Continue to store additional info as needed
            ];

            // Check the user's module and redirect accordingly
            if($user["module"] == 0){
                header("Location: ../ViewUsers.php");
            } elseif($user["module"] == 1) {
                header("Location: ../Users.php");
            } else {
                // Redirect somewhere else or show an error if the module is neither 0 nor 1
                header("Location: ../signin.php?unauthorized");
            }
            exit();
        }else{
            // Redirect if the user is not verified
            header("Location: ../forgot_pass.php?is_verified");
            exit();
        }
    }else{
        // Redirect if password verification fails
        header("Location: ../signin.php?wrong_cred");
        exit();
    }
}else{
    // Redirect if no user is found with the entered email
    header("Location: ../signin.php?wrong_cred");
    exit();
}
?>
