@extends('layouts.main_layout')
@section('content_main')
    <h1>Welcome View and Blade!</h1>
    <hr>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quasi eaque tempore animi odio doloremque porro error eligendi omnis? Nemo recusandae explicabo odio reprehenderit maxime. Quae vel est quasi quo!</p>

    <h2>Page 01</h2>
    <h3>The value parameter is:</h3>
    <p>{{ $value }}</p>

@endsection
