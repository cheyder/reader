@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-11">
    <form action="">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">E-Mail</span>
            </div>

            <input id="email-input" type="text" class="form-control" value="{{ Auth::user()->email }}" aria-label="Email" readonly>
            
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" onclick="toggleEmailEdit()" type="button" id="edit-email">Edit</button>
            </div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Password</span>
            </div>

            <input id="inputPassword" type="password" class="form-control" aria-label="Password" readonly>

            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="edit-password" onclick="togglePasswordEdit()">Edit</button>
            </div>
        </div>

        <div id="confirmPasswordGroup" class="input-group mb-3 d-none">
            <div class="input-group-prepend">
                <span class="input-group-text">Confirm</span>
            </div>
            <input type="password" class="form-control" placeholder="enter it again" aria-label="Confirm Password">
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
    </form>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
</div>
</div>

<div class="row justify-content-around">
</div>
</div>

<script>
    function toggleEmailEdit() {
        let elem = document.getElementById('email-input');
        if(elem.hasAttribute('readonly')) {
            elem.removeAttribute('readonly')
        } else {
            elem.setAttribute('readonly', '')
        }
    }

    function togglePasswordEdit() {
        let pass = document.getElementById('inputPassword');
        let conf = document.getElementById('confirmPasswordGroup');
        if(pass.hasAttribute('readonly')) {
            pass.removeAttribute('readonly');
            pass.setAttribute('placeholder', 'insert new password');
            conf.setAttribute('class', 'input-group mb-3 ')
        } else {
            pass.setAttribute('readonly', '');
            pass.removeAttribute('placeholder');
            conf.setAttribute('class', 'd-none');
        }
    }
</script>
@endsection