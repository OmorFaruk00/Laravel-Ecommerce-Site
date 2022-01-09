 @extends('front/layout')
 @section('container')
 <!-- Cart view section --> 

 @if(isset($result[0])) 
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">            
               <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Sub Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $total_price = 0;  @endphp                 
                  @foreach($result as $product)
                    <tr id="cart_box_{{$product->attr_id}}">
                      <td><a class="remove" href="javascript:void(0)" onclick="cart_item_remove('{{$product->pid}}','{{$product->attr_id}}', '{{$product->color}}', '{{$product->size}}')"><fa class="fa fa-close"></fa></a></td>
                      <td><a href="{{url('product_detailes/'.$product->slug)}}"><img src="{{asset('product_img/'.$product->image)}}"></a></td>
                      <td><a class="aa-cart-title" href="{{url('product_detailes/'.$product->slug)}}">{{$product->title}}</a><br>
                        @if($product->size != '')
                        SIZE: {{$product->size}}
                        @endif
                        <br>
                        @if($product->color != '')
                        COLOR: {{$product->color}}
                        @endif
                      </td>
                      <td>TK {{$product->price}}</td>
                      <td><input class="aa-cart-quantity" id="qty_{{$product->attr_id}}" type="number" value='{{$product->qty}}' onchange="qty_update('{{$product->pid}}','{{$product->attr_id}}', '{{$product->color}}', '{{$product->size}}','{{$product->price}}')"></td>
                      <td id="total_price_{{$product->pid}}">TK {{$product->qty*$product->price}}</td>                        
                    </tr>
                  @php $total_price = $total_price+($product->qty*$product->price); @endphp                  
                  @endforeach
                  <tr>
                    <td></td><td></td><td></td><td></td>                        
                    <td><h4 class="font-weight-bold">Total</h4></td>
                    <td>TK {{$total_price}}</td>
                  </tr>                     
                  </tbody>
                </table>
                <a href="#" class="aa-cart-view-btn">Proced to Checkout</a>
              </div>                
            </form>
            <!-- Cart Total view -->             
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 @else
 <div class="text-success h2">No Cart Added</div> 
 @endif
@endsection