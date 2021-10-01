<!DOCTYPE html>
<html lang="en">
<head>
  <title>BSCS</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="description" content="" />
  <link rel="stylesheet" href="../../dist/style.css" />
</head>
<body class="login-body">
  <header class="header">
    <img class="header__image" src="../../src/assets/brand_logo_and_name.svg" />
    <h2 class="header__definition">
      Track your visitors with the help of <span>backtracker</span>
    </h2>
  </header>
  <section class="login-section" >
    <form class="login-section__form" action="include/login.inc.php" method="POST">
      <input class="login-section__form__username" type="text" name="name" placeholder="Name..." />
      <input class="login-section__form__password" type="password" name="pwd" placeholder="Password..." />
      <button class="login-section__form__login-button" type="submit" name="login">
        Log in
      </button>
    </form>
      <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "incomplete_credentials") {
            echo '<p class="error-message">Please enter complete credentials!</p>';
          } elseif ($_GET["error"] == "login_failed") {
            echo '<p class="error-message">Invalid username or password</p>';
          }
        }
      ?>
  </section>
  <script src="../app.js"></script>
</body>
</html>
