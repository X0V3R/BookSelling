@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if ($message = Session::get('danger'))
            <div class="alert alert-danger">
            <Strong>{{$message}}</Strong>
            </div>
            @endif
            <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tên sách</label>
                    <input class="form-control" type="text" name="name" placeholder="Book Name">
                </div>
                <div class="form-group">
                    <label for="">Chi tiết</label>
                    <input class="form-control" type="text" name="detail" placeholder="Detail">
                </div>
                <div class="form-group">
                    <label for="">Giá</label>
                    <input class="form-control" type="text" name="cost" placeholder="Cost">
                </div>
                <div class="form-group">
                    <label for="">Ảnh</label>
                    <input class="form-control-file" type="file" name="image">
                    @if ($errors->has('caption'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->first('caption')}}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <input class="form-control" type="text" name="category" placeholder="category">
                </div>
                <div class="form-group">
                    <label for="">Author</label>
                    <input class="form-control" type="text" name="author" placeholder="author Name">
                </div>
                <button class="btn btn-primary" type="submit">Thêm</button>
            </form>

        </div>
    </div>
@endsection