<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shoping-List</title>
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div  class="bg-white">
    <header>
        <div class="container px-6 py-3 mx-auto">
            <nav  class="navigation ">
                <div class="topnav" id="myTopnav">
                    <a href="{{ route('products.index') }}" class="active"><i class="fa fa-fw fa-home"></i>Home</a>
                    @guest
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                        <a class="nav-link" href="{{ route('user.create') }}">Register</a>
                    @else
                        <a href="{{ route('products.create') }}">New Product</a>
                        <a href="{{ route('cart') }}"><i class="fa fa-cart-plus" aria-hidden="true"> </i>
                            <span class="btn-danger">{{ count((array) session('cart')) }}</span>
                        </a>
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    @endguest
                </div>
            </nav>
        </div>
    </header>
</div>
@yield('content')
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

