
@extends('layouts.main')

@section('container')
<h1 class="text-center mb-4">Halaman Categoies</h1>
<div class="container">
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-md-4 mb-4">
            <a href="/blog?={{ $category->slug }}">
                <div class="card bg-dark text-white ">
                    <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                    <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection