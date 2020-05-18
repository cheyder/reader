@extends('layouts.app')

@section('nav')
@include('includes/nav')
@endsection

@section('content')
<div class="container">
  <div id="carousel" class="carousel slide row justify-content-center" data-ride="carousel" data-interval="false">
    <div class="carousel-inner col-10">
      <div class="carousel-item active">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $folder->title }}</h5>
          </div>
        </div>
      </div>

      @foreach($folders as $folder)
      <div class="carousel-item">
        <div class="card">
          <div class="card-header py-0">
            <div class="dropleft">
              <img class="dropdown-toggle float-right" style="height: 36px" src="{{ asset('icons/echo-dot.png') }}" alt="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Select</a>
                <a class="dropdown-item" href="#">Insert</a>
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
          <div class="card-body">
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
              <img class="dropdown-toggle float-right" style="height: 36px" src="{{ asset('icons/echo-dot.png') }}" alt="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Select</a>
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
          <div class="card-body">
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
            <div class="card-body">
              <p class="card-text">Get a new text or create a new folder for your collection.</p>


              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputPosition">Position</label>
                </div>
                <select class="custom-select" id="inputPosition" name="position">
                  <option selected>Choose...</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                  <option value="4">Four</option>
                  <option value="5">Five</option>
                  <option value="6">Six</option>
                </select>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputType">Type</label>
                </div>
                <select class="custom-select" id="inputType" name="type">
                  <option selected>Choose...</option>
                  <option value="file">new Text</option>
                  <option value="folder">new Folder</option>
                </select>
              </div>

              <div class="input-group mb-3">
                <input name="title" type="text" class="form-control" placeholder="title">
              </div>

              <div class="input-group mb-3">
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
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  @endsection