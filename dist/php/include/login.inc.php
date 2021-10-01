<?php
if (isset($_POST["login"])){

  $name = $_POST["name"];
  $pwd = $_POST["pwd"];

  require_once 'db.inc.php';
  require_once 'functions.inc.php';

  /* check if the input fields were filled */
  if (incompleteCredentials($name, $pwd) !== false){
    header("location: ../login.php?error=incomplete_credentials");
    exit();
  }

  /* check if the user exists in the database */
  $result = userExists($conn, $name, $pwd);

  if ($result[0] !== false){
      session_start();
      $_SESSION["id"] = $result[1];
      $_SESSION["name"] = $result[2];
      $_SESSION["pwd"] = $result[3];
      header("location: ../dashboard.php");
      exit();
  } else{
    header("location: ../login.php?error=login_failed");
    exit();
  }
} else{
  header("location: ../login.php");
  exit();
}
