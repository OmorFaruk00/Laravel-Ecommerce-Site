@extends('front/layout')
@section('container')
<!-- product category -->
<section id="aa-product-details">
  <div class="container">
    <div class="row">     
      <div class="col-md-12">
        <div class="aa-product-details-area">
          <div class="aa-product-details-content">
            <div class="row">
              <!-- Modal view slider -->
              <div class="col-md-5 col-sm-5 col-xs-12">                              
                <div class="aa-product-view-slider">                                
                  <div id="demo-1" class="simpleLens-gallery-container">
                    <div class="simpleLens-container">
                      <div class="simpleLens-big-image-container"><a data-lens-image="{{asset('product_img/'.$product[0]->image)}}" class="simpleLens-lens-image"><img src="{{asset('product_img/'.$product[0]->image)}}" class="simpleLens-big-image"></a></div>
                    </div>
                    <div class="simpleLens-thumbnails-container">
                      @if(isset($product_attr_img[$product[0]->id][0]->id)) 
                      <a data-big-image="{{asset('product_img/'.$product[0]->image)}}" data-lens-image="{{asset('product_img/'.$product[0]->image)}}" class="simpleLens-thumbnail-wrapper" href="#">
                        <img src="{{asset('product_img/'.$product[0]->image)}}" height="70px" width="80px">
                      </a> 
                      @foreach($product_attr_img[$product[0]->id] as $list)
                      <a data-big-image="{{asset('product_attr_img/'.$list->multi_image)}}" data-lens-image="{{asset('product_attr_img/'.$list->multi_image)}}" class="simpleLens-thumbnail-wrapper" href="#">
                        <img src="{{asset('product_attr_img/'.$list->multi_image)}}" height="70px" width="80px">
                      </a> 
                      @endforeach
                      @endif                          
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal view content -->
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="aa-product-view-content">
                  <h3>{{$product[0]->title}}</h3>
                  <div class="aa-price-block">BDT{{$product_attr[$product[0]->id][0]->price}}</span>&nbsp &nbsp
                    <del><span class="aa-product-view-price">BDT{{$product_attr[$product[0]->id][0]->mrp}}</span></del>
                    <p class="aa-product-avilability">Avilability: <span>In stock</span></p>                      
                    <p class="text-danger">{{$product[0]->lead_time}}</p>
                  </div>
                  <p>{{$product[0]->short_desc}}</p>
                  @if($product_attr[$product[0]->id][0]->size != '')
                  <h4>Size</h4>
                  @php
                  $arrsize = []; 
                  foreach($product_attr[$product[0]->id] as $attr){
                  $arrsize[] = $attr->size;
                }
                $arrsize = array_unique($arrsize);               
                @endphp
                <div class="aa-prod-view-size">                     
                  @foreach($arrsize  as $size)                     
                  <a href="javascript:void(0)" onclick="showcolor('{{$size}}')" id="size_{{$size}}" class="size_link">{{$size}}</a>
                  @endforeach                     
                </div>
                @endif
                @if($product_attr[$product[0]->id][0]->color != '')
                <h4>Color</h4>
                <div class="aa-color-tag">
                  @foreach($product_attr[$product[0]->id] as $attr)                      
                  <a href="javascript:void(0)" class="aa-color-{{$attr->color}} product_color size_{{$attr->size}}" onclick="color_change('{{$attr->color}}')"></a>                      
                  @endforeach                                          
                </div>
                @endif
                <div class="aa-prod-quantity">
                  <form action="">
                    <select id="qty" name="qty">
                      @for($i=1; $i<11; $i++)
                      <option value="{{$i}}">{{$i}}</option>
                      @endfor                      
                    </select>
                  </form>
                  @if($product[0]->model != '')
                  <p class="aa-prod-category">
                    Model: <a href="#">{{$product[0]->model}}</a>
                  </p>
                  @endif
                </div>
                <div class="aa-prod-view-bottom">
                  <a class="aa-add-to-cart-btn" href="javascript:void(0)" onclick="add_to_cart('{{$product[0]->id}}','{{$product_attr[$product[0]->id][0]->size}}','{{$product_attr[$product[0]->id][0]->color}}')">Add To Cart</a>
                  <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                  <a class="aa-add-to-cart-btn" href="#">Compare</a>
                </div>
                <div id="cart_msg" class="text-danger mt-3"></div>                 
              </div>
            </div>
          </div>
        </div>
        <div class="aa-product-details-bottom">
          <ul class="nav nav-tabs" id="myTab2">
            <li><a href="#description" data-toggle="tab">Description</a></li>
            <li><a href="#Purchase" data-toggle="tab">Purchase & Delivery</a></li>
            @if($product[0]->warrenty != '')
            <li><a href="#warrenty" data-toggle="tab">Warrenty</a></li>
            @endif
            <li><a href="#review" data-toggle="tab">Reviews</a></li>                
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane fade in active" id="description">
              {{$product[0]->desc}}
            </div>
            <div class="tab-pane fade" id="Purchase">
              <h4 class=""><strong>Purchase Step</strong></h4>
              <ul style="list-style-type: square">
                <li>Select number of product you want to buy</li>
                <li>Click on Buy Now button.</li>
                <li>If you are a new user, please click on Sign Up. Then sign up by providing the required information.</li>
                <li>Use your user name & password if you are a registered customer.</li>
                <li>Choose your payment (Check out) method.</li>
                <li>Follow required instruction based on payment method.</li>
                <li>Full advance Payment is required for the delivery outside Dhaka.·</li>
                <li>Order confirmation and delivery completion are subject to product availability. For Further details, click here.</li>
                <li>Once sold, the product cannot be returned & replaced until it has a warranty.</li>
                <li>Please check your product at the time of delivery.</li>
                <li>Disclaimer: Product color may slightly vary due to photography, lighting sources or your monitor settings.</li>
                <li>The product will deliver based on product availability. For further details Click here.</li>                  
              </ul>
              <h4 class="mt-5"><strong>How to Pay</strong></h4>
              <ul style="list-style-type: square">
               <li>Cash on Delivery</li>
               <li>Mobile Payment: bKash, Nagad, Rocket</li>
               <li>Card - Visa, Master, Amex, Nexus, Online Banking</li>
               <li>EMI</li>
               <li>Nexus Pay</li>
             </ul>
             <p>You can make your purchases on dailyShop and get delivery from anywhere in the world. Delivery charge varies according to customers' country. In case of paid order, PriyoShop.com cannot be held liable if customer does not receive it within 2 months.</p>                  
           </div>
           <div class="tab-pane fade" id="warrenty">
            {{$product[0]->warrenty}}
          </div>
          <div class="tab-pane fade " id="review">
           <div class="aa-product-review-area">
             <h4>2 Reviews for T-Shirt</h4> 
             <ul class="aa-review-nav">
               <li>
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                    <div class="aa-product-rating">
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star-o"></span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                    <div class="aa-product-rating">
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star-o"></span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </div>
              </li>
            </ul>
            <h4>Add a review</h4>
            <div class="aa-your-rating">
             <p>Your Rating</p>
             <a href="#"><span class="fa fa-star-o"></span></a>
             <a href="#"><span class="fa fa-star-o"></span></a>
             <a href="#"><span class="fa fa-star-o"></span></a>
             <a href="#"><span class="fa fa-star-o"></span></a>
             <a href="#"><span class="fa fa-star-o"></span></a>
           </div>
           <!-- review form -->
           <form action="" class="aa-review-form">
            <div class="form-group">
              <label for="message">Your Review</label>
              <textarea class="form-control" rows="3" id="message"></textarea>
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Name">
            </div>  
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
            </div>

            <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
          </form>
        </div>
      </div>            
    </div>
  </div>
  <!-- Related product -->
  <div class="aa-product-related-item">
    <h3>Related Products</h3>
    <ul class="aa-product-catg aa-related-item-slider">
      <!-- start single product item -->
      @if(isset($related_product[0]))
      @foreach($related_product as $product)
      <li>
        <figure>
          <a class="aa-product-img" href="{{url('product_detailes/'.$product->slug)}}"><img src="{{asset('product_img/'.$product->image)}}" alt="image" height="300px"></a>
          <a class="aa-add-card-btn"href="{{url('product_detailes/'.$product->slug)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
          <figcaption>
            <h4 class="aa-product-title"><a href="{{url('product_detailes/'.$product->slug)}}">{{$product->title}}</a></h4>
            <span class="aa-product-price"> BDT {{$related_product_attr[$product->id][0]->price}} </span><span class="aa-product-price"><del>{{$related_product_attr[$product->id][0]->mrp}}</del></span>
          </figcaption>
        </figure> 
        <!-- product badge -->
        @if($related_product_attr[$product->id][0]->discount_by != null)
        <span class="aa-badge aa-sale" href="#">-{{$related_product_attr[$product->id][0]->discount_by}}%</span>
        @endif                           
      </li> 
      @endforeach  
      @else             
      <h2 class="text-danger text-center">No Related Product</h2>                        
      @endif 
      <!-- start single product item -->                                                                                  
    </ul>           
  </section>
  <!-- / product category -->
  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>  
  @endsection