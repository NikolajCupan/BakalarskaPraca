<form method="post" action="/search">
    @csrf
    <input name="searchValue" type="text" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon">
    <button type="submit" class="btn btn-outline-primary">search</button>
</form>
