{{-- @dd($posts); --}}
@extends('layout.main')

@section('container')
    
<h1 class="mb-3 text-center">{{ $title }}</h1>


@if ($posts->count() > 0) 
  
  <div class="container mb-3">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="/posts">
          @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          @if(request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
          @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" placeholder="Search" autocomplete="off" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit" id="search">Search</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="card mb-5">
      <img src="{{ asset('img/gambar1.jpg') }}" class="card-img-top" alt="gambar1" height="400">
      <div class="card-body text-center">
        <h3 class="card-title">
          <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
        </h3>
        <p><small>By <a href="?author={{ $posts[0]->user->username }}" class="text-decoration-none text-dark">{{ $posts[0]->user->name }}</a> in <a href="?category={{ $posts[0]->category->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->category->name }}</a>, {{ $posts[0]->created_at->diffForHumans() }}</small></p>
        <p class="card-text fs-5">{{ $posts[0]->excerpt }}</p>
        <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>

  <div class="row">
    @foreach ($posts->skip(1) as $post)
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="{{ asset('img/gambar1.jpg') }}" class="card-img-top" alt="..." width="400" height="200">
          <p class="bg-light position-absolute px-4 py-2">
            <a href="?category={{ $post->category->slug }}" class="text-decoration-none text-dark">{{ $post->category->name }}</a>
          </p>
          <div class="card-body">
            <h5 class="card-title">
              <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
            </h5>
            <p><small>By <a href="?author={{ $post->user->username }}" class="text-decoration-none text-dark">{{ $post->user->name }}</a>, {{ $post->created_at->diffForHumans() }}</small></p>
            <p class="card-text">{{ $post->excerpt }}</p>
            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

@else
    <p class="text-center fs-5">Not Found Posts...</p>
@endif

<div class="justify-content-end d-block">
  {{ $posts->links() }}
</div>

@endsection