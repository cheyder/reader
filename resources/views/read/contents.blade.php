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
            @if($header->tag === "h1")
            <a href="#{{ route('text', ['url' => $url, 'id' => '#'.$header->id]) }}" class="list-group-item">{{ $header->innertext }}</a>
            @endif
            <div class="list-group">
              @if($header->tag === "h2")
              <a href="{{ route('text') }}" class="list-group-item">{{ $header->innertext }}</a>
              @endif
              <div class="list-group">
                @if($header->tag === "h3")
                <a href="{{ route('text') }}" class="list-group-item">{{ $header->innertext }}</a>
                @endif
              </div>
            </div>
            @endforeach

            <?php /* ?>
            @for($i = 0; $i < $h1->length; $i++)
              <a href="#" class="list-group-item">{{ $h1->item($i)->nodeValue }}</a>
              @endfor
              <div class="list-group">
                @for($i = 0; $i < $h2s->length; $i++)
                  <a href="#" class="list-group-item">{{ $h2s->item($i)->nodeValue }}</a>
                  @endfor
                  <?php */ ?>

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