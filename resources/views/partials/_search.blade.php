<form method="post" action="{{ url('search') . '?search=' . old('searchValue') }}">
    @csrf
    <input name="searchValue" type="text" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" value="{{ old('searchValue') }}">
    <button type="button" class="btn btn-outline-primary" onclick="window.location='?search=' + document.getElementsByName('searchValue')[0].value;">search</button>
</form>
