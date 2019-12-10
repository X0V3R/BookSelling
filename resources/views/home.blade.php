@extends('layouts.app')
@section('search')
                @include('book.search')
@endsection

@section('content')
<div class="container">

    <div class="row justify-content-center">

        {{-- <div class="col-md-10 text-right">
                    <a href="{{route('create')}}" class="btn btn-primary">Thêm sách</a>
        </div> --}}

        {{-- EXPLAIN: MENU SIDE BAR
             --}}
        @include('category.show')
        @foreach ($data as $book)
        <div class="col-sm-2 col-md-3">
                {{-- <div class="products"> --}}
                    <div class="card" style="width: 250px">
                        <img src="{{asset($book->image)}}" class="card-img-top" style="height: 250px; width: 250px;" alt="">
                        <div class="card-body">
                            <div class="card-title">{{$book->name}}</div>
                            <p class="card-text">{{$book->detail}}</p>
                            <p class="card-text">{{$book->cost}}</p>
                            {{-- <p class="card-text">{{$book->id_category}}</p> --}}
                            {{-- <p class="card-text">{{$book->id_au}}</p> --}}
                        </div>
                        </div>
                {{-- </div> --}}
        </div>
        @endforeach
    </div>

</div>
@endsection
