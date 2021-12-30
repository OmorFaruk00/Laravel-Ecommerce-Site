@extends('admin/layout')
@section("page_title","Product")
@section("container")
<form id="" action="{{url('product_add')}}" method ="post" class="" enctype="multipart/form-data">
  <div class="jumbotron">
    <h4 class="text-center">Add product</h4> 
    <div class="d-flex justify-content-end mt-3">
      <a href="{{url('product/show')}}" class="btn btn-danger"><i class="fas fa-undo-alt fa-1x mr-2"></i>Back</a>
    </div>
    @csrf
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label>Product Title</label>
          <input type="text" class="form-control" name="title">
          <span class="text-danger">@error('title') {{$message}} @enderror</span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>Slug</label>
          <input type="text" class="form-control" name="slug"></input>
          <span class="text-danger">@error('slug') {{$message}} @enderror</span>
        </div>
      </div>  
      <div class="col-md-4">
        <div class="form-group">
          <label>Category</label>          
          <select name="category" id="" class="form-control">
           <span class="text-danger">@error('category') {{$message}} @enderror</span>
           <option value="0">Select Category</option>
           @foreach($result as $list)
           <option value="{{$list->id}}">{{$list->name}}</option>
           @endforeach           
         </select>
       </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
        <label>Model</label>
        <input type="text" class="form-control" name="model"></input>
        <span class="text-danger">@error('model') {{$message}} @enderror</span>
      </div>  
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Brand</label>
        <select name="brand_id" id="" class="form-control">
         <span class="text-danger">@error('brand') {{$message}} @enderror</span>
         <option value="0">Select Brand</option>
         @foreach($brand as $list)
         <option value="{{$list->id}}">{{$list->name}}</option>
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
      <textarea type="text" class="form-control" name="short_desc"></textarea>
      <span class="text-danger">@error('short_desc') {{$message}} @enderror</span>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label>Long Desc</label>
      <textarea type="text" class="form-control" name="desc"></textarea>
      <span class="text-danger">@error('desc') {{$message}} @enderror</span>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label>Warrenty</label>
      <textarea type="text" class="form-control" name="warrenty"></textarea>      
    </div>
  </div>  
  <div class="col-md-4">
    <div class="form-group">
      <label >Lead Time</label>
      <input type="text" class="form-control" name="lead_time">
    </div>
  </div>  
  <div class="col-md-4">
    <div class="form-group">
      <label >Promo</label>
      <select name="promo" id="" class="form-control ">
        <option value="1">Yes</option>
        <option value="0" selected>No</option>
      </select>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label >Tranding</label>
      <select name="tranding" id="" class="form-control ">
        <option value="1">Yes</option>
        <option value="0" selected>No</option>
      </select>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group ">
      <label >Featured</label>
      <select name="feature" id="" class="form-control ">
        <option value="1">Yes</option>
        <option value="0" selected>No</option>
      </select>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group ">
      <label >Discounted</label>
      <select name="discount" id="" class="form-control">
        <option value="1">Yes</option>
        <option value="0" selected>No</option>
      </select>
    </div>
  </div>
</div>
</div>

<!-- //product attr  -->
<h2 class="text-center mb-2">Product Attribute</h2>
<div id="attr_box" class="">  
  <div class="jumbotron">   
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="">Sku</label>
          <input type="text" name="sku[]" class="form-control">          
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="">MRP</label>
          <input type="text" name="mrp[]" class="form-control">          
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="">Price</label>
          <input type="text" name="price[]" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
         <label for="">Discount By %</label>
         <input type="text" name="discount_by[]" class="form-control">
       </div>
     </div>
     <div class="col-md-3">
      <div class="form-group">
        <label for="">Size</label>
        <select name="size[]" id="" class="form-control">         
         <option value="0">Select Size</option>
         @foreach($size as $list)
         <option value="{{$list->id}}">{{$list->size}}</option>
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
       <option value="{{$list->id}}">{{$list->color}}</option>
       @endforeach           
     </select>
   </div>
 </div>
 <div class="col-md-3">
  <div class="form-group">      
    <label for="">Qty</label>
    <input type="text" name="qty[]" class="form-control">
  </div>
</div>
<div class="col-md-3">      
  <label for="">Action</label><br>
  <button type="button" class="btn btn-info" onclick="add_more()"><i class="fas fa-plus mr-2"></i>Add More</button>      
</div>
</div>
</div>
</div> 
<!-- //product attr image  -->
<h2 class="text-center mb-2">Product Image</h2>  
<div class="jumbotron">   
  <div class="row">
    <div class="col-lg-12">    
      <div id="inputFormRow">
        <div class="input-group mb-3">
          <input type="file" name="multi_img[]" class="form-control m-input" placeholder="Enter title" autocomplete="off" multiple>
          <div class="input-group-append">                
            <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
          </div>
        </div>
      </div>
      <div id="newRow"></div>
      <button id="addRow"  onclick ="add_more_image()"  type="button" class="btn btn-info">Add Image</button>
    </div>
  </div>
</div>
<!-- //product attr  image-->
<input type="submit" name="login" class="btn btn-primary btn-block mt-4 mb-5" value="Submit"/>
</form>

<script>
  // product Attribute
  function add_more(){    
    var html = '';
    html += '<div id="inputFormRow"><div class="jumbotron"><div class="row">';

    html +='<div class="col-md-3"><div class="form-group"><label for="">Sku</label><input type="text" name="sku[]" class="form-control"></div></div>';
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
  // product_attribute_image
  $("#addRow").click(function () {
    var html = '';
    html += '<div id="remove_image_input">';
    html += '<div class="input-group mb-3">';
    html += '<input type="file" name="multi_img[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
    html += '<div class="input-group-append">';
    html += '<button id="remove_image_buton" type="button" class="btn btn-danger">Remove</button>';
    html += '</div>';
    html += '</div>';

    $('#newRow').append(html);
  });
       // remove row
    $(document).on('click', '#remove_image_buton', function () {
       $(this).closest('#remove_image_input').remove();
    });


      </script>
      @endsection
