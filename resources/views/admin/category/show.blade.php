@extends('admin/layout')
@section('page_title', 'Category')
@section("container")
<div class="p-5">
  <div class="d-flex justify-content-between mt-3 mb-3">
  <h2>Category</h2>
  <h4 class="text-success" id="alert_msg">{{session('msg')}}</h4>
  <a class="btn btn-info" href="{{url('category/add')}}">Add Category</a>  
</div>
<table class="table table-striped text-center">
    <thead class="bg-dark text-white">
      <tr>
        <th>ID</th>
        <th>Category Name</th>
        <th>Category Slug</th>        
        <th>Action</th>        
      </tr>
    </thead>
    <tbody>
      @foreach($result as $list)
      <tr>
        <td>{{$list->id}}</td>
        <td>{{$list->name}}</td>
        <td>{{$list->slug}}</td>      
        
        <td>
          <a href="{{url('category/edit/'.$list->id)}}" class="btn btn-primary" >Edit</a>
          <a href="{{url('category/delete/'.$list->id)}}" class="btn btn-danger">Delete</a>
        </td>  
        
      </tr>
      @endforeach
    </tbody>
    
  </table>
</div>
  <script>
    $( document ).ready(function() {
      setTimeout(function(){
        $("#alert_msg").remove();
      },2000);
    
});
  </script>
  @endsection