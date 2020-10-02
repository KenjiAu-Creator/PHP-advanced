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

  function __construct( $snackName = '', $snackType = '', $snackPrice = 0.00, $snackCalories = 0 )
  {
    $this->name = $snackName;
    $this->type = $snackType;
    $this->price = $snackPrice;
    $this->calories = $snackCalories;
  }
}

$mySnack = new Snack( 'Oh Henry', 'chocolate', 1.89, 200 );
var_dump($mySnack);