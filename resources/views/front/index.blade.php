@extends('front/layout')
@section('container')
<!-- Start slider -->
<section id="aa-slider">
  <div class="aa-slider-area">
    <div id="sequence" class="seq">
      <div class="seq-screen">
        <ul class="seq-canvas">
          <!-- single slide item -->
          @foreach($home_banner as $list)
          <li>
            <div class="seq-model">
              <img data-seq src="{{asset('banner_img/'.$list->image)}}" alt="Men slide img" />
            </div>
            <div class="seq-title">
             <!-- <span data-seq>Save Up to 75% Off</span>                
             <h2 data-seq>Men Collection</h2>                
             <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p> -->
             <a data-seq href="{{$list->btn_link}}" class="aa-shop-now-btn aa-secondary-btn">{{$list->btn_text}}</a>
           </div>
         </li>
         @endforeach
         <!-- single slide item -->            
       </ul>
     </div>
     <!-- slider navigation btn -->
     <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
      <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
      <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
    </fieldset>
  </div>
</div>
</section>
<!-- / slider -->
<!-- Products section -->
<section id="aa-product">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-product-area">
            <div class="aa-product-inner">
              <!-- start prduct navigation -->
              <ul class="nav nav-tabs aa-products-tab">
                @foreach($home_category as $list)
                <li class=""><a href="#cat{{$list->id}}" data-toggle="tab">{{$list->name}}</a></li>
                @endforeach
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                @php
                $loop_count = 1;
                @endphp
                @foreach($home_category as $list)
                @php
                $cat_class = "";
                if($loop_count == 1){
                $cat_class = "in active";
                $loop_count ++;
              }
              @endphp
              <div class="tab-pane fade {{$cat_class}} " id="cat{{$list->id}}">
                <ul class="aa-product-catg">
                  @if(isset($home_category_product[$list->id][0]))
                  @foreach($home_category_product[$list->id] as $product)
                  <li>
                    <figure>
                      <a class="aa-product-img" href="{{url('product_detailes/'.$product->slug)}}"><img src="{{asset('product_img/'.$product->image)}}" alt="image" height="300px"></a>
                      <a class="aa-add-card-btn"href="javascript:void(0)" onclick="home_add_to_cart('{{$product->id}}','{{$product_attr[$product->id][0]->size}}','{{$product_attr[$product->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="{{url('product_detailes/'.$product->slug)}}">{{$product->title}}</a></h4>
                        <span class="aa-product-price"> BDT {{$product_attr[$product->id][0]->price}} </span><span class="aa-product-price"><del>{{$product_attr[$product->id][0]->mrp}}</del></span>
                      </figcaption>
                    </figure> 
                    <!-- product badge -->
                    @if($product_attr[$product->id][0]->discount_by != null)
                    <span class="aa-badge aa-sale" href="#">-{{$product_attr[$product->id][0]->discount_by}}%</span>
                    @endif                           
                  </li> 
                  @endforeach  
                  @else                  
                    <h2 class="text-danger text-center">Product Not Available</h2>                        
                  @endif     
                </ul>
              </div>
              @endforeach               
              <!-- / electronic product category --> 
            </div>
            <!-- quick view modal -->                  
            <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">                      
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="row">
                      <!-- Modal view slider -->
                      <div class="col-md-6 col-sm-6 col-xs-12">                              
                        <div class="aa-product-view-slider">                                
                          <div class="simpleLens-gallery-container" id="demo-1">
                            <div class="simpleLens-container">
                              <div class="simpleLens-big-image-container">
                                <a class="simpleLens-lens-image" data-lens-image="{{asset('front_asset/img/view-slider/large/polo-shirt-1.png')}}">
                                  <img src="{{asset('front_asset/img/view-slider/medium/polo-shirt-1.png')}}" class="simpleLens-big-image">
                                </a>
                              </div>
                            </div>
                            <div class="simpleLens-thumbnails-container">
                              <a href="#" class="simpleLens-thumbnail-wrapper"
                              data-lens-image="{{asset('front_asset/img/view-slider/large/polo-shirt-1.png')}}"
                              data-big-image="{{asset('front_asset/img/view-slider/medium/polo-shirt-1.png')}}">
                              <img src="{{asset('front_asset/img/view-slider/thumbnail/polo-shirt-1.png')}}">
                            </a>                                    
                            <a href="#" class="simpleLens-thumbnail-wrapper"
                            data-lens-image="{{asset('front_asset/img/view-slider/large/polo-shirt-3.png')}}"
                            data-big-image="{{asset('front_asset/img/view-slider/medium/polo-shirt-3.png')}}">
                            <img src="{{asset('front_asset/img/view-slider/thumbnail/polo-shirt-3.png')}}">
                          </a>

                          <a href="#" class="simpleLens-thumbnail-wrapper"
                          data-lens-image="{{asset('front_asset/img/view-slider/large/polo-shirt-4.png')}}"
                          data-big-image="{{asset('front_asset/img/view-slider/medium/polo-shirt-4.png')}}">
                          <img src="{{asset('front_asset/img/view-slider/thumbnail/polo-shirt-4.png')}}">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>T-Shirt</h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">$34.99</span>
                      <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                    <h4>Size</h4>
                    <div class="aa-prod-view-size">
                      <a href="#">S</a>
                      <a href="#">M</a>
                      <a href="#">L</a>
                      <a href="#">XL</a>
                    </div>
                    <div class="aa-prod-quantity">
                      <form action="">
                        <select name="" id="">
                          <option value="0" selected="1">1</option>
                          <option value="1">2</option>
                          <option value="2">3</option>
                          <option value="3">4</option>
                          <option value="4">5</option>
                          <option value="5">6</option>
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Category: <a href="#">Polo T-Shirt</a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <a href="#" class="aa-add-to-cart-btn">View Details</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>                        
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- / quick view modal -->              
    </div>
  </div>
