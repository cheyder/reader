@extends('layouts.app')

@section('nav')
@include('includes/nav')
@endsection


@section('content')
<div class="container">
  <div id="carousel" class="carousel slide row justify-content-center" data-ride="carousel" data-interval="false">
    <div class="carousel-inner col-10">
      <div class="carousel-item active">
        <div class="card" style="height: 80vh;">
          <div class="card-body">{!! $text !!}</div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card" style="height: 80vh;">
          <div class="card-body">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos incidunt magnam vitae, tenetur quam provident culpa laboriosam. Fugiat, nihil. Alias ea illum asperiores velit ipsam rerum in at. Maxime, repellat.
            Sapiente sit nobis illum soluta alias quod quibusdam, nemo eaque non error eveniet eum, ab doloremque obcaecati. Doloribus dolor impedit possimus voluptates aspernatur, laudantium omnis vitae consectetur quos laborum repellat?
            Architecto ut dolor aliquam sequi cumque blanditiis repudiandae, hic similique quidem quisquam consequatur? Neque fugit officia suscipit dolor, error temporibus nulla in quibusdam, iste eius adipisci minima. Dolores, culpa est
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  @endsection
