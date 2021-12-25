@extends('admin/layout')
@section("page_title","Category")
@section("container")

<form id="" action="{{url('category_add')}}" method ="post"  enctype="multipart/form-data">
   
  @csrf
  <div class="col-md-6 offset-md-3 mt-3 jumbotron">
  <h4 class="text-center mb-3">Add Category</h4>    
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
      <div class="form-group">
        <label>Parent Category</label>
        <span class="text-danger">@error('parent_category') {{$message}} @enderror</span>
         <select name="parent_category" id="" class="form-control">
           <option value="">Select Category</option>
           @foreach($result as $list)
           <option value="{{$list->id}}">{{$list->name}}</option>
           @endforeach           
         </select>         
      </div>       
      <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" name="image"></input>
        <span class="text-danger">@error('image') {{$message}} @enderror</span>          
      </div>
    <input type="submit" name="login" class="btn btn-primary btn-block mt-5" value="Submit"/>
    <div class="d-flex justify-content-end mt-3">
    <a href="{{url('category/show')}}" class="btn btn-danger"><i class="fas fa-undo-alt fa-1x mr-2"></i>Back</a>
  </div>
  </div>   
</form>


@endsection