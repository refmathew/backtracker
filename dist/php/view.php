<?php
echo '
<div class="main__page__view-page main__page__page">
  <h2 class="main__page__header main__page__view-page__header">View Records</h2>
  <div class="main__page__view-page__table-wrapper">
    <table class="main__page__view-page__table-wrapper__table">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Body Temperature</th>
        <th>Date Entered</th>
        <th>Time Entered</th>
        <th>Remark</th>
        <th>Date Encoded</th>
      </tr> 
'
?>

<?php
include_once 'include/view.inc.php';
?>

<?php
echo '
    </table>
  </div>
</div>
';
