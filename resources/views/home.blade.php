@extends('layouts._layout')

@section('content')




<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('navimg/img2.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Tech world</h6>
                        <h1 class="display-3 text-white mb-4 animated slideInDown">Upgrade your tech. See our Products</h1>
                        <a href="{{route('categories.index')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Our Category</a>
                        <a href="#laptops" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Today best deal</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('navimg/img1.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Tech world</h6>
                        <h1 class="display-3 text-white mb-4 animated slideInDown">Upgrade your tech. See our Products</h1>
                        <a href="{{route('categories.index')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Our Category</a>
                        <a href="#laptops" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Today best deal</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
  </div>
  


@endsection