@extends('layouts.app')
@section('search')
                @include('book.search')
@endsection

@section('content')
<div class="container">

    <div class="row">
            <div class="col-md-10 text-right">
                    <a href="{{route('create')}}" class="btn btn-primary">Thêm sách</a>
                </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Danh mục sách</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    {{-- <th>Mã sách</th> --}}
                                    <th>Ảnh</th>
                                    <th>Tên sách</th>
                                    <th>Chi tiết</th>
                                    <th>Giá</th>
                                    {{-- <th>Thể loại</th>
                                    <th>Tác giả</th> --}}
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                    
                                @foreach ($data as $book)
                                <tr>
                                    <td><img src="{{$book->image}}" alt="" width="100px" height="100px"></td>
                                    {{-- <td>{{$book->id}}</td> --}}
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->detail}}</td>
                                    <td>{{$book->cost}}</td>
                                    {{-- <td>{{$book->id_category}}</td> --}}
                                    {{-- <td>{{$book->id_au}}</td> --}}
                                    <td>
                                        <a href="{{route('book.show', $book->id)}}" class="btn btn-info">Show</a>
                                        <a href="{{route('book.edit', $book->id)}}" class="btn btn-warning">Edit</a>
                                        <form action="{{route('book.destroy',$book->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                          </table>
                    </div>
            </div>
            {{-- phân trang --}}
            {{$data->links()}}
        </div>
    </div>
</div>
@endsection
