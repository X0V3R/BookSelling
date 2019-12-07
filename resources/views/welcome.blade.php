@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Sample User details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection