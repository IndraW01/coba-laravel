{{-- @dd($posts); --}}
@extends('layout.main')

@section('container')
    
<h1 class="mb-5">{{ $title }}</h1>
<div class="container">
  <div class="card mb-5">
    <img src="{{ asset('img/gambar1.jpg') }}" class="card-img-top" alt="gambar1" height="400">
    <div class="card-body text-center">
      <h3 class="card-title">
        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
      </h3>
      <p><small>By <a href="/authors/{{ $posts[0]->user->username }}" class="text-decoration-none text-dark">{{ $posts[0]->user->name }}</a> in <a href="/categories/{{ $posts[0]->category->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->category->name }}</a>, {{ $posts[0]->created_at->diffForHumans() }}</small></p>
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
          <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none text-dark">{{ $post->category->name }}</a>
        </p>
        <div class="card-body">
          <h5 class="card-title">
            <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
          </h5>
          <p><small>By <a href="/authors/{{ $post->user->username }}" class="text-decoration-none text-dark">{{ $post->user->name }}</a>, {{ $post->created_at->diffForHumans() }}</small></p>
          <p class="card-text">{{ $post->excerpt }}</p>
          <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
  @endforeach
</div>

@endsection