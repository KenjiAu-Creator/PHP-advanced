<?php 
  session_start();


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

<h2>Calculator History from Session</h2>
<?php if (isset( $_SESSION['calcHistory'] ) ) : 
  // Check if there IS a calc history 
  ?>
  <ul>
    <?php foreach( $_SESSION['calcHistory'] as $calculation) : ?>
      <li>
        <?php echo $calculation; // Output the value from our calcHistory array! ?>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<?php
// Show our footer.
include './templates/footer.php';
?>