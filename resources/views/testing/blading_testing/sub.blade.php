@extends('blading_testing.master')
@section('title','Đây là sub template')
@section('noidung')
    <p>Đây là sub</p>
    <?php $fullname = "Le Thanh Phong";?>
    {{-- echo biến php trong blade -> dùng cho test truy vấn--}}
    {{$fullname}}
    {{-- hoặc dùng cho văn bản thường --}}
    <br>
    {!!$fullname!!}
@endsection
@section('sidebar')
    <p>Nằm phía trên parent</p>
    @parent
    <p>nằm phía dưới parent</p>
@stop

