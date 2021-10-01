<?php

if (isset($_POST["insert"])){

  date_default_timezone_set('Asia/Manila');
  $name = $_POST['name'];
  $address = $_POST["address"];
  $contact = $_POST["contact"];
  $body_temp = $_POST["body_temp"];
  $date_entered = date('Y-m-d');
  $time_entered = date('H:i:s');
  $date_encoded = date('Y-m-d');

  require_once "functions.inc.php";
  require_once "db.inc.php";

  if (incompleteInfo($name, $address, $contact, $body_temp) !== false){
    header("location: ../dashboard.php?error=incomplete_info");
    exit();
  }

  if ( insertInfo($conn, $name, $address, $contact, $body_temp, $date_entered, $time_entered, $date_encoded) !== false){
    header("location: ../dashboard.php?insert_info=success");
    exit();
  } else {
    header("location: ../dashboard.php?insert_info=failed");
    exit();
  }
}
