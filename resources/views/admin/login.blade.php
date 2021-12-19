<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900|Montserrat:400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="admin_asset/css/font-awesome.css">       
    <link rel="stylesheet" href="admin_asset/css/style.css">    
</head>
<body>
<div class="col-md-6 offset-md-3">
  <div class="login-form">
    <h1 class="logo">Admin</h1>
    <form id="" action="{{url('login_submit')}}" method ="post">
      @csrf
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control password" name="password" placeholder="password" required>
      </div>
      <input type="submit" name="login" class="btn" value="login"/>
      <div class="text-danger mt-2" id="alert">{{session('msg')}}</div>   
       
    </form>
  </div>
</div>  
  <script src="admin_asset/js/admin_menu.js"> </script>
  <script>
    $("document").ready(function(){
      setTimeout(function(){
        $("#alert").remove();
      },2000);    
      
    });    
  </script>
        
    
</body>
</html>