<?php
    require_once "../includes/dbConnect.php";

    $userId = $_GET["userId"];

    $del_user = "DELETE FROM users WHERE userId='$userId' LIMIT 1";

    if($dbConn->query($del_user) === TRUE){
        header("Location: ../ViewUsers.php");
    }else{
        print "Process Failed" . $del_user . "<br>" . $dbConn->error;
    }

?>