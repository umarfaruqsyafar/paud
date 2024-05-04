@extends('layouts.main')

@section('container')
<h1>Ini Halaman About</h1>
<p>Nama : {{ $name }}</p>
<p>Email : {{ $email }}</p>
<img src="{{ $image }}" style="width: 200px;" alt="">
@endsection