@extends('layouts.app')

@section('nav')
@include('includes/nav')
@endsection


@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="card overflow-auto" style="height: 80vh;">
        <div class="card-body">{!! $text !!}</div>
      </div>
    </div>
  </div>



  @endsection