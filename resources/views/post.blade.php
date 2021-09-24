{{-- @dd($post->category) --}}
@extends('layout.main')

@section('container')
    
  <h3>{{ $post->title }}</h3>

  <p>By, Indra Wijaya, <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

  <p>{{ $post->body }}</p>

  <a href="/posts">Kembali</a>

@endsection