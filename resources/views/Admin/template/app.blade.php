<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Admin Page</title>
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <div class="dropdown pb-4 mt-3">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                       id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('images/Bayati_Hosaen .1.jpg')}}" alt="hugenerd" width="30" height="30"
                             class="rounded-circle">
                        <span class="d-none d-sm-inline mx-3">hosein</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Sign out</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Website</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Products</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{route('products.create')}}" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline text-white">>create</span> </a>
                            </li>
                            <li>
                                <a href="{{route('products.index')}}" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline text-white">>index</span> </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('DisplayUser')}}"  class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span
                                class="ms-1 d-none d-sm-inline text-white">Users</span></a>
                    </li>
                    <li>
                        <a href="{{route('DisplayOrders')}}"  class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span
                                class="ms-1 d-none d-sm-inline text-white">Orders</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col py-3">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
