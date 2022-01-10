@extends('front/layout')
@section('container')

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">        
            <form id="register_sign_up" class="signup_form">
            	 @csrf
                <h2 class="text-center">Register here</h2>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="f_name" class="form-control first_name" placeholder="First Name" requried />
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="l_name" class="form-control last_name" placeholder="Last Name" requried />
                </div>
                <div class="form-group">
                    <label>Username / Email</label>
                    <input type="email" name="username" class="form-control user_name" placeholder="Email Address" requried />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control pass_word" placeholder="Password" requried />
                </div>
                <div class="form-group">
                    <label>Mobile</label>
                    <input type="phone" name="mobile" class="form-control mobile" placeholder="Mobile" requried />
                </div>                
                <input type="submit" name="signup" class="btn" onclick="User_Registration()" value="sign up"/>
            </form>            
        </div>
    </div>
</div>
@endsection