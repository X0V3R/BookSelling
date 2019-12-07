{{-- <form action="{{route('search')}}" method="get" class="search-form">
    <div class="input-group">
        <input type="text" name ="search" class="search-box" placeholder="search book">
        <span class="input-group-prepend">
            <button type="submit" class="btn btn-primary">Search</button>
        </span>
    </div>
</form> --}}
<form class="form-inline" action="{{route('search')}}" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>