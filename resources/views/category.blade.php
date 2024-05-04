
@extends('layouts.main')

@section('container')
<h1>Halaman Category : {{ $category }}</h1>
    @foreach ($posts as $post)
    <article class="mt-5">
        <h2>
            <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
        </h2>
        <p>{{ $post->exerpt }}</p>
        
    </article>
    @endforeach
@endsection