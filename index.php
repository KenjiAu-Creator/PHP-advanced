<?php 
// GLOBAL variables are stored in PHP's
// $_GLOBALS array.
$GLOBALS['pageTitle'] = 'Home';

// Show our header 
include './templates/header.php';
?>

  <p>
    Welcome to our 
    <?php echo $GLOBALS['pageTitle'] ?>
    PHP Homepage!
  </p>

<?php
// Show our footer.
include './templates/footer.php';
?>