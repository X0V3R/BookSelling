
    <div class="general row">
        <div class="category col-lg-2 col-sm-3">
            <nav class="navbar bg-light">
                @foreach ($cate as $cate)
                <ul class="navbar-nar">
                    <li class="nav-item-active">
                     <a href="" class="nav text-dark">{{$cate->name}}</a>   
                    </li>
                </ul>
                @endforeach
            </nav>
        </div>
    </div>
