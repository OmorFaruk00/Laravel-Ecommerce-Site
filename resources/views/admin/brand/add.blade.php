@extends('admin/layout')
@section("page_title","Brand")
@section("container")

<form id="" action="{{url('brand_add')}}" method ="post"  enctype="multipart/form-data">
   
  @csrf
  <div class="col-md-6 offset-md-3 mt-3 jumbotron">
  <h4 class="text-center mb-3">Add Brand</h4>    
      <div class="form-group">
        <label>Brand Name</label>
        <input type="text" class="form-control" name="name">
        <span class="text-danger">@error('name') {{$message}} @enderror</span>
      </div>            
      <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" name="image"></input>
        <span class="text-danger">@error('image') {{$message}} @enderror</span>          
      </div>
    <input type="submit" name="login" class="btn btn-primary btn-block mt-5" value="Submit"/>
    <div class="d-flex justify-content-end mt-3">
    <a href="{{url('brand/show')}}" class="btn btn-danger"><i class="fas fa-undo-alt fa-1x mr-2"></i>Back</a>
  </div>
  </div>   
</form>


@endsection