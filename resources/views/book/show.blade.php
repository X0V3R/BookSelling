@extends('layouts.app')
@section('content')
    <div class="card" style="width: 350px">
        @foreach ($data as $book)
    <img src="{{asset($book->image)}}" class="card-img-top" style="height: 400px; width: 100%;" alt="">
    <div class="card-body">
        <div class="card-title">{{$book->name}}</div>
        <p class="card-text">{{$book->detail}}</p>
        <p class="card-text">{{$book->cost}}</p>
        <p class="card-text">{{$book->id_category}}</p>
        <p class="card-text">{{$book->id_au}}</p>
    </div>
        @endforeach
    </div>
@endsection
