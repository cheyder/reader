@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="jumbotron">
        <h1 class="display-4">a reader for reading</h1>
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
        @auth
        <a class="btn btn-primary btn-lg" href="{{ route('desk', ['currentFolder' => 1])  }}" role="button">Reader</a>
        <a class="btn btn-outline-primary btn-lg" href="{{ route('settings') }}" role="button">Settings</a>
        @else
        <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Open yours</a>
        <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Create a new</a>
        @endauth
      </div>
    </div>
  </div>
</div>
@endsection


<?php /*?>
<div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
<?php */ ?>