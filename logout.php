<?php
  require('header.php');
  session_start();
  session_destroy();
?>
    <div class="alert alert-primary" role="alert">
 You have logged out!
</div>
<?php
  require('footer.php');

?>