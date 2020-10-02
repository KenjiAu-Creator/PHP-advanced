<?php
class Snack
{
  /**
   * We can set up properties like so...
   */

  public $name = '';
  public $type = '';
  public $price = 0.00;
  public $calories = 0;

  /**
   * Constructor method runs everytime you
   * make a new instance of this class (a
   * new object following this blueprint.)
   */

  function __construct($snackName = '', $snackType = '', $snackPrice = 0.00, $snackCalories = 0)
  {
    $this->name = $snackName;
    $this->type = $snackType;

    // Thanks Fahad for the number format!
    $this->price = number_format(
      $snackPrice, // Number to format
      2, // Number of decimal places
      '.', // Decimal separator
      ',' // Thousands separator. 1,000.0
    );
    $this->calories = intval($snackCalories); // Convert
    // $snackCalories into int
  }

  public function caramelize()
  {
    $this->calories *= 2;
  }

  public function output()
  { // Remember, anything OUTSIDE of PHP tag is echo'd!
    // This means the below will be output WHEN this method is called!
    ?>
      <dl>
        <dt>Snack name</dt>
        <dd><?php echo $this->name ?></dd>
        <dt>Snack type</dt>
        <dd><?php echo $this->type ?></dd>
        <dt>Snack price</dt>
        <dd><?php echo $this->price ?></dd>
        <dt>Snack calories</dt>
        <dd><?php echo $this->calories ?></dd>
      </dl>
    <?php
  }
}

// Initialize a Snack object, pass arguments to __construct.
$mySnack = new Snack('Oh Henry', 'chocolate', 1.89555555, 200.907);

// Run a method from the object. Make sure the -> is used to access the
// properties and methods of the object.
// For methods make sure you include () after.
$mySnack->caramelize();
var_dump($mySnack);
