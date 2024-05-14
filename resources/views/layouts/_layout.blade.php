<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>M'SIAID</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  
</head>
<body>
<header>
 
  <div class="container-fluid mybackground px-0">
    <div class="row gx-0">
        <div class="col-lg-3 mybackround d-none d-lg-block">
            <a href="{{route('home')}}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 mycolor text-uppercase">S.M'siaid</h1>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-white d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope mycolor me-2"></i>
                        <p class="mb-0">msiaidsaad@gmail.com</p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt mycolor me-2"></i>
                        <p class="mb-0">+212691572467</p>
                    </div>
                </div>
               
            </div>

            <nav class="navbar navbar-expand-lg mybackground navbar-dark p-3 p-lg-0">
                <a href="{{route('home')}}" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 mycolor text-uppercase">S.M'siaid</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">   <span class="navbar-toggler-icon"></span>  </button>
              
                 

           
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0 mycolor">
                        <a href="{{route('home')}}" class="nav-item nav-link  ">Home</a>
                       
                        <a href="{{route('categories.index')}}" class="nav-item nav-link">Categories</a>
                        <a href="{{route('client.index')}}" class="nav-item nav-link">Clients</a>
                         <a href="{{route('commands.index')}}" class="nav-item nav-link">Commands</a>
                        <a href="{{route('user.edit')}}" class="nav-item nav-link">profile</a>
                    </div>
                    @auth
                        
                 

                    <form class="d-flex" action="{{route('auth.logout')}}" method="POST">
                        @csrf
                        @method('delete')
                        <button  class="btn btn-danger rounded-0 py-4 px-md-5 d-none d-lg-block"type="submit">LogOut</button>
                    </form>
                 @else
                    <a href="{{route('auth.login')}}" class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">Sign up/Log in<i class="fa fa-arrow-right ms-3"></i></a>
               


                   @endauth 
                </div>
            </nav>
        </div>
    </div>
</div>







</header>
<body>

  <div class="content">
    @yield('content')
</div>
</body>
</html>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
