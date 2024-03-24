<?php
require_once "constants.php";

// Create the database connection
$dbConn = new mysqli($hostname, $hostuser, $hostpass, $dbname);


// Verify the database connection
if($dbConn->connect_error){
    print "Connection Failed" . connect_error;
}else{
    // print "Connected Successfully";
}

?>