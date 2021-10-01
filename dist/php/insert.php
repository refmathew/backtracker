<?php
echo '
  <div class="main__page__insert-page main__page__page">
    <h2 class="main__page__header main__page__insert-page__header">Insert Record</h2>
    <form class="main__page__form main__page__insert-page__form" action="include/insert.inc.php" method="POST">
      <input class="main__page__insert-page__form__name" type="text" name="name" placeholder="Name..." />
      <input class="main__page__insert-page__form__address" type="text" name="address" placeholder="Address..." />
      <input class="main__page__insert-page__form__contact" type="text" name="contact" placeholder="Contact..." />
      <input class="main__page__insert-page__form__body-temp" type="text" name="body_temp" placeholder="Body Temperature..." />
      <button class="login-section__form__login-button" type="submit" name="insert">
        Insert
      </button>
'
?>

<?php
if (isset($_GET["error"])) {
  if ($_GET["error"] == "incomplete_credentials") {
    echo '<p class="error-message">Please enter complete credentials!</p>';
  } elseif ($_GET["error"] == "username_exists") {
    echo '<p class="error-message">Username already taken...</p>';
  }
}
if (isset($_GET["insert_record"])) {
  if ($_GET["insert_record"] == "success") {
    echo '<p class="success-message">Inserted succesfully!</p>';
  } elseif ($_GET["insert_record"] == "failed") {
    echo '<p class="error-message">Record not inserted...</p>';
  }
}
?>

<?php
echo '
    </form>
  </div>
';
