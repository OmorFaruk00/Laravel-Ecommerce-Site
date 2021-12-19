@extends('admin/layout')
@section("container")
<div class="d-flex justify-content-between mt-3 mb-3">
  <h2>All Post</h2>
  <h4 class="text-success" id="alert_msg">{{session('msg')}}</h4>
  <a class="btn btn-primary" href="{{url('post/add')}}">Add Post</a>  
</div>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Short Desc</th>
        <th>Post Date</th>        
        <th>Image</th>
        <th>Action</th>        
      </tr>
    </thead>
    <tbody>
      @foreach($data as $list)
      <tr>
        <td>{{$list->id}}</td>
        <td>{{$list->title}}</td>
        <td>{{$list->short_desc}}</td>
        <td>{{$list->added_on}}</td>
        <td> <img src="{{asset('post1/'.$list->image)}}" alt="" width="100px" height="100px"></td> 
        <td>
          <a href="{{url('post/update/'.$list->id)}}" class="btn btn-primary mb-3" >Edit</a>
          <a href="{{url('post/delete/'.$list->id)}}" class="btn btn-danger">Delete</a>
        </td>  
        
      </tr>
      @endforeach
    </tbody>
  </table>
  <script>
    $( document ).ready(function() {
      setTimeout(function(){
        $("#alert_msg").remove();
      },2000);
    
});
  </script>
  @endsection