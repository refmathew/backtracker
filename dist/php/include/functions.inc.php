<?php
function incompleteCredentials($name, $pwd){
  $result = "";

  if (empty($name) || empty($pwd)){
    $result = true;
  } else{
    $result = false;
  }

  return $result;
}

function incompleteInfo($name, $address, $contact, $body_temp){
  $result = "";

  if (empty($name) || empty($address) || empty($contact) || empty($body_temp)){
    $result = true;
  } else{
    $result = false;
  }

  return $result;
}

function incompleteInfoModify($id, $name, $address, $contact, $body_temp){
  $result = "";

  if (empty($id) || empty($name) || empty($address) || empty($contact) || empty($body_temp)){
    $result = true;
  } else{
    $result = false;
  }

  return $result;
}

function userExists ($conn, $name, $pwd) {
  $sql = "SELECT * FROM administrators WHERE name = ?;";

  $result = array();
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $name); 
  $stmt->execute(); 
  $sqlData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($sqlData)) {

    /* $checkPwd = password_verify( $pwd, $row['pwd'] ); */

    /* if ( $name === $row['name'] && $checkPwd === true ){ */
    if ( $name === $row['name'] ){

      /* check if a user exists */
      $result[0] = true;

      /* return the user's data */
      $result[1] = $row['id'];
      $result[2] = $row['name'];
      $result[3] = $row['pwd'];
    } else {
      $result[0] = false;
    }
  } else {
    $result[0] = false;
  }

  return $result;

  $stmt->close();
  $conn->close();
}

function usernameExists ($conn, $user_name) {
  $sql = "SELECT * FROM user_account WHERE user_name = ?;";

  $result = "";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $user_name);
  $stmt->execute();

  $sqlData = mysqli_stmt_get_result($stmt);
  if (mysqli_fetch_assoc($sqlData)) {
    $result = true; 
  } else{
    $result = false;
  }

  return $result;

  $stmt->close;
  $conn->close;
}

function insertInfo($conn, $name, $address, $contact, $body_temp, $date_entered, $time_entered, $date_encoded){
  $remark = "";

  $sql = "INSERT INTO visitor_details (name, address, contact, body_temp, date_entered, time_entered, remark, date_encoded) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
  $insertionSuccess = "";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssissss", $name, $address, $contact, $body_temp, $date_entered, $time_entered, $remark, $date_encoded);

  if ($stmt->execute() === true){
    $insertionSuccess = true;
  } else{
    $insertionSuccess = false;
  }

  return $insertionSuccess;

  $stmt->close;
  $conn->close;
}

function insertRecord($conn, $user_name, $user_password, $user_isAdmin, $user_registration_date){
  $sql = "INSERT INTO user_account (user_name, user_password, user_isAdmin, user_registration_date) VALUES (?, ?, ?, ?);";

  $hashed_user_password = password_hash($user_password, PASSWORD_DEFAULT);
  $insertionSuccess = "";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssis", $user_name, $hashed_user_password, $user_isAdmin, $user_registration_date);

  if ($stmt->execute() === true){
    $insertionSuccess = true;
  } else{
    $insertionSuccess = false;
  }

  return $insertionSuccess;

  $stmt->close;
  $conn->close;
}

function showRecord($conn){
  $sql = "SELECT * FROM visitor_details";

  if ( $result = $conn->query($sql) ){
    while($row = $result->fetch_assoc()){
      $id = $row['id'];
      $name = $row['name'];
      $address = $row['address'];
      $contact = $row['contact'];
      $body_temp = $row['body_temp'];
      $date_entered = $row['date_entered'];
      $time_entered = $row['time_entered'];
      $remark = $row['remark'];
      $date_encoded = $row['date_encoded'];

      if ($remark != "deleted"){
        echo "
        <tr>
          <td>$id</td>
          <td>$name</td>
          <td>$address</td>
          <td>$contact</td>
          <td>$body_temp</td>
          <td>$date_entered</td>
          <td>$time_entered</td>
          <td>$remark</td>
          <td>$date_encoded</td>
        </tr> 
    ";
      }
    }
  }
}


