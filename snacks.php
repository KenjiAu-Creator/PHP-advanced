<?php 
  $GLOBALS['$pageTitle'] = 'Snacks Object';

  // Require will cause a fatal error if the file is not found.
  // _once means if it has been required already,
  // subsequent requires wiull not run the file again.
  require_once './includes/Snack.Class.php';

  // If an include can't find the file, it results only in a warning (your
  // execution will still continue.)
  include './templates/header.php';

  // An array to store instances of Snack
  $snack = [];

  // Let's retrieve out list of snakcs from the JSON.
  $snacksFileString = file_get_contents( './data/snacks.json' );  // Retrieves
  // the contents of the file as a STRING.

  // If the snacks file was found and read...
  if ( $snacksFileString )
  { // Convert the JSON to a PHP array or object
    $snacksArray = json_decode( $snacksFileString);
    // If conversion was successful...
    if ($snacksArray)
    {
      // Let's loop through and make snack objects!
      foreach ($snacksArray as $snack)
      {
        // $snacks[] = $value
        // is the same as...
        // array_push( $snack, $value)
        $snacks[] = new Snack( $snack[0], $snack[1], $snack[2], $snack[3]);
        // Note that if you use the latest PHP version we can also use ...$snack
        // instead of explicitly writing out each index.
      }
    }
  }
?>

<?php if (!empty($snacks)) : ?>
  <h2>Our Snacks</h2>
  <?php foreach ($snacks as $snack) $snack->output(); ?>
<?php else : ?>
  <p>Sorry, no snacks found!</p>
<?php endif ?>

<?php include './templates/footer.php'; ?>