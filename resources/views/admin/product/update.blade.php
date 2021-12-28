@extends('admin/layout')
@section("container")
@section("title","category")  
<form id="" action="{{url('product_update')}}" method ="post" class="" enctype="multipart/form-data">
  <div class="jumbotron">
    <h4 class="text-center">Update product</h4>
    <div class="d-flex justify-content-end mt-3">
    <a href="{{url('product/show')}}" class="btn btn-danger"><i class="fas fa-undo-alt fa-1x mr-2"></i>Back</a>
    </div> 
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
    <label>Warrenty</label>
    <input type="text" class="form-control" name="warrenty" value="{{$product['warrenty']}}">    
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
<!-- //product attr  -->
<h2 class="text-center mb-2">Product Attribute</h2>
<div id="attr_box">
  @foreach($product_attr as $value)
  <div class="jumbotron">  
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="">Sku</label>
          <input type="text" name="sku[]" class="form-control" value="{{$value->sku}}">
          <input type="hidden" name="attr_id[]" class="form-control" value="{{$value->id}}">
          <span class="text-danger">@error('sku') {{$message}} @enderror</span>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="">MRP</label>
          <input type="text" name="mrp[]" class="form-control" value="{{$value->mrp}}">
          <span class="text-danger">@error('mrp') {{$message}} @enderror</span>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="">Price</label>
          <input type="text" name="price[]" class="form-control" value="{{$value->price}}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="">Discount By %</label>
          <input type="text" name="discount_by[]" class="form-control" value="{{$value->discount_by}}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="">Size</label>
          <select name="size[]" id="" class="form-control">         
           <option value="0">Select Size</option>
           @foreach($size as $list)
           @if($value->size == $list->id)         
           <option selected value="{{$list->id}}">{{$list->size}}</option> 
         </option>
         @else
         <option value="{{$list->id}}">{{$list->size}}</option>
         @endif           
         @endforeach           
       </select>
     </div>
   </div>
   <div class="col-md-3">
    <div class="form-group">
      <label for="">Color</label>
      <select name="color[]" id="" class="form-control">         
       <option value="0">Select Color</option>
       @foreach($color as $list)
       @if($value->color == $list->id)         
       <option selected  value="{{$list->id}}">{{$list->color}}</option>> 
     </option>
     @else
     <option value="{{$list->id}}">{{$list->color}}</option>
     @endif

     @endforeach           
   </select>
 </div>
</div>
<div class="col-md-3">
  <div class="form-group">
    <label for="">Qty</label>
    <input type="text" name="qty[]" class="form-control" value="{{$value->qty}}">
  </div>
</div>
<div class="col-md-3">      
  <label for="">Action</label><br>
  <button type="button" class="btn btn-primary mr-3" onclick="add_more()"><i class="fas fa-plus mr-2"></i>Add More</button>
  <a href="{{url('product/attr_delete/'. $value->id . '/' . $value->product_id)}}">      
    <button type="button" class="btn btn-danger"><i class="fas fa-minus mr-2 "></i>Remove</button>  </a>
  

  </div>
</div>
<!-- //product attr  -->
</div>
@endforeach 
</div>      
<input type="submit" name="login" class="btn btn-primary btn-block mb-5" value="Submit"/>
</form>

<script>  
  function add_more(){    
    var html = '';
    html += '<div id="inputFormRow"><div class="jumbotron"><div class="row">';
    html +='<div class="col-md-3"><div class="form-group"><label for="">Sku</label><input type="text" name="sku[]" class="form-control"><input type="hidden" name="attr_id[]" class="form-control"></div></div>'; 
    html +='<div class="col-md-3"><div class="form-group"><label for="">MRP</label><input type="text" name="mrp[]" class="form-control"></div></div>';
    html +='<div class="col-md-3"><div class="form-group"><label for="">Price</label><input type="text" name="price[]" class="form-control"></div></div>';
   html+='<div class="col-md-3"><div class="form-group"><label for="">Discount By %</label><input type="text" name="discount_by[]" class="form-control"></div></div>';
    html+='<div class="col-md-3"><div class="form-group"><label for="">Size</label><select name="size[]" id="" class="form-control"><option value="0">Select Size</option>@foreach($size as $list)<option value="{{$list->id}}">{{$list->size}}</option>@endforeach</select></div></div>';
    html+='<div class="col-md-3"><div class="form-group"><label for="">Color</label><select name="color[]" id="" class="form-control"><option value="0">Select color</option>@foreach($color as $list)<option value="{{$list->id}}">{{$list->color}}</option>@endforeach</select></div></div>';
    html +='<div class="col-md-3"><div class="form-group"><label for="">Qty</label><input type="text" name="qty[]" class="form-control"></div></div>';
    html+='<div class="col-md-3"><label for="">Action</label><br><button type="button" class="btn btn-primary mr-3" onclick="add_more()"><i class="fas fa-plus mr-2"></i>Add More</button><button type="button" class="btn btn-danger" onclick="remove_attr()" id="removeRow"><i class="fas fa-minus mr-2"></i>Remove</button></div></div> ';
    html += '</div></div></div>'; 

    $('#attr_box').append(html);

  }
  $(document).on('click', '#removeRow', function () {
    $(this).closest('#inputFormRow').remove();
  });
</script>
@endsection