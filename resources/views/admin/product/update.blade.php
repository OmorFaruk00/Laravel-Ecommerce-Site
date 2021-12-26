@extends('admin/layout')
@section("container")
@section("title","category")  
<form id="" action="{{url('product_update')}}" method ="post" class="" enctype="multipart/form-data">
  <div class="jumbotron">
  <h4 class="text-center mb-4">Update product</h4> 
  @csrf   
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label>Product Title</label>
        <input type="hidden" class="form-control"  name="id" value="{{$product['id']}}">
        <input type="text" class="form-control"  name="title" value="{{$product['title']}}">
        <span class="text-danger">@error('title') {{$message}} @enderror</span>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Slug</label>
        <input type="text" class="form-control" name="slug" value="{{$product['slug']}}"></input>
        <span class="text-danger">@error('slug') {{$message}} @enderror</span>
      </div>
    </div> 
  
    <div class="col-md-4">
      <div class="form-group">
        <label>Category</label>
        <select name="category" id="" class="form-control" value="{{$product['category']}}">
         <span class="text-danger">@error('category') {{$message}} @enderror</span>
         <option value="">Select Category</option>
         @foreach($category as $list)
         @if($product['category_id'] == $list->id)
         <option selected value="{{$list->id}}">{{$list->name}}</option> 
       </option>
       @else
       <option value="{{$list->id}}">{{$list->name}}</option>
       @endif
       @endforeach           
     </select>          
   </div>
 </div>
 <div class="col-md-4">
  <div class="form-group">
    <label>Model</label>
    <input type="text" class="form-control" name="model" value="{{$product['model']}}"></input>
    <span class="text-danger">@error('model') {{$message}} @enderror</span>
  </div>
</div>
  <div class="col-md-4">
    <div class="form-group">
      <label>Brand</label>
     <select name="brand_id" id="" class="form-control" value="{{$product['category']}}">         
         <option value="">Select Brand</option>
         @foreach($brand as $list)
         @if($product->brand_id == $list->id)         
         <option selected value="{{$list->id}}">{{$list->name}}</option> 
       </option>
       @else
       <option value="{{$list->id}}">{{$list->name}}</option>
       @endif
       @endforeach           
     </select>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label>Product Image</label>
      <input type="file" class="form-control" name="image"></input>
      <span class="text-danger">@error('image') {{$message}} @enderror</span>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label>Short Desc</label>
      <textarea type="text" class="form-control" name="short_desc">{{$product['short_desc']}}</textarea>
      <span class="text-danger">@error('short_desc') {{$message}} @enderror</span>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label>Long Desc</label>
      <textarea type="text" class="form-control" name="desc"> {{$product['desc']}}</textarea>
      <span class="text-danger">@error('desc') {{$message}} @enderror</span>
    </div>
  </div> 

  <div class="col-md-4">
    <div class="form-group">
      <label>Qty</label>
      <input type="text" class="form-control" name="qty" value="{{$product['qty']}}">
      <span class="text-danger">@error('qty') {{$message}} @enderror</span>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label>Price</label>
      <input type="text" class="form-control" name="price" value="{{$product['price']}}"></input>
      <span class="text-danger">@error('price') {{$message}} @enderror</span>
    </div>
  </div> 
   <div class="col-md-4">
    <div class="form-group">
      <label >Lead Time</label>
      <input type="text" class="form-control" name="lead_time" value="{{$product['lead_time']}}">
    </div>
  </div>  
  <div class="col-md-4">
    <div class="form-group">
      <label >Promo</label>
      <select name="promo"  class="form-control ">
      @if($product->promo == 1)      
      <option value="1" selected>Yes</option>
      <option value="0">No</option>
      @elseif($product->promo == 0)      
      <option value="1" >Yes</option>
      <option value="0" selected>No</option> 
      @endif
      </select>    
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label >Tranding</label>
      <select name="tranding" class="form-control ">
        @if($product->tranding == 0)
        <option value="1">Yes</option>
        <option value="0" selected>No</option>
        @elseif($product->tranding == 1)
        <option value="1" selected>Yes</option>
        <option value="0" >No</option>
        @endif
      </select>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group ">
      <label >Featured</label>
      <select name="feature" id="" class="form-control ">
        @if($product->feature == 0)
        <option value="1">Yes</option>
        <option value="0" selected>No</option>
        @elseif($product->feature == 1)
        <option value="1" selected>Yes</option>
        <option value="0" >No</option>
        @endif
      </select>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group ">
      <label >Discounted</label>
      <select name="discount" id="" class="form-control">
        @if($product->discount == 0)
        <option value="1">Yes</option>
        <option value="0" selected>No</option>
        @elseif($product->discount == 1)
        <option value="1" selected>Yes</option>
        <option value="0" >No</option>
        @endif
      </select>
    </div>
  </div>    
</div>
</div>       
<input type="submit" name="login" class="btn btn-primary btn-block" value="Submit"/>
</form>


@endsection