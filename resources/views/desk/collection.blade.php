@extends('layouts.app')

@section('nav')
@include('includes/nav')
@endsection

@section('content')
<div class="container">
  <div id="carousel" class="carousel slide row justify-content-center" data-ride="carousel" data-interval="false">
    <div class="carousel-inner col-10">
      <div class="carousel-item active">
        <div class="card">
          <div class="card-header py-0">
            <div class="dropleft">
              <img 
              class="dropdown-toggle float-right" 
              style="height: 36px" 
              src="{{ asset('icons/echo-dot.png') }}" 
              alt="" 
              id="dropdownMenuButton" 
              data-toggle="dropdown" 
              aria-haspopup="true" 
              aria-expanded="false">
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Select</a>
                <a class="dropdown-item" href="#">Insert</a>
                <a class="dropdown-item" href="#">Delete</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">folder title</h5>
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action active">
                Cras justo odio
              </a>
              <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
              <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
              <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
              <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Vestibulum at eros</a>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <a href="#" class="btn btn-primary">Open</a>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card">
          <div class="card-header py-0">
            <div class="dropleft">
              <img 
              class="dropdown-toggle float-right" 
              style="height: 36px" 
              src="{{ asset('icons/echo-dot.png') }}" 
              alt="" 
              id="dropdownMenuButton" 
              data-toggle="dropdown" 
              aria-haspopup="true" 
              aria-expanded="false">
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Select</a>
                <a class="dropdown-item" href="#">Delete</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">text title</h5>
            <p class="card-text">First 100 words: Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam quia sunt consectetur, voluptates atque totam a eum magni non beatae officia eius explicabo recusandae. Saepe fuga modi consequatur repellendus culpa!</p>
          </div>
          <div class="card-footer justify-content-center">
            <a href="{{ route('text') }}" class="btn btn-primary">Read</a>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card">
          <div class="card-body">
            <!--<h5 class="card-title">Special title treatment</h5>-->
            <p class="card-text">Get a new text or create a new folder for your collection.</p>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Position</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Type</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                <option value="1">new Text</option>
                <option value="2">new Folder</option>
              </select>
            </div>

            <div class="input-group mb-3">
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="card-footer justify-content-center">
          <a href="#" class="btn btn-primary">Create</a>
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
<?php /* ?>
  @section('footer')
  @include('includes/footer')
  @endsection
<?php */ ?>