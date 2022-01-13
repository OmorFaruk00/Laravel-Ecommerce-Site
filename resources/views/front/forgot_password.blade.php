@extends('front/layout')
@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">        
            <form id="change_password" class="signup_form">
            	 @csrf
                <h2 class="text-center">Change Password</h2>
                <div class="form-group">                    
                    <input type="text" id="user_password" name="user_password" class="form-control first_name" placeholder="Enter Password"/>                                        
                </div>                
                <div class="mb-3 text-danger" id="reg_msg"></div>               
                <input type="submit" name="signup" class="btn"  value="submit"/>
            </form>            
        </div>
    </div>
</div>
@endsection
