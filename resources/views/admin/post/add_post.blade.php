@extends('admin/layout')
@section("container")
<div class="col-md-6 offset-md-3 mt-4">
    <form id="" action="{{url('post_submit')}}" method ="post" class="jumbotron" enctype="multipart/form-data">
      <h4 class="text-center">Add Post</h4> 
      @csrf
      <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title">
        <span class="text-danger">@error('title') {{$message}} @enderror</span>
      </div>
      <div class="form-group">
        <label>Sort Desc</label>
        <textarea type="text" class="form-control" name="short_desc"></textarea>
        <span class="text-danger">@error('short_desc') {{$message}} @enderror</span>
      </div>
      <div class="form-group">
        <label>Long Desc</label>
        <textarea type="text" class="form-control" name="long_desc"></textarea>
        <span class="text-danger">@error('long_desc') {{$message}} @enderror</span>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" name="image">
        <!-- <span class="text-danger">@error('image') {{$message}} @enderror</span> -->
      </div>
      <div class="form-group">
        <label>Added On</label>
        <input type="date" class="form-control" name="added_on">
        <span class="text-danger">@error('added_on') {{$message}} @enderror</span>
      </div>
      <input type="submit" name="login" class="btn btn-primary" value="Submit"/>
         
       
    </form>
  </div>

  @endsection