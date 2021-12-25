@extends('admin/layout')
@section("container")
@section("page_title","Category")
<form id="" action="{{url('category_update')}}" method ="post"  enctype="multipart/form-data">  
  @csrf
  <div class="col-md-6 offset-md-3 mt-3 jumbotron">
    <h4 class="text-center mb-3">Update Category</h4>    
    <div class="form-group">
      <label>Category Name</label>
      <input type="text" class="form-control" name="category_name" value="{{$data['name']}}">
      <input type="hidden" class="form-control" name="id" value="{{$data['id']}}">
      <span class="text-danger">@error('category_name') {{$message}} @enderror</span>
    </div>    
    <div class="form-group">
      <label>Category Slug</label>
      <input type="text" class="form-control" name="slug" value="{{$data['slug']}}"></input>
      <span class="text-danger">@error('slug') {{$message}} @enderror</span>
    </div>   
    <div class="form-group">
      <label>Parent Category</label>
      <span class="text-danger">@error('parent_category') {{$message}} @enderror</span>
      <select name="parent_category"  class="form-control" value="{{$data['id']}}">         
         <option value="0">Select Category</option>
         @foreach($result as $list)
         @if($data['parent_id'] == $list->id)
         <option selected value="{{$list->id}}">{{$list->name}}</option> 
       </option>
       @else
       <option value="{{$list->id}}">{{$list->name}}</option>
       @endif
       @endforeach           
     </select>           
   </div>       
   <div class="form-group">
    <label>Image</label>
    <input type="file" class="form-control" name="image"></input>
    <span class="text-danger">@error('image') {{$message}} @enderror</span>          
  </div>    
    <img src="{{asset('category_img/'.$data['image'])}}" alt="image" width="100px" height="100px">
  <input type="submit" name="login" class="btn btn-primary btn-block mt-5" value="Submit"/>
  <div class="d-flex justify-content-end mt-3">
    <a href="{{url('category/show')}}" class="btn btn-danger"><i class="fas fa-undo-alt fa-1x mr-2"></i>Back</a>
  </div>

</div> 

</form>



@endsection