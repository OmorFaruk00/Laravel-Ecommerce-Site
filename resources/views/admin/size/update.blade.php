@extends('admin/layout')
@section("container")
@section("title","Size")
<div class="col-md-6 offset-md-3 mt-5">
    <form id="" action="{{url('size_update')}}" method ="post" class="jumbotron" enctype="multipart/form-data">
      <h4 class="text-center">Update Size</h4> 
      @csrf
      <div class="form-group">
        <label>Size</label>
        <input type="hidden" class="form-control" name="id" value="{{$data['id']}}">
        <input type="text" class="form-control" name="size" value="{{$data['size']}}">
        <span class="text-danger">@error('size') {{$message}} @enderror</span>
      </div>           
      <input type="submit" name="login" class="btn btn-primary" value="Submit"/>  
       
    </form>
  </div>

  @endsection