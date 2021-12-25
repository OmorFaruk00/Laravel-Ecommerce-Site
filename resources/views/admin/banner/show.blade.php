@extends('admin/layout')
@section("page_title","Banner")
@section("banner_select",'menu_select')
@section("container")
  <div class="d-flex justify-content-between mt-3 mb-3">
    <h2>All Brand</h2>
    <h4 class="text-success" id="alert_msg">{{session('msg')}}</h4>
    <a class="btn btn-info" href="{{url('banner/add')}}">Add Banner</a>  
  </div>
  <table class="table table-striped text-center">
    <thead class="bg-dark text-white">
      <tr>
        <th>ID</th>
        <th>Button Text</th>                
        <th>Button Link</th>                
        <th>Image</th>        
        <th>Action</th>        
      </tr>
    </thead>
    <tbody>
      @foreach($result as $list)
      <tr>
        <td>{{$list->id}}</td>
        <td>{{$list->btn_text}}</td>                      
        <td>{{$list->btn_link}}</td>                      
        <td>
         @if($list->image != 0)  
         <img src="{{asset('banner_img/'.$list['image'])}}" alt="image" width="100px" height="100px">
         @else
         No image
         @endif
       </td>              
       <td>
        <a href="{{url('banner/edit/'.$list->id)}}" class="btn btn-primary" ><i class="fas fa-edit"></i></a>
        <a href="{{url('banner/delete/'.$list->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
        @if($list->status == 1)
        <a href="{{url('banner/status/0/'.$list->id)}}" class="btn btn-success"><i class="fas fa-check-circle"></i></a>
        @elseif($list->status == 0)
        <a href="{{url('banner/status/1/'.$list->id)}}" class="btn btn-danger"><i class="fas fa-times-circle"></i></a>
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