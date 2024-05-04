@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <article class="mt-5">
                <h2 class="mb-3">
                    {{ $post->title }}
                </h2>
                <p>By : <a href="/blog?user={{ $post->user->username }}">{{ $post->user->username }}</a> in <a href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}">
                {!! $post->body !!}
                <a href="/blog" class="fs-5 my-3">Back to Posts</a>
            </article>
        </div>
    </div>
</div>

@endsection

