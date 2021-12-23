@extends('admin/layout')
@section("container")
@section("title","Product")

  <form id="" action="{{url('product_add')}}" method ="post" class="jumbotron" enctype="multipart/form-data">
    <h4 class="text-center mb-4">Add product</h4> 
    @csrf
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Product Title</label>
          <input type="text" class="form-control" name="title">
          <span class="text-danger">@error('title') {{$message}} @enderror</span>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Slug</label>
          <input type="text" class="form-control" name="slug"></input>
          <span class="text-danger">@error('slug') {{$message}} @enderror</span>
        </div>
      </div> 
    </div>  
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Category</label>
          
          <select name="category" id="" class="form-control">
           <span class="text-danger">@error('category') {{$message}} @enderror</span>
           <option value="">Select Category</option>
           @foreach($result as $list)
           <option value="{{$list->id}}">{{$list->name}}</option>
           @endforeach
           
         </select>
       </div>
     </div>
     <div class="col-md-6">
      <div class="form-group">
        <label>Model</label>
        <input type="text" class="form-control" name="model"></input>
        <span class="text-danger">@error('model') {{$message}} @enderror</span>
      </div>
    </div> 
    
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>Brand</label>
        <input type="text" class="form-control" name="brand"></input>
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
        <textarea type="text" class="form-control" name="short_desc"></textarea>
        <span class="text-danger">@error('short_desc') {{$message}} @enderror</span>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Long Desc</label>
        <textarea type="text" class="form-control" name="desc"></textarea>
        <span class="text-danger">@error('desc') {{$message}} @enderror</span>
      </div>
    </div> 
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>Qty</label>
        <input type="text" class="form-control" name="qty">
        <span class="text-danger">@error('qty') {{$message}} @enderror</span>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Price</label>
        <input type="text" class="form-control" name="price"></input>
        <span class="text-danger">@error('price') {{$message}} @enderror</span>
      </div>
    </div>    
  </div>        
  <input type="submit" name="login" class="btn btn-primary btn-block mt-4" value="Submit"/>
</form>
@endsection