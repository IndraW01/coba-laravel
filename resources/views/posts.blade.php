{{-- @dd($posts); --}}
@extends('layout.main')

@section('container')
    
<h1>My Post</h1>

<h4 class="mb-5"><a href="/categories">All Categories</a></h4>

@foreach ($posts as $post)
  <article class="mb-5">
    <h3>
      <a href="/posts/{{ $post->slug}}">{{ $post->title }}</a>
    </h3>

    <p>By <a href="/authors/{{ $post->user->username }}">{{ $post->user->name }}</a>, <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

    <p>{{ $post->excerpt }}</p>

    <a href="/posts/{{ $post->slug}}">Read more..</a>
  </article>

@endforeach

@endsection