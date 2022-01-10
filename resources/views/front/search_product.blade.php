@extends('front/layout')
@section('container') 


<!-- product category -->
<section id="aa-product-category">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-8 ">
				<div class="aa-product-catg-content">
					<div class="aa-product-catg-head">

						<div class="aa-product-catg-head-right">
							<a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
							<a id="list-catg" href="#"><span class="fa fa-list"></span></a>
						</div>
					</div>
					<div class="aa-product-catg-body">
						<ul class="aa-product-catg">
							@if(isset($product[0]))
							@foreach($product as $product)							
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
							<li>
								<h2 class="text-danger">No Data Found</h2>                          
							</li>
							@endif                                     
						</ul>              
					</div>            
				</div>
			</div>        
		</div>       
	</div>
</div>
</section>
<!-- / product category -->












@endsection