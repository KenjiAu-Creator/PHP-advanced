<?php

// GLOBAL variables are stored in PHP's
// $_GLOBALS array.
$GLOBALS['pageTitle'] = 'Cat Facts (External API)';

// Show our header 
include './templates/header.php';
?>

<?php
// Retrieve data from API endpoint.
// @link https://alexwohlbruck.github.io/cat-facts/docs/endpoints/facts.html
$dailyCatFactResponse = file_get_contents(
  'https://cat-fact.herokuapp.com/facts/random'
);
// Testing output in var_dump...
// var_dump( $dailyCatFactResponse );

if ($dailyCatFactResponse) { //Convert JSON string into a JSON object.
  $dailyCatFact = json_decode($dailyCatFactResponse);
  // Output the daily cat fact as HTML for the browser...
?>
  <h2>Todays Cat Fact:</h2>
  <p><?php echo $dailyCatFact->text; //Output the text property! 
      ?></p>
<?php
}

?>
<h2>Request Animal Facts</h2>
<form action="#" method="POST">
  <label for="amount">Enter the Amount of Facts:
    <input type="number" id="amount" name="amount" />
  </label>
  <label for="animal-type">Enter the Type of Animal:
    <select id="animal-type" name="type">
      <option value="cat">Cat</option>
      <option value="dog">Dog</option>
      <option value="horse">Horse</option>
      <option value="snail">Snail</option>
    </select>
  </label>
  <input type="submit" value="Get Animal Facts!">
</form>

</form>
<?php
if (isset($_POST['amount']) && isset($_POST['type'])) {
  // Let's modify our request to include a QUERY PARAMETER STRING.
  $factListResponse = file_get_contents(
    "https://cat-fact.herokuapp.com/facts/random?amount={$_POST['amount']}&animal_type={$_POST['type']}"
  );  // Test the response via var_dump()
  //var_dump($factListResponse);

  // Check if there was a response
  if ($factListResponse) { // Convert to JSON.
    $factsList = json_decode($factListResponse);
?>
    <h2>List of
      <?php echo ucfirst($_POST['type']); ?>
      Facts
    </h2>
    <?php if ( is_object( $factsList ) ) : ?>
      <p><?php echo $factsList->text; ?></p>
    <?php elseif ( !empty( $factsList ) ) : ?>
      <ol>
        <?php foreach ($factsList as $fact) : ?>
          <li>
            <?php echo $fact->text; ?>
          </li>
        <?php endforeach; ?>
      </ol>
    <?php else : ?>
      <p>No facts found.</p>
    <?php endif; ?>
<?php
  }
}

include './templates/footer.php' ?>