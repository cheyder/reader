@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="jumbotron">
        <h1 class="display-4">a reader for reading</h1>
        <p class="lead">distraction free focusing on content</p>
        @auth
        <a class="btn btn-primary btn-lg" href="{{ route('desk', ['currentFolder' => $userDeskFolderId ])  }}" role="button">Reader</a>
        <a class="btn btn-outline-primary btn-lg" href="{{ route('users.edit', auth()->user()) }}" role="button">Settings</a>
        @else
        <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Open yours</a>
        <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Create a new</a>
        @endauth
      </div>
      @if(request()->session()->has('status'))
      <div class="alert alert-light" role="alert">
        {{request()->session()->get('status') }}
      </div>
      @endif
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