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
  <link rel="stylesheet" href="../../dist/style.css" />
</head>
<body class="dashboard-body">
  <div class="dashboard-wrapper">
    <nav class="nav">
      <a href="../../main.php">
        <img class="nav__logo" src="../../src/assets/brand_logo_and_name.svg" />
      </a>
      <a class="nav__avatar" >
        <?php
          include "include/avatar.inc.php";
        ?>
      </a>
      <div class= "nav__control-buttons">
        <a class="nav__control-buttons__button nav__control-buttons__button-insert">
          <i class="nav__control-buttons__button__plus fa-solid fa-plus"></i>
        </a>
        <a class="nav__control-buttons__button nav__control-buttons__button-search">
          <i class="nav__control-buttons__button__search fa-solid fa-magnifying-glass"></i>
        </a>
        <a class="nav__control-buttons__button nav__control-buttons__button-view">
          <i class="nav__control-buttons__button__view fa-solid fa-list-ul"></i>
        </a>
        <a class="nav__control-buttons__button nav__control-buttons__button-modify">
          <i class="nav__control-buttons__button__modify fa-solid fa-pen"></i>
        </a>
        <a class="nav__control-buttons__button nav__control-buttons__button-remove">
          <i class="nav__control-buttons__button__remove fa-solid fa-minus"></i>
        </a>
        <a class="nav__control-buttons__button nav__control-buttons__button-recover">
          <i class="nav__control-buttons__button__recover fa-solid fa-arrow-rotate-left"></i>
        </a>
      </div>
      <a class="nav__logout" href="../../main.php">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="right-from-bracket" class="svg-inline--fa fa-right-from-bracket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M96 480h64C177.7 480 192 465.7 192 448S177.7 416 160 416H96c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h64C177.7 96 192 81.67 192 64S177.7 32 160 32H96C42.98 32 0 74.98 0 128v256C0 437 42.98 480 96 480zM504.8 238.5l-144.1-136c-6.975-6.578-17.2-8.375-26-4.594c-8.803 3.797-14.51 12.47-14.51 22.05l-.0918 72l-128-.001c-17.69 0-32.02 14.33-32.02 32v64c0 17.67 14.34 32 32.02 32l128 .001l.0918 71.1c0 9.578 5.707 18.25 14.51 22.05c8.803 3.781 19.03 1.984 26-4.594l144.1-136C514.4 264.4 514.4 247.6 504.8 238.5z"></path></svg>
      </a>
    </nav>
    <main class="main">
      <div class="main__nav">
        <h2 class="main__nav__header"></h2>
        <div class="main__nav__avatar">
          <div class="main__nav__avatar__name">
            <i class="fas fa-chevron-down"></i>
            <?php
              echo $_SESSION['name'];
            ?>
          </div>
          <?php
            include "include/avatar.inc.php";
          ?>
        </div>
      </div>
      <div class="main__page">
        <div class="main__page__message">
        </div>
        <?php
            require_once "insert.php";
            require_once "search.php";
            require_once "view.php";
            require_once "modify.php";
            require_once "remove.php";
            require_once "recover.php";
        ?>
      </div>
    </main>
    <div class="control-menu">
      <button id="menu-button" class="control-menu__menu-button">
        <i class="control-menu__menu-button__ellipsis fa-solid fa-ellipsis"></i>
        <i class="control-menu__menu-button__ellipsis fa-solid fa-ellipsis"></i>
        <i class="control-menu__menu-button__ellipsis fa-solid fa-ellipsis"></i>
      </button>
      <div class= "control-menu__control-buttons">
        <a class="control-menu__control-buttons__button control-menu__control-buttons__button-insert">
          <i class="fa-solid fa-plus"></i>
        </a>
        <a class="control-menu__control-buttons__button control-menu__control-buttons__button-search">
          <i class="fa-solid fa-magnifying-glass"></i>
        </a>
        <a class="control-menu__control-buttons__button control-menu__control-buttons__button-view">
          <i class="fa-solid fa-list-ul"></i>
        </a>
        <a class="control-menu__control-buttons__button control-menu__control-buttons__button-modify">
          <i class="fa-solid fa-pen"></i>
        </a>
        <a class="control-menu__control-buttons__button control-menu__control-buttons__button-remove">
          <i class="fa-solid fa-minus"></i>
        </a>
        <a class="control-menu__control-buttons__button control-menu__control-buttons__button-recover">
          <i class="fa-solid fa-arrow-rotate-left"></i>
        </a>
      </div>
    </div>
    <div class="profile-menu">
      <a class="profile-menu__insert profile-menu__link">Insert</a> 
      <a class="profile-menu__search profile-menu__link">Search</a> 
      <a class="profile-menu__view profile-menu__link">View</a> 
      <a class="profile-menu__modify profile-menu__link">Modify</a> 
      <a class="profile-menu__remove profile-menu__link">Remove</a> 
      <a class="profile-menu__recover profile-menu__link">Recover</a> 
      <a class="profile-menu__logout profile-menu__link" href="../../main.php">Logout</a> 
    </div>
  </div>
  <script src="../app.js"></script>
</body>
</html>
