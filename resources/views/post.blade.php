{{-- @dd($post->category) --}}
@extends('layout.main')

@section('container')
    
<div class="row justify-content-center mb-5">
  <div class="col-md-8">
    <h3>{{ $post->title }}</h3>

    <p class="mb-4">By, <a class="text-decoration-none text-dark" href="/authors/{{ $post->user->username }}">{{ $post->user->name }}</a> <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none text-dark">{{ $post->category->name }}</a></p>
  
    <p>{!! $post->body !!}</p>
  
    <a href="/posts">Kembali</a>
  </div>
</div>

@endsection