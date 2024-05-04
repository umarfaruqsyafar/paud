@extends('dashboard.layouts.main')

@section('container')
<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Categories</h1>
</div>
@if (session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
  </div>
@endif
<div class="table-responsive small col-lg-6">
    <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create new category</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr class="text-center">
          <th scope="col">#</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td class="text-center">
                <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info text-decoration-none"><span class="bi bi-eye d-flex align-items-center justify-content-center"></span></a>
                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning text-decoration-none"><span class="bi bi-pen d-flex align-items-center justify-content-center"></span></a>
                <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger text-decoration-none border-0" onclick="return confirm('are you sure ?')"><span class="bi bi-x-circle d-flex align-items-center justify-content-center"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection