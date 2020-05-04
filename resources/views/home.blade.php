@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-11">
    <div id="carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="card">
                <div class="card-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!--<img class="img-fluid" src="icons/echo-dot.png" alt>-->
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Select</a>
                            <a class="dropdown-item" href="#">Move</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">folder title</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active">
                            Cras justo odio
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                        <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Vestibulum at eros</a>
                    </div>
                </div>
                <div class="card-footer justify-content-center">
                    <a href="#" class="btn btn-primary">Open</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
            <div class="card-header">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!--<img class="img-fluid" src="icons/echo-dot.png" alt>-->
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Select</a>
                        <a class="dropdown-item" href="#">Move</a>
                        <a class="dropdown-item" href="#">Delete</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">text title</h5>
                <p class="card-text">First 100 words: Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam quia sunt consectetur, voluptates atque totam a eum magni non beatae officia eius explicabo recusandae. Saepe fuga modi consequatur repellendus culpa!</p>
            </div>
            <div class="card-footer justify-content-center">
                    <a href="#" class="btn btn-primary">Read</a>
            </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
            <div class="card-header">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!--<img class="img-fluid" src="icons/echo-dot.png" alt>-->
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Select</a>
                        <a class="dropdown-item" href="#">Move</a>
                        <a class="dropdown-item" href="#">Delete</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
            </div>
            <div class="card-footer justify-content-center">
                    <a href="#" class="btn btn-primary">Open</a>
            </div>
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
</div>
</div>



@endsection