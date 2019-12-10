<nav class="col-sm-3 sidenav">
    <ul class="list-group" data-offset-top="205">
            <li class="list-group-item list-group-item-primary text-center">MENU</li>
        @foreach ($cate as $category)
            <li class="list-group-item">
                <a class="nav-link text-dark" href="#">{{$category->name}}</a>
            </li>
        @endforeach
    </ul>
</nav>
