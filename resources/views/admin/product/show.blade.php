@extends('admin/layout')
@section("page_title","Product")
@section("product_select",'menu_select')
@section("container")
<div class="d-flex justify-content-between p-4">
  <h2>All Product</h2>
  <h4 class="text-success" id="alert_msg">{{session('msg')}}</h4>
  <a class="btn btn-primary" href="{{url('product/add')}}">Add Product</a>  
</div>
<table class="table table-striped text-center">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Cat_id</th>        
        <th>Slug</th>        
        <th>Model</th>        
        <th>Brand</th>        
        <th>Qty</th>        
        <th>Price</th>        
        <th>Image</th>
        <th width="160px">Action</th>        
      </tr>
    </thead>
    <tbody>
      @foreach($result as $list)
      <tr>
        <td>{{$list->id}}</td>
        <td>{{$list->title}}</td>
        <td>{{$list->category_id}}</td>
        <td>{{$list->slug}}</td>        
        <td>{{$list->model}}</td>
        <td>{{$list->brand_id}}</td>
        <td>{{$list->qty}}</td>
        <td>{{$list->price}}</td>
        <td> <img src="{{asset('product_img/'.$list->image)}}" alt="image" width="100px" height="100px"></td>
         <td>
          <a href="{{url('product/edit/'.$list->id)}}" class="btn btn-primary" ><i class="fas fa-edit"></i></a>
          <a href="{{url('product/delete/'.$list->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
          @if($list->status == 1)
          <a href="{{url('product/status/0/'.$list->id)}}" class="btn btn-success"><i class="fas fa-check-circle"></i></a>
          @elseif($list->status == 0)
          <a href="{{url('product/status/1/'.$list->id)}}" class="btn btn-danger"><i class="fas fa-times-circle"></i></a>
          @endif
        </td>        
      </tr>
      @endforeach      
    </tbody>
  </table>
  <div class="d-flex justify-content-center mb-5 mt-5">
    {{$result->links('pagination::bootstrap-4')}}
  </div>
  <script>
    $( document ).ready(function() {
      setTimeout(function(){
        $("#alert_msg").remove();
      },2000);
    
});
  </script>
  @endsection