@extends('admin/layout')
@section("container")
@section("title","category")  
<form id="" action="{{url('product_update')}}" method ="post" class="jumbotron" enctype="multipart/form-data">
  <h4 class="text-center mb-4">Update product</h4> 
  @csrf   
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>Product Title</label>
        <input type="hidden" class="form-control"  name="id" value="{{$data['id']}}">
        <input type="text" class="form-control"  name="title" value="{{$data['title']}}">
        <span class="text-danger">@error('title') {{$message}} @enderror</span>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Slug</label>
        <input type="text" class="form-control" name="slug" value="{{$data['slug']}}"></input>
        <span class="text-danger">@error('slug') {{$message}} @enderror</span>
      </div>
    </div> 
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>Category</label>
        <select name="category" id="" class="form-control" value="{{$data['category']}}">
         <span class="text-danger">@error('category') {{$message}} @enderror</span>
         <option value="">Select Category</option>
         @foreach($category as $list)
         @if($data['category_id'] == $list->id)
         <option selected value="{{$list->id}}">{{$list->name}}</option> 
       </option>
       @else
       <option value="{{$list->id}}">{{$list->name}}</option>
       @endif
       @endforeach           
     </select>          
   </div>
 </div>
 <div class="col-md-6">
  <div class="form-group">
    <label>Model</label>
    <input type="text" class="form-control" name="model" value="{{$data['model']}}"></input>
    <span class="text-danger">@error('model') {{$message}} @enderror</span>
  </div>
</div>    
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label>Brand</label>
      <input type="text" class="form-control" name="brand" value="{{$data['brand']}}"></input>
      <span class="text-danger">@error('brand') {{$message}} @enderror</span>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Product Image</label>
      <input type="file" class="form-control" name="image"></input>
      <span class="text-danger">@error('image') {{$message}} @enderror</span>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label>Short Desc</label>
      <textarea type="text" class="form-control" name="short_desc">{{$data['short_desc']}}</textarea>
      <span class="text-danger">@error('short_desc') {{$message}} @enderror</span>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Long Desc</label>
      <textarea type="text" class="form-control" name="desc"> {{$data['desc']}}</textarea>
      <span class="text-danger">@error('desc') {{$message}} @enderror</span>
    </div>
  </div> 
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label>Qty</label>
      <input type="text" class="form-control" name="qty" value="{{$data['qty']}}">
      <span class="text-danger">@error('qty') {{$message}} @enderror</span>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Price</label>
      <input type="text" class="form-control" name="price" value="{{$data['price']}}"></input>
      <span class="text-danger">@error('price') {{$message}} @enderror</span>
    </div>
  </div>     
</div>       
<input type="submit" name="login" class="btn btn-primary btn-block" value="Submit"/>
</form>


@endsection