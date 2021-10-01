<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="description" content="" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../../dist/style.css" />
</head>
<body class="dashboard-body">

<?php
  require_once 'db.inc.php';
  require_once 'functions.inc.php';

  $q = $_GET['q'];

  echo "
    <div class='main__page__insert-page main__page__page'>
      <h2 class='main__page__header main__page__modify-inc-page__header'>Modify Record</h2>
      <form action='modify.inc.php' method='POST'>
  "
?>

<?php
    searchRecord($conn, $q, 'modify')
?>;

<?php
  echo "
      </form>
    </div>
  "
?>


<?php
  /* For updating */
  if (isset($_POST["modify"])){

    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $user_isAdmin = $_POST['user_isAdmin'];

    if (incompleteCredentials($user_name, $user_password) !== false){
      header("location: modify.inc.php?error=incomplete_credentials");
      exit();
    }

    $updateStatus = updateRecord($conn, $user_name, $user_password, $user_isAdmin, $user_id);

    if ( $updateStatus !== true){
      header("location: ../dashboard.php?update_record=failed");
      exit();
    } else {
      header("location: ../dashboard.php?update_record=success");
      exit();
    }
  }  
?>

</body>
</html>
