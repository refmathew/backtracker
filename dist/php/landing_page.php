<!DOCTYPE html>
<html lang="en">
<head>
  <title>Backtracker</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="description" content="" />
  <link rel="stylesheet" href="../../dist/style.css" />
</head>
<body class="landing-page-body">
  <div class="landing-page-wrapper">
    <a class="login-link" href="login.php" class="login-link">Login</a>
    <header class="header">
      <img class="header__image"src="../../src/assets/brand_logo_and_name.svg" />
      <h2 class="header__definition">
        Welcome to Pacifist Mall!
        <span>
          Please fill in the form prior to entering the mall premises...
        </span>
      </h2>
    </header>
    <section class="form-wrapper">
      <form class="form" action="include/landing.inc.php" method="POST">
        <label for="name" class="form__name-label form__label">Name</label>
        <input class="form__input form__input-name" type="text" name="name" id="name" placeholder="Juan dela Cruz" />
        <label for="address" class="form__address-label form__label">Address</label>
        <input class="form__input form__input-address" type="text" name="address" id="address" placeholder="Brgy. Gulang-gulang, Lucena City" />
        <label for="contact" class="form__contact-label form__label">Contact No.</label>
        <input class="form__input form__input-contact" type="text" name="contact" id="contact" placeholder="09282947301" />
        <label for="body_temp" class="form__body-temp-label form__label">Body Temperature</label>
        <input class="form__input form__input-body-temp" type="text" name="body_temp" id="body_temp" placeholder="32" />
        <button class="login-section__form__login-button" type="submit" name="submit">
          Submit
        </button>
      </form>
    </section>
  </div>
  <script src="../app.js"></script>
</body>
</html>