function searchRecord($conn, $q, $for){
  $sql = "SELECT * FROM visitor_details WHERE name = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $q);
  $stmt->execute();

  $sqlData = mysqli_stmt_get_result($stmt);
  $result = mysqli_fetch_assoc($sqlData);

  $id = $result['id'];
  $name = $result['name'];
  $address = $result['address'];
  $contact = $result['contact'];
  $body_temp = $result['body_temp'];
  $date_entered = $result['date_entered'];
  $time_entered = $result['time_entered'];
  $remark = $result['remark'];
  $date_encoded = $result['date_encoded'];

  if ($for === "search"){
    if ($remark != "deleted"){
      echo "
          <p><span>Id: </span>{$id}</p>
          <p><span>Name: </span>{$name}</p>
          <p><span>Address: </span>{$address}</p>
          <p><span>Contact: </span>{$contact}</p>
          <p><span>Body temperature: </span>{$body_temp}℃</p>
          <p><span>Date entered: </span>{$date_entered}</p>
          <p><span>Time entered: </span>{$time_entered}</p>
          <p><span>Remark: </span>{$remark}</p>
          <p><span>Date encoded: </span>{$date_encoded}</p>
        ";
    } else{
      header("location: ../dashboard.php?search_error=user_notfound");
    }
  } elseif($for === "modify"){
    echo "
          <input type='hidden' value='{$id}' name='id' />
          <input class='main__page__modify-inc-page__form__name' type='text' value='{$name}' name='name' placeholder='Name...' />
          <input class='main__page__modify-inc-page__form__address' type='text' value='{$address}' name='address' placeholder='Address...' />
          <input class='main__page__modify-inc-page__form__contact' type='text' value='{$contact}' name='contact' placeholder='Contact...' />
          <input class='main__page__modify-inc-page__form__body-temp' type='text' value='{$body_temp}' name='body_temp' placeholder='Body Temperature...' />
          <input class='main__page__modify-inc-page__form__remark' type='text' value='{$remark}' name='remark' placeholder='Remark...' />
          <button class='login-section__form__login-button' type='submit' name='modify'>
            Modify
          </button>
  ";
  }
}

function passwordSame($conn, $user_id, $user_password){
  $sql = "SELECT user_password FROM user_account WHERE user_id = ?;";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $databasePassword = mysqli_stmt_get_result($stmt);
   
  
  if ($user_password == $databasePassword){
    return true;
  } else{
    return false;
  }

  $stmt->close();
  $conn->close();
}

function updateRecord($conn, $name, $address, $contact, $body_temp, $remark, $id){
  $sql = "UPDATE visitor_details SET name = ?, address = ?, contact = ?, body_temp = ?, remark = ? WHERE id = ?;";

  $updateSuccess = "";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssisi", $name, $address, $contact, $body_temp, $remark, $id);
  if ($stmt->execute() === true){
    $updateSuccess = true;
  } else{
    $updateSuccess = false;
  }

  return $updateSuccess;

  $stmt->close;
  $conn->close;
}

function removeRecord($conn, $q){
  $remark = "deleted";
  $sql = "UPDATE visitor_details SET remark = ? WHERE name = ?;";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $remark, $q);
  $stmt->execute();

  $removalSuccess = "";
  if ($stmt->execute() != true){
    $removalSuccess = false;
  } else{
    $removalSuccess = true;
  }

  return $removalSuccess;
}

function recoverRecord($conn, $q){
  $remark = "";
  $sql = "UPDATE visitor_details SET remark = ? WHERE name = ?;";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $remark, $q);
  $stmt->execute();

  $removalSuccess = "";
  if ($stmt->execute() != true){
    $removalSuccess = false;
  } else{
    $removalSuccess = true;
  }

  return $removalSuccess;
}
