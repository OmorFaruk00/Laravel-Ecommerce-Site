@extends('admin/layout')
@section("container")
@section("title","Size")
<div class="col-md-6 offset-md-3 mt-5">
    <form id="" action="{{url('size_add')}}" method ="post" class="jumbotron" enctype="multipart/form-data">
      <h4 class="text-center">Add Size</h4> 
      @csrf
      <div class="form-group">
        <label>Size</label>
        <input type="text" class="form-control" name="size">
        <span class="text-danger">@error('size') {{$message}} @enderror</span>
      </div>           
      <input type="submit" name="login" class="btn btn-primary" value="Submit"/>  
       
    </form>
  </div>

  @endsection