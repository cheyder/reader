@extends('layouts.app')

@section('nav')
@include('includes/nav')
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-11">
      <div class="card overflow-auto" style="height: 80vh;">
        <div class="card-body">
          <div class="list-group list-group-root well">
              @for($i = 0; $i < $h1->length; $i++)
              <a href="#" class="list-group-item">{{ $h1->item($i)->nodeValue }}</a>
              @endfor
              <div class="list-group">
                @for($i = 0; $i < $h2s->length; $i++)
                  <a href="#" class="list-group-item">{{ $h2s->item($i)->nodeValue }}</a>
                  @endfor
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<?php /* ?>
@section('footer')
@include('includes/footer')
@endsection
<?php */ ?>