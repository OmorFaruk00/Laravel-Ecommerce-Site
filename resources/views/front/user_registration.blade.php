@extends('front/layout')
@section('container')

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">        
            <form id="register_sign_up" class="signup_form" >
            	 @csrf
                <h2 class="text-center">Register here</h2>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control first_name" placeholder="First Name"/>
                     <span class="field_error text-danger" id="first_name_error"></span>                     
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control last_name" placeholder="Last Name"/>
                    <span class="field_error text-danger" id="last_name_error"></span>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control user_name" placeholder="Email Address"/>
                    <span class="field_error text-danger" id="email_error"></span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control pass_word" placeholder="Password"/>
                    <span class="field_error text-danger" id="password_error"></span>
                </div>
                <div class="form-group">
                    <label>Mobile</label>
                    <input type="phone" name="mobile" class="form-control mobile" placeholder="Mobile" />
                    <span class="field_error text-danger" id="mobile_error"></span>
                </div> 
                <div class="mb-3 text-danger" id="reg_msg"></div>               
                <input type="submit" name="signup" class="btn"  value="sign up"/>
            </form>            
        </div>
    </div>
</div>
@endsection