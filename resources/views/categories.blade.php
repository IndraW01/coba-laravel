@extends('layout.main')

@section('container')
    
<div class="container">
  <div class="row">
    @foreach ($categories as $category)
      <div class="col-md-4">
        <div class="card bg-dark text-white">
          <a href="/categories/{{ $category->slug }}">
            <img src="{{ asset('img/gambar1.jpg') }}" class="card-img" alt="...">
            <div class="card-img-overlay px-0 d-flex align-items-center justify-content-center">
              <h5 class="card-title text-white px-3 py-3" style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h5>
            </div>
        </a>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection