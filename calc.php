<?php
  // We need to use SESSION_START to declare
  // that we want to use the $_SESSION global var
  // It sets up a unique identifier with the 
  // browser so that the array of values 
  // is associated with only the one user.
  session_start();

  // Make sure to set a default value, if this key/value
  // pair does not uet exist in the associative SESSION
  // array.
  // *** We can't array_push() to a NULL
  // (undefined) value!
  if (!isset( $_SESSION['calcHistory'] ) )
  {
    $_SESSION['calcHistory'] = array();
  }

  // Try to avoid use of globals unless
  // they are absolutely necessary.
  $GLOBALS['pageTitle'] = 'Calculator';
    // Show our header 
  include './templates/header.php';

  // If we want to read values from a GET method submission...
  // we use the $_GET superglobal! It is an associative array.
  echo '<pre>';
  var_dump( $_GET );
  var_dump( $_POST ); // POST is handled the same way!
  echo '</pre>';

  $result = FALSE;
  if ( !empty( $_GET ) )
  {
    switch( $_GET["op"])
    {
      case "addition": 
        {
          $opSymbol = '+';
          $result = $_GET['value1'] + $_GET['value2'];
        break;
        }
      case "subtraction":
        {
          $opSymbol = '-';
          $result = $_GET['value1'] - $_GET['value2'];
          break;
        }
      case "multiplication":
        {
          $opSymbol = '&times;';
          $result = $_GET['value1'] * $_GET['value2'];
          break;
        }
      case "division":
        {
          $opSymbol = '&divide;';
          $result = $_GET['value1'] / $_GET['value2'];
          break;
        }
    }
    // Add this result to the calculator history array
    array_push( $_SESSION['calcHistory'],
    "{$_GET['value1']} {$opSymbol} {$_GET['value2']} = {$result}"
    );
  }
  echo '<pre>';
  var_dump($_SESSION);
  var_dump( $result );
  echo '</pre>';
?>

  <p>
    Welcome to our Calculator page!
  </p>

  <form method="GET" action="calc.php">
    <label for="num1">
      Enter first operand:
      <input 
        type="number"
        id="num1" 
        name="value1"
        value="">
    </label>
    <label for="operator">
      Select an operator:
      <select id="operator" name="op">
        <option value="addition">+</option>
        <option value="subtraction">-</option>
        <option value="multiplication">&times;</option>
        <option value="division">&divide;</option>
      </select>
    </label>
    <label for="num2">
    Enter second operand:
      <input 
        type="number"
        id="num2" 
        name="value2"
        value="">
    </label>
    <input type="submit" value="Calculate" />
  </form>

  <?php if($result != false) : ?>
    <p>
      Your result for your calculation is:
      <?php echo $result;?>
    </p>
  <?php endif ?>
<?php
// Show our footer.
include './templates/footer.php';
?>