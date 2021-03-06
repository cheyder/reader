@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="jumbotron">
        <h1 class="display-4">a reader for reading</h1>
        <p class="lead">distraction free focusing on content</p>
        @auth
        <a class="btn btn-primary btn-lg my-1" href="{{ route('desk', ['currentFolder' => $userDeskFolderId ])  }}" role="button">Reader</a>
        <a class="btn btn-outline-primary btn-lg my-1" href="{{ route('users.edit', auth()->user()) }}" role="button">Settings</a>
        @else
        <a class="btn btn-primary btn-lg my-1" href="{{ route('login') }}" role="button">Open yours</a>
        <a class="btn btn-primary btn-lg my-1" href="{{ route('register') }}" role="button">Create a new</a>
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

@section('footer')
@include('includes/footer')
@endsection