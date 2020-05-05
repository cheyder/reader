@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-9">
    <div class="card">
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">Chapter One</li>
                <li class="list-group-item">Chapter Two
                    <ul class="list-group">
                        <li class="list-group-item">Section 2a</li>
                        <li class="list-group-item">Section 2b</li>
                    </ul>
                </li>
                <li class="list-group-item"> Chapter Three
                    <ul class="list-group">
                        <li class="list-group-item">Section 3a</li>
                        <li class="list-group-item">Section 3b</li>
                    </ul>
                </li>
            </ul>
        </div>
    
    </div>
</div>
</div>
</div>
@endsection

@section('footer')
@include('includes/footer')
@endsection