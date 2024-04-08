<?php
require_once "../includes/dbConnect.php";
   if(isset($_SESSION["consort"])){
    unset($_SESSION["consort"]);
    header("Location: ../");
    exit();
   }else{
    header("Location: ../");
    exit();
   }