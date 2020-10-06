// alert('Im here!');

// Grab our React "Root" element.
const reactRoot = document.getElementById( 'react-root' );

// Search Form component
const SearchForm = props => {
  return (
    <div>
      <h2>Snack Search Form</h2>
      <form>
        <label htmlFor="search">
          Enter a Search Term:
          <input id="search" type="search" />
        </label>
        <input type="submit" value="Search Snacks" />
      </form>
      <h3>Snack Search Results</h3>
      <ul></ul>
    </div>
  )
}

// Render into the real DOM.
ReactDOM.render( <SearchForm />, reactRoot );