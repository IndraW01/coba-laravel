@extends('layout.main')

@section('container')
    
@foreach ($categories as $category)
  <ul>
    <h3><li><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></li></h3>
  </ul>

@endforeach

@endsection