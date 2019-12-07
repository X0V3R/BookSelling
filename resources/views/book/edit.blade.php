@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @foreach ($data as $book)
                <form action="{{route('book.update', $book->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Tên Sách</label>
                        <input type="text" name="name" class="form-control" value="{{$book->name}}">
                    </div>
                    <div class="form-group">
                        <label>Chi tiết</label>
                        <input type="text" name="detail" class="form-control" value="{{$book->detail}}">
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="text" name="cost" class="form-control" value="{{$book->cost}}">
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        {{-- <input type="text" name="image" class="form-control" value="{{$book->image}}"> --}}
                        <input type="file" name="image">
                        <img src="{{URL::asset($book->image)}}" width="100px">
                        <input type="hidden" name="hidden_image" value="{{$book->image}}">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" name="category" class="form-control" value="{{$book->id_category}}">
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" name="author" class="form-control" value="{{$book->id_au}}">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="edit" class="btn btn-primary input-lg" value="Lưu">
                        <a href="{{route('home')}}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection