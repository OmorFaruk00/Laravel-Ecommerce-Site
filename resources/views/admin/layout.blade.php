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
</head>
<body id="main_container">
    <input type="hidden" id="session" value="mosiur">
    <div id="admin-header" class="fixed-top">
        <div class="container ">
            <div class="row">
                <div class="col-md-10">
                    
                    <h2 class="text-white">MY Blog</h2>
                </div>
                <div class="col-md-offset-3 col-md-2">                     
                    <div class="dropdown ">                       
                        <a href="" class="dropdown-toggle logout" data-toggle="dropdown">
                            <span class="caret"></span>
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
                        <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li><a href="{{url('/category/show')}}">Category</a></li>
                        <li><a href="{{url('/post/list')}}">Manage Post</a></li>                        
                        
                    </ul>
                </div>
                <div class="col-md-10 col-sm-9 clearfix" id="admin_content">
                    @section("container")
                    @show
                </div>
            </div>
        </div>
    </div>    
    <script src="{{asset('admin_asset/js/admin_menu.js')}}">
        
    </script> 
</body>
</html>