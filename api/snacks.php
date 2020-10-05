<?php

/** 
 * Goal: Return a JSON representation of a Snack.
 * Parameter: Query string "search" term
 */

// Headers are sent "under the radar" to give additional info
// about the request / response. In this case, we are
// describing the file-type" or how we inted the string to be 
// read / treated.
header('Content-type: app/JSON; charset=UTF-8');

// First, lets make sure there is a search term present.
if (isset($_GET['search']) && !empty($_GET['search'])) {
  // JSON object response with your search term.
  echo "{\"response\":\"{$_GET['search']}\"}";
  // Retrieve the list of snacks.
  $snacksJSONString = file_get_contents('../data/snacks.json');
  echo $snacksJSONString;
}
// If there is no search present, a default / fall back response.
else {  // JSON object rsponse with status info.
  echo "{\"response\":\"ERROR: No search term present.\"}";
}