</div>
</div>
</div>
</div>
</section>
<!-- / Products section -->
<!-- banner section -->
<section id="aa-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">        
        <div class="row">
          <div class="aa-banner-area">
            <a href="#"><img src="{{asset('front_asset/img/fashion-banner.jpg')}}" alt="fashion banner img"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- popular section -->
<section id="aa-popular-category">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-popular-category-area">
            <!-- start prduct navigation -->
            <ul class="nav nav-tabs aa-products-tab">
              <li class="active"><a href="#tranding" data-toggle="tab">Tranding</a></li>
              <li><a href="#featured" data-toggle="tab">Featured</a></li>
              <li><a href="#discounted" data-toggle="tab">Discounted</a></li>                    
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <!-- Start tranding category -->
              <div class="tab-pane fade in active" id="tranding">
                <ul class="aa-product-catg aa-popular-slider">
                 @if(isset($home_tranding_product[$list->id][0]))
                 @foreach($home_tranding_product[$list->id] as $product)
                 <li>
                  <figure>
                    <a class="aa-product-img" href="{{url('product_detailes/'.$product->slug)}}"><img src="{{asset('product_img/'.$product->image)}}" alt="image" height="300px"></a>
                    <a class="aa-add-card-btn"href="{{url('product_detailes/'.$product->slug)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="{{url('product_detailes/'.$product->slug)}}">{{$product->title}}</a></h4>
                      <span class="aa-product-price"> BDT {{$tranding_product_attr[$product->id][0]->price}} </span><span class="aa-product-price"><del>{{$tranding_product_attr[$product->id][0]->mrp}}</del></span>
                    </figcaption>
                  </figure> 
                  <!-- product badge -->
                  @if($tranding_product_attr[$product->id][0]->discount_by != null)
                  <span class="aa-badge aa-sale" href="#">-{{$tranding_product_attr[$product->id][0]->discount_by}}%</span>   
                  @endif                           
                </li> 
                @endforeach  
                @else
                <li>
                  <h2 class="text-danger">No Data Found</h2>                          
                </li>
                @endif 
              </ul>
              <!-- <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a> -->
            </div>
            <!-- / tranding product category -->
            <!-- start featured product category -->
            <div class="tab-pane fade" id="featured">
             <ul class="aa-product-catg aa-featured-slider">
              @if(isset($home_feature_product[$list->id][0]))
              @foreach($home_feature_product[$list->id] as $product)
              <li>
                <figure>
                  <a class="aa-product-img" href="{{url('product_detailes/'.$product->slug)}}"><img src="{{asset('product_img/'.$product->image)}}" alt="image" height="300px"></a>
                  <a class="aa-add-card-btn"href="{{url('product_detailes/'.$product->slug)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="{{url('product_detailes/'.$product->slug)}}">{{$product->title}}</a></h4>
                    <span class="aa-product-price"> BDT {{$feature_product_attr[$product->id][0]->price}} </span><span class="aa-product-price"><del>{{$feature_product_attr[$product->id][0]->mrp}}</del></span>
                  </figcaption>
                </figure> 
                <!-- product badge -->
                @if($feature_product_attr[$product->id][0]->discount_by != null)
                <span class="aa-badge aa-sale" href="#">-{{$feature_product_attr[$product->id][0]->discount_by}}%</span>
                @endif                           
              </li> 
              @endforeach  
              @else
              <li>
                <h2 class="text-danger">No Data Found</h2>                          
              </li>
              @endif 
            </ul>            
          </div>
          <!-- / featured product category -->
          <!-- start latest product category -->
          <div class="tab-pane fade" id="discounted">
            <ul class="aa-product-catg aa-latest-slider">
             @if(isset($home_discount_product[$list->id][0]))
             @foreach($home_discount_product[$list->id] as $product)
             <li>
              <figure>
                <a class="aa-product-img" href="{{url('product_detailes/'.$product->slug)}}"><img src="{{asset('product_img/'.$product->image)}}" alt="image" height="300px"></a>
                <a class="aa-add-card-btn"href="{{url('product_detailes/'.$product->slug)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                <figcaption>
                  <h4 class="aa-product-title"><a href="{{url('product_detailes/'.$product->slug)}}">{{$product->title}}</a></h4>
                  <span class="aa-product-price"> BDT {{$discount_product_attr[$product->id][0]->price}} </span><span class="aa-product-price"><del>{{$discount_product_attr[$product->id][0]->mrp}}</del></span>
                </figcaption>
              </figure> 
              <!-- product badge -->
              @if($discount_product_attr[$product->id][0]->discount_by != null)
              <span class="aa-badge aa-sale" href="#">-{{$discount_product_attr[$product->id][0]->discount_by}}%</span>
              @endif                           
            </li> 
            @endforeach  
            @else
            <li>
              <h2 class="text-danger">No Data Found</h2>                          
            </li>
            @endif 
          </ul>          
        </div>
        <!-- / latest product category -->              
      </div>
    </div>
  </div> 
</div>
</div>
</div>
</section>


<!-- Client Brand -->
<section id="aa-client-brand">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-client-brand-area">
          <ul class="aa-client-brand-slider">
            @foreach($home_brand as $list)
            <li><a href="#"><img src="{{asset('brand_img/'.$list->image)}}" alt="image" height="100px" width="200px"></a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<input type="hidden" id="qty" name="qty" value = 1>
<form id="cart_form">
  @csrf
  <input type="hidden" id="product_id" name="product_id">
  <input type="hidden" id="pqty" name="pqty">
  <input type="hidden" id="size_id" name="size_id">
  <input type="hidden" id="color_id" name="color_id">
  </form>
@endsection