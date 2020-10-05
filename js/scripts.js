// Test that this file is loaded properly!
// alert("Im here");

const snackSearchForm = document.getElementById("search-form");
const snackSearchInput = document.getElementById("search-input");
const snackResults = document.getElementById("search-results");

/**
 * Listen for a submit
 */

snackSearchForm.addEventListener("submit", (event) => {
  // Stop the form from submitting the traditional way.
  event.preventDefault();
  const results = false;
  // Empty the snack search result list.
  snackResults.innerHTML = '';
  // Attempt a fetch for results.
  fetch(`http://localhost:3000/api/snacks.php?search=${snackSearchInput.value}`)
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      for (let snack of data) {
        // Create elements.
        const snackLI = document.createElement("LI");

        // Populate the elements.
        snackLI.innerHTML = `
        <h3>${snack[0]}</h3>
        <dl>
          <dt>Type</dt>
          <dd>${snack[1]}</dd>
          <dt>Price</dt>
          <dd>$${parseFloat(snack[2]).toFixed(2)}</dd>
          <dt>Calories</dt>
          <dd>${snack[3]}</dd>
        </dl>
        `
        // Append the elements to the list in our webpage.
        snackResults.append(snackLI);
      };
      // Empty the search field.
      snackSearchInput.value = '';
    });
});
