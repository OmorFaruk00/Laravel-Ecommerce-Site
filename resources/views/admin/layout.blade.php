<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900|Montserrat:400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin_asset/css/font-awesome.css')}}">       
    <link rel="stylesheet" href="{{asset('admin_asset/css/style.css')}}"> 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>   
</head>
<body id="main_container">
    <input type="hidden" id="session" value="mosiur">
    <div id="admin-header" class="fixed-top">
        <div class="container ">
            <div class="row">
                <div class="col-md-10">                    
                    <h2 class="text-white">Logo</h2>
                </div>
                <div class="col-md-offset-3 col-md-2">                     
                    <div class="dropdown ">                       
                        <a href="" class="dropdown-toggle logout" data-toggle="dropdown">
                            <span class="caret">Hi Admin</span>
                        </a>
                        <ul class="dropdown-menu pl-3" id="dropdown-menu">
                            <li><a href="change_password.php" >Change Password</a></li>
                            <li><a href="{{url('logout')}}" id="logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="admin-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-3" id="admin-menu">
                    <ul class="menu-list">
                        <li class="@yield('dashboard_select')"><a href="{{url('/dashboard')}}"><i class="fas fa-columns mr-2"></i>Dashboard</a></li>                        
                        <li class="@yield('category_select')"><a href="{{url('/category/show')}}"><i class="fas fa-align-justify mr-2"></i>Category</a></li>
                        <li class="@yield('product_select')"><a href="{{url('/product/show')}}"><i class="fab fa-product-hunt mr-2"></i>Product</a></li>                        
                        <li class="@yield('size_select')"><a href="{{url('/size/show')}}"><i class="fas fa-text-size mr-2"></i>Size</a></li>                        
                        
                    </ul>
                </div>
                <div class="col-md-10 col-sm-9 clearfix" id="admin_content">
                    @section("container")
                    @show
                </div>
            </div>
        </div>
    </div>    
    <script src="{{asset('admin_asset/js/admin_menu.js')}}"></script>           
</body>
</html>