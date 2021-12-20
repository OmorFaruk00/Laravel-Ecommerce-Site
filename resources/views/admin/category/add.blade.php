@extends('admin/layout')
@section("container")
@section("title","category")
<div class="col-md-6 offset-md-3 mt-5">
    <form id="" action="{{url('category_add')}}" method ="post" class="jumbotron" enctype="multipart/form-data">
      <h4 class="text-center">Add Category</h4> 
      @csrf
      <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" name="category_name">
        <span class="text-danger">@error('category_name') {{$message}} @enderror</span>
      </div>
      <div class="form-group">
        <label>Category Slug</label>
        <input type="text" class="form-control" name="slug"></input>
        <span class="text-danger">@error('slug') {{$message}} @enderror</span>
      </div>      
      <input type="submit" name="login" class="btn btn-primary" value="Submit"/>  
       
    </form>
  </div>

  @endsection