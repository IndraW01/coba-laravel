@extends('layout.main')

@section('container')
    
  <h1>About Me</h1>

  <h5>{{ $nama }}</h5>
  <p>{{ $umur }}</p>

  <img src="img/{{ $foto }}" alt="{{ $nama }}" class="img-thumbnail" width="100">

@endsection