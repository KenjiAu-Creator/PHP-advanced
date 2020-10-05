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
  <label for-"amount">Enter the Amount of Facts:
    <input type="number" id="amount" />
  </label>
  <label for="animal-type">Enter the Type of Animal:
    <input type="text" id="animal-type" name="type"/>
  </label>
  <input type="submit" value="Get Animal Facts!">
</form>

</form>
<?php
// Let's modify our request to include a QUERY PARAMETER STRING.
$dailyDogFactResponse = file_get_contents(
  'https://cat-fact.herokuapp.com/facts/random?amount=010&animal_type=dog'
);  // Test the response via var_dump()
// var_dump($dailyDogFactResponse);

include './templates/footer.php' ?>