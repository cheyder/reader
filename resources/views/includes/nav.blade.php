@if(Request::is('*text'))
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-0" style="height: 48px;">
  <div class="container">
    <a href="{{ route('desk', ['currentFolder' => $currentFolder]) }}">
      <svg class="bi bi-arrow-up-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M2.5 4a.5.5 0 01.5-.5h5a.5.5 0 010 1H3.5V9a.5.5 0 01-1 0V4z" clip-rule="evenodd" />
        <path fill-rule="evenodd" d="M2.646 3.646a.5.5 0 01.708 0l9 9a.5.5 0 01-.708.708l-9-9a.5.5 0 010-.708z" clip-rule="evenodd" />
      </svg>
    </a>
    <a href="{{ route('text.contents', ['id' => $id]) }}">
      <svg class="bi bi-list-ol" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9a.5.5 0 01-.5-.5zm0-4a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9a.5.5 0 01-.5-.5zm0-4a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9a.5.5 0 01-.5-.5z" clip-rule="evenodd" />
        <path d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 01-.492.594v.033a.615.615 0 01.569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 00-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z" />
      </svg>
    </a>
  </div>
</nav>
@endif

@if(Request::is('*text/contents'))
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-0" style="height: 48px;">
  <div class="container">
    <a href="{{ route('text', ['id' => $id]) }}">
      <svg class="bi bi-arrow-up-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M2.5 4a.5.5 0 01.5-.5h5a.5.5 0 010 1H3.5V9a.5.5 0 01-1 0V4z" clip-rule="evenodd" />
        <path fill-rule="evenodd" d="M2.646 3.646a.5.5 0 01.708 0l9 9a.5.5 0 01-.708.708l-9-9a.5.5 0 010-.708z" clip-rule="evenodd" />
      </svg>
    </a>
  </div>
</nav>
@endif

@if(Request::is('*desk*'))
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-0">
  <div class="container">

    <a class="navbar-brand" href="{{ url('/') }}">
      {{ config('app.name', 'Reader') }}
    </a>

    <ol class="breadcrumb">
      @if(isset($nestingLevels['0']))
      <li class="breadcrumb-item">
        <a class="btn p-1" href="{{ route('desk', ['currentFolder' => $nestingLevels['0']]) }}">
          <img src="{{ asset('icons/archive-cabinet.png') }}" style="height:24px" alt="">
        </a>
      </li>
      @endif
      @if(isset($nestingLevels['1']))
      <li class="breadcrumb-item">
        <a class="btn p-1" href="{{ route('desk', ['currentFolder' => $nestingLevels['1'] ]) }}">
          <img src="{{ asset('icons/archive-box.png') }}" style="height:24px" alt="">
        </a>
      </li>
      @endif
      @if(isset($nestingLevels['2']))
      <li class="breadcrumb-item">
        <a class="btn p-1" href="{{ route('desk', ['currentFolder' => $nestingLevels['2'] ]) }}">
          <img src="{{ asset('icons/folder.png') }}" style="height:24px" alt="">
        </a>
      </li>
      @endif
      @if(isset($nestingLevels['3']))
      <li class="breadcrumb-item">
        <a class="btn p-1" href="{{ route('desk', ['currentFolder' => $nestingLevels['3'] ]) }}">
          <img src="{{ asset('icons/document.png') }}" style="height:24px" alt="">
        </a>
      </li>
      @endif
    </ol>
  </div>
</nav>
@endif