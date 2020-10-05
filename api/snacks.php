<?php

/** 
 * Goal: Return a JSON representation of a Snack.
 * Parameter: Query string "search" term
 */

// Headers are sent "under the radar" to give additional info
// about the request / response. In this case, we are
// describing the file-type" or how we inted the string to be 
// read / treated.
header('Content-type: application/JSON; charset=UTF-8');

// First, lets make sure there is a search term present.
if (isset($_GET['search']) && !empty($_GET['search'])) {
  // JSON object response with your search term.
  // echo "{\"response\":\"{$_GET['search']}\"}";
  // Retrieve the list of snacks.
  $snacksJSONString = file_get_contents('../data/snacks.json');
  // echo $snacksJSONString;
  // Check if we were able to read the file.
  if ( $snacksJSONString !== FALSE )
  { // Decode this JSON string so that we can use PHP to work with
    // the data.
    $snacksList = json_decode( $snacksJSONString );
    if ($snacksList !== NULL )  // Make sure conversion was a success!
    { // Now that we have a PHP array... we can deal with this request!
      $matchingSnacks = array(); // Array for storing matches
      foreach ( $snacksList as $snack) 
      { // Check if there is a match in our snack name vs search.
        if ( stristr( $snack[0], $_GET['search'] ) )
        {
          array_push( $matchingSnacks, $snack );
        }
      }
      // Respond with the matching snacks array as a JSON string!
      echo json_encode( $matchingSnacks );
    }
    // IF we were not able to read the JSON as PHP Array/Object
    else
    {
      echo "{\"response\":\"ERROR: Unable to convert Snacks list from JSON.\"}";
    }
  }
  // If we were NOT able to read the file.
  else
  {
    echo  "{\"response\":\"ERROR: Unable to retrieve Snacks list.\"}";
  }
}
// If there is no search present, a default / fall back response.
else {  // JSON object rsponse with status info.
  echo "{\"response\":\"ERROR: No search term present.\"}";
}
