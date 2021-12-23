@extends('admin/layout')
@section("page_title","Category")
@section("category_select",'menu_select')
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
          <a href="{{url('category/edit/'.$list->id)}}" class="btn btn-primary" ><i class="fas fa-edit"></i></a>
          <a href="{{url('category/delete/'.$list->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
          @if($list->status == 1)
          <a href="{{url('category/status/0/'.$list->id)}}" class="btn btn-success"><i class="fas fa-check-circle"></i></a>
          @elseif($list->status == 0)
          <a href="{{url('category/status/1/'.$list->id)}}" class="btn btn-danger"><i class="fas fa-times-circle"></i></a>
          @endif
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