@extends('dashboard.layouts.main')

@section('container')

<div class="container">
  <div class="row justify-content-center mb-5">
      <div class="col-lg-10">
          <article class="mt-5">
              <h2 class="mb-3">
                  {{ $post->title }}
              </h2>
              <a href="/dashboard/posts" class="btn btn-success mb-3 text-decoration-none"><span class="bi bi-arrow-left" style="margin-right: 5px;"></span>Back to my post</a>
              <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning mb-3 text-decoration-none" ><span class="bi bi-pen " style="margin-right: 5px;"></span>Edit</a>
              <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger mb-3 text-decoration-none" onclick="return confirm('are you sure ?')"><span class="bi bi-x-circle" style="margin-right: 5px;"></span>Delete</button>
              </form>
              @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mb-2" alt="{{ $post->category->name }}"> 
              </div>
              @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mb-2" alt="{{ $post->category->name }}"> 
                @endif
              {!! $post->body !!} 
              
          </article>
      </div>
  </div>
</div>

@endsection