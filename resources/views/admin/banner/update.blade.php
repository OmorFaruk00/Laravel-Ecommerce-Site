@extends('admin/layout')
@section("page_title","Banner")
@section("container")

<form id="" action="{{url('banner_update')}}" method ="post"  enctype="multipart/form-data">  
  @csrf
  <div class="col-md-6 offset-md-3 mt-3 jumbotron">
    <h4 class="text-center mb-3">Update Banner</h4>    
    <div class="form-group">
      <label>Btn Text</label>
      <input type="text" class="form-control" name="btn_text" value="{{$result->btn_text}}">
      <input type="hidden" class="form-control" name="id" value="{{$result->id}}">
    </div>
    <div class="form-group">
      <label>Btn Link</label>
      <input type="text" class="form-control" name="btn_link" value="{{$result->btn_link}}">         
    </div>                
   <div class="form-group">
    <label>Image</label>
    <input type="file" class="form-control" name="image"></input>         
  </div>    
    <img src="{{asset('banner_img/'.$result->image)}}" alt="image" width="100px" height="100px">
  <input type="submit" name="login" class="btn btn-primary btn-block mt-5" value="Submit"/>
  <div class="d-flex justify-content-end mt-3">
    <a href="{{url('banner/show')}}" class="btn btn-danger"><i class="fas fa-undo-alt fa-1x mr-2"></i>Back</a>
  </div>

</div> 

</form>



@endsection