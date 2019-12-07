{{-- Không dùng --}}
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if ($message = Session::get('danger'))
            <div class="alert alert-danger">
                    <strong>{{$message}}</strong>
                </div>
            @endif
            @foreach ($data as $book)
                <form action="{{action('BookController@update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{$book->name}}">
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" name="detail" class="form-control" value="{{$book->detail}}">
                    </div>
                    <div class="form-group">
                        <label>Cost</label>
                        <input type="text" name="cost" class="form-control" value="{{$book->cost}}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="text" name="image" class="form-control" value="{{$book->image}}">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" name="category" class="form-control" value="{{$book->id_category}}">
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" name="author" class="form-control" value="{{$book->id_au}}">
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection