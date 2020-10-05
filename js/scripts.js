// Test that this file is loaded properly!
// alert("Im here");

const snackSearchForm = document.getElementById( 'search-form' );
const snackSearchInput = document.getElementById( 'search-input' );
const snackResults = document.getElementById( 'search-results' );

/** 
 * Listen for a submit
 */

 snackSearchForm.addEventListener('submit', event => {
  // Stop the form from submitting the traditional way.
  event.preventDefault();
  const results = false;
  // Attempt a fetch for results.
  fetch("http://localhost:3000/api/snacks.php")
    .then( response => response.json() )
    .then( data => {
      console.log( data );
    });
 });