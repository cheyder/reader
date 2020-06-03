@extends('layouts.app')

@section('nav')
@include('includes/nav')
@endsection

@section('content')
<div class="container">
  <div id="carousel" class="carousel slide row justify-content-center" data-ride="carousel" data-interval="false" data-touch="true" data-keyboard="true">
    <div class="carousel-inner col-11">

      <div class="carousel-item active">
        <div class="card">
          <div class="card-body cover-page">
            <h5 class="card-title cover">{{ $folder->title }}</h5>
          </div>
        </div>
      </div>

      @foreach($folders as $folder)
      <div class="carousel-item">
        <div class="card">
          <div class="card-header py-0">
            <div class="dropleft">
              <img class="dropdown-toggle float-right" src="{{ asset('icons/echo-dot.png') }}" alt="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <form method="POST" action="{{ route('desk.delete', [
                  'elementId' => $folder->id,
                  'elementType' => 'folder'
                  ]) }}">
                  @csrf
                  @method('DELETE')
                  <button class="dropdown-item" type="submit">Delete</button>
                </form>
              </div>
            </div>
          </div>
          <div class="card-body overflow-auto">
            <h5 class="card-title">{{ $folder->title }}</h5>
            <div class="list-group">
              @foreach($folder->subfolders as $subfolder)
              <a href="{{ route('desk', $subfolder->id) }}" class="list-group-item list-group-item-action">{{ $subfolder->title }}</a>
              @endforeach
              @foreach($folder->files as $subfile)
              <a href="{{ route('text', ['url'=> $subfile->url]) }}" class="list-group-item list-group-item-action">{{ $subfile->title }}</a>
              @endforeach
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <a href="{{ route('desk', $folder->id) }}" class="btn btn-primary">Open</a>
          </div>
        </div>
      </div>
      @endforeach

      @foreach($files as $file)
      <div class="carousel-item">
        <div class="card">
          <div class="card-header py-0">
            <div class="dropleft">
              <img class="dropdown-toggle float-right" src="{{ asset('icons/echo-dot.png') }}" alt="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <form method="POST" action="{{ route('desk.delete', [
                  'elementType' => 'file',
                  'elementId' => $file->id
                  ]) }}">
                  @csrf
                  @method('DELETE')
                  <button class="dropdown-item" type="submit">Delete</button>
                </form>
              </div>
            </div>
          </div>
          <div class="card-body overflow-auto">
            <h5 class="card-title">{{ $file->title }}</h5>
            <p class="card-text">{{ $file->abstract }}</p>
          </div>
          <div class="card-footer justify-content-center">
            <a href="{{ route('text', ['id'=> $file->id, 'currentFolder' => $currentFolder]) }}" class="btn btn-primary">Read</a>
          </div>
        </div>
      </div>
      @endforeach

      <div class="carousel-item">
        <form method="POST" action="{{ route('desk.store', ['currentFolderId' => $currentFolder]) }}">
          @csrf
          <div class="card">
            <div class="card-body overflow-auto">
              <p class="card-text">Get a new text or create a new folder for your collection:</p>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputType">Type</label>
                </div>
                <select class="custom-select" id="inputType" name="type">
                  <option onclick="toggleInsert()" selected></option>
                  <option onclick="toggleInsert()" value="file">new Text</option>
                  <option onclick="toggleInsert()" value="folder">new Folder</option>
                </select>
              </div>

              <div id="titleInput" class="input-group mb-3 d-none">
                <input name="title" type="text" class="form-control" placeholder="title">
              </div>

              <div id="urlInput" class="input-group mb-3 d-none">
                <input name="url" type="text" class="form-control" placeholder="url">
              </div>
            </div>
            <div class="card-footer justify-content-center">
              <button href="#" class="btn btn-primary" type="submit">Create</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
      <svg class="bi bi-chevron-left" viewBox="0 0 16 16" fill="dimgrey" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 010 .708L5.707 8l5.647 5.646a.5.5 0 01-.708.708l-6-6a.5.5 0 010-.708l6-6a.5.5 0 01.708 0z" clip-rule="evenodd" />
      </svg>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
      <svg class="bi bi-chevron-right" viewBox="0 0 16 16" fill="dimgrey" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L10.293 8 4.646 2.354a.5.5 0 010-.708z" clip-rule="evenodd" />
      </svg>
      <span class="sr-only">Next</span>
    </a>
  </div>
  @endsection

  @section('footer')
  @include('includes/footer')
  @endsection