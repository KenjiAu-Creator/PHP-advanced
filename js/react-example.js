// alert('Im here!');

// Grab our React "Root" element.
const reactRoot = document.getElementById( 'react-root' );

// Search Form component
const SearchForm = props => {
  // "Search" field state.
  const [search, setSearch] = React.useState('');
  // "Snacks" / search result array state.
  const [snacks, setSnacks] = React.useState( [] );

  const submitSearch = event => {
    // Prevent the form from submitting the old way.
    event.preventDefault();
    fetch( `http://localhost:3000/api/snacks.php?search=${search}` )
    .then(response => response.json())
    .then(results => {
      // Update snacks array (state) with the new results.

      setSnacks( results );
    })
  }

  return (
    <React.Fragment>
      <h2>Snack Search Form</h2>
      <form onSubmit={submitSearch}>
        <label htmlFor="search">
          Enter a Search Term:
          <input
            id="search"
            type="search"
            value={search}
            onChange={ event => { setSearch( event.target.value ) } } />
        </label>
        <input type="submit" value="Search Snacks" />
      </form>
      <h3>Snack Search Results</h3>
      <ul>
        {snacks.map( (snack, index) => (
          <li key={index}>
            <h4>{snack[0]}</h4>
            <dl>
                <dt>Snack Type:</dt>
                <dd>{snack[1]}</dd>
                <dt>Snack Price:</dt>
                <dd>${parseFloat(snack[2]).toFixed( 2 )}</dd>
                <dt>Snack Calories:</dt>
                <dd>{snack[3]}</dd>
            </dl>
          </li>
        ))}
      </ul>
    </React.Fragment>
  )
}

// Render into the real DOM.
ReactDOM.render( <SearchForm />, reactRoot );