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
            <a href="#" class="list-group-item">{{ $text->getTitle() }}</a>
            <div class="list-group">

              <a href="#" class="list-group-item">Item 1.1</a>
              <div class="list-group">
                <a href="#" class="list-group-item">Item 1.1.1</a>
                <a href="#" class="list-group-item">Item 1.1.2</a>
                <a href="#" class="list-group-item">Item 1.1.3</a>
              </div>


              <a href="#" class="list-group-item">Item 1.2</a>
              <div class="list-group">
                <a href="#" class="list-group-item">Item 1.2.1</a>
                <a href="#" class="list-group-item">Item 1.2.2</a>
                <a href="#" class="list-group-item">Item 1.2.3</a>
              </div>

              <a href="#" class="list-group-item">Item 1.3</a>
              <div class="list-group">
                <a href="#" class="list-group-item">Item 1.3.1</a>
                <a href="#" class="list-group-item">Item 1.3.2</a>
                <a href="#" class="list-group-item">Item 1.3.3</a>
              </div>

            </div>

            <a href="#" class="list-group-item">Item 2</a>
            <div class="list-group">

              <a href="#" class="list-group-item">Item 2.1</a>
              <div class="list-group">
                <a href="#" class="list-group-item">Item 2.1.1</a>
                <a href="#" class="list-group-item">Item 2.1.2</a>
                <a href="#" class="list-group-item">Item 2.1.3</a>
              </div>

              <a href="#" class="list-group-item">Item 2.2</a>
              <div class="list-group">
                <a href="#" class="list-group-item">Item 2.2.1</a>
                <a href="#" class="list-group-item">Item 2.2.2</a>
                <a href="#" class="list-group-item">Item 2.2.3</a>
              </div>

              <a href="#" class="list-group-item">Item 2.3</a>
              <div class="list-group">
                <a href="#" class="list-group-item">Item 2.3.1</a>
                <a href="#" class="list-group-item">Item 2.3.2</a>
                <a href="#" class="list-group-item">Item 2.3.3</a>
              </div>

            </div>


            <a href="#" class="list-group-item">Item 3</a>
            <div class="list-group">

              <a href="#" class="list-group-item">Item 3.1</a>
              <div class="list-group">
                <a href="#" class="list-group-item">Item 3.1.1</a>
                <a href="#" class="list-group-item">Item 3.1.2</a>
                <a href="#" class="list-group-item">Item 3.1.3</a>
              </div>

              <a href="#" class="list-group-item">Item 3.2</a>
              <div class="list-group">
                <a href="#" class="list-group-item">Item 3.2.1</a>
                <a href="#" class="list-group-item">Item 3.2.2</a>
                <a href="#" class="list-group-item">Item 3.2.3</a>
              </div>

              <a href="#" class="list-group-item">Item 3.3</a>
              <div class="list-group">
                <a href="#" class="list-group-item">Item 3.3.1</a>
                <a href="#" class="list-group-item">Item 3.3.2</a>
                <a href="#" class="list-group-item">Item 3.3.3</a>
              </div>

            </div>

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