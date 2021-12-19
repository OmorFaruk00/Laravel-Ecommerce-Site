@extends('admin/layout')
@section("container")
<div class="col-md-6 offset-md-3 mt-4">
  @foreach($data as $list)
    <form action="{{url('post_update',['id'=>$list->id])}}" method ="post" class="jumbotron" enctype="multipart/form-data">
      <h4 class="text-center">Update Post</h4> 
      @csrf
      <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" value="{{$list->title}}">
      </div>
      <div class="form-group">
        <label>Sort Desc</label>
        <textarea type="text" class="form-control" name="short_desc" >{{$list->short_desc}}</textarea>
      </div>
      <div class="form-group">
        <label>Long Desc</label>
        <textarea type="text" class="form-control" name="long_desc" >{{$list->long_desc}}</textarea>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" name="image" >
      </div>
      <div class="form-group">
        <label>Added On</label>
        <input type="date" class="form-control" name="added_on" value="{{$list->added_on}}">
      </div>
      <input type="submit" name="login" class="btn btn-primary" value="Submit"/>
       
    </form>
    @endforeach
  </div>

  @endsection