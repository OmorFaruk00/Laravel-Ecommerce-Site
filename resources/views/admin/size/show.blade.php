@extends('admin/layout')
@section('page_title', 'Category')
@section("size_select",'menu_select')
@section("container")
<div class="p-3">
  <div class="d-flex justify-content-between mt-3 mb-3">
    <h2>Size</h2>
    <h4 class="text-success" id="alert_msg">{{session('msg')}}</h4>
    <a class="btn btn-info" href="{{url('size/add')}}">Add Size</a>  
  </div>
  <table class="table table-striped text-center">
    <thead class="bg-dark text-white">
      <tr>
        <th>ID</th>
        <th>Size</th>              
        <th>Action</th>        
      </tr>
    </thead>
    <tbody>
      @foreach($result as $list)
      <tr>
        <td>{{$list->id}}</td>
        <td>{{$list->size}}</td>              
        <td>
          <a href="{{url('size/edit/'.$list->id)}}" class="btn btn-primary" ><i class="fas fa-edit"></i></a>
          <a href="{{url('size/delete/'.$list->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
          @if($list->status == 1)
          <a href="{{url('size/status/0/'.$list->id)}}" class="btn btn-success"><i class="fas fa-check-circle"></i></a>
          @elseif($list->status == 0)
          <a href="{{url('size/status/1/'.$list->id)}}" class="btn btn-danger"><i class="fas fa-times-circle"></i></a>
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