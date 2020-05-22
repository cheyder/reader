@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-11">
      <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">E-Mail</span>
          </div>

          <input id="inputEmail" name="email" type="text" class="form-control" value="{{ $user->email }}" aria-label="Email" readonly>

          <div class="input-group-append">
            <button class="btn btn-outline-secondary" onclick="toggleEmailEdit()" type="button" id="edit-email">Edit</button>
          </div>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Password</span>
          </div>

          <input id="inputPassword" name="password" type="password" class="form-control" aria-label="Password" readonly>

          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="edit-password" onclick="togglePasswordEdit()">Edit</button>
          </div>
        </div>

        <div id="confirmPasswordGroup" class="input-group mb-3 d-none">
          <div class="input-group-prepend">
            <span class="input-group-text">Confirm</span>
          </div>
          <input id="confirmPassword" name="confirmPass" type="password" class="form-control" placeholder="enter it again" aria-label="Confirm Password">
        </div>


        <button class="btn btn-primary" type="submit">Submit</button>
        <a class="btn btn-secondary" href=" {{ route('welcome') }}">Cancel</a>
        <button class="btn btn-outline-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </button>
        <button class="btn btn-outline-danger" onclick="event.preventDefault();
                    document.getElementById('delete-form').submit();">Delete</button>
      </form>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>

      <form id="delete-form" action="{{ route('users.destroy', $user) }}" method="POST" class="d-none">
        @csrf
        @method('DELETE')
      </form>
    </div>
  </div>

  <div class="row justify-content-around">
  </div>
</div>
@endsection