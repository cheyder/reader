@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-11">
    <form action="">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">E-Mail</span>
            </div>

            <input type="text" class="form-control" value="ingo@flottertyp.de" aria-label="Email" aria-describedby="basic-addon1" readonly>
            
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="edit-email">Edit</button>
            </div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="password">Password</span>
            </div>

            <input type="password" class="form-control" placeholder="Insert a new password:" aria-label="Password" aria-describedby="password">

            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="edit-email">Edit</button>
            </div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="password">Confirm</span>
            </div>

            <input type="password" class="form-control" placeholder="Type your new password again:" aria-label="Password" aria-describedby="password">
        </div>

        
        <button class="btn btn-primary" type="submit">Submit</button>
        <a class="btn btn-secondary" href=" {{ route('welcome') }}">Cancel</a>
        <button
            class="btn btn-outline-primary" 
            href="{{ route('logout') }}"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
        </button>
        <button class="btn btn-outline-danger" type="submit">Delete</button>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </form>
</div>
</div>

<div class="row justify-content-around">
</div>
</div>
@endsection