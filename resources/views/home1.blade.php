@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {{-- <script>alert('you are logged in')</script> --}}
                <div class="card-header">List of Books</div>
                
                <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mã sách</th>
                                    <th>Tên sách</th>
                                    <th>Chi tiết</th>
                                    <th>Giá</th>
                                    <th>Ảnh</th>
                                    <th>Thể loại</th>
                                    <th>Tác giả</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <?php
                                $data = App\books::all();
                            ?>
                                @foreach ($data as $book)
                                <tr>
                                    <td>{{$book->id}}</td>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->detail}}</td>
                                    <td>{{$book->cost}}</td>
                                    <td><img src="{{$book->image}}" alt="" width="100px" height="100px"></td>
                                    <td>{{$book->id_category}}</td>
                                    <td>{{$book->id_au}}</td>
                                    <td><a href="edit"><i class="fas fa-pencil-alt"></a></td>
                                    <td><a href=""><i class="fas fa-trash-alt"></a></td>
                                </tr>
                            @endforeach
                        </table>
                </div>

                
            </div>
  

        </div>
    </div>
</div>
@endsection
