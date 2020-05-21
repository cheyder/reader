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
            @foreach($headers as $header)
            @if($header['type'] === "h1")
            <a 
              href="{{ route('text', ['id' => $id]) }}#{{ $header['id'] ? $header['id'] : '' }}" 
              class="list-group-item">
              {{ $header['header'] }}
            </a>
            @endif
              <div class="list-group">
                @if($header['type'] === "h2")
                <a 
                  href="{{ route('text', ['id' => $id]) }}#{{ $header['id'] ? $header['id'] : '' }}" 
                  class="list-group-item">
                  {{ $header['header'] }}
                </a>
                @endif
                <div class="list-group">
                  @if($header['type'] === "h3")
                  <a 
                    href="{{ route('text', ['id' => $id]) }}#{{ $header['id'] ? $header['id'] : '' }}" 
                    class="list-group-item">
                    {{ $header['header'] }}
                  </a>
                  @endif
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection