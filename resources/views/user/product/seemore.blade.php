@php
	$count_of_product = 0 ;
@endphp
@foreach($products as $product)
	@php
		$count_of_product++;
	@endphp
	<li class="item item-animate{{($count_of_product == '1')? " first" : ""}}{{($count_of_product == '4')? " last" : ""}}">
		@php
			if($count_of_product == 4){
				$count_of_product = 0;
			}
		@endphp
		<div class="item-inner">
			<div class="item-img">
				<div class="item-img-info"><a href="{{route('product.productinfo',['id' => $product->id])}}" title="{{$product->name}}" class="product-image"><img class="class_for_height_width_150px" src="{{asset('images/main_images/' . $product->main_image)}}" alt="{{$product->name}}"></a>
					<div class="actions">
						<div class="quick-view-btn"><a href="{{route('product.productinfo',['id' => $product->id])}}" data-toggle="tooltip" data-placement="right" title="" data-original-title="Quick View"> <span>Quick View</span></a></div>
						{{--<div class="link-wishlist"><a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Wishlist"><span>Add to Wishlist</span></a></div>--}}
						{{--<div class="link-compare"><a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Compare"><span>Add to Compare</span></a></div>--}}
						{{--<div class="add_cart">--}}
						{{--<button class="button btn-cart" type="button" data-toggle="tooltip" data-placement="right" title="" data-original-title="Add to Cart"><span>Add to Cart</span></button>--}}
						{{--</div>--}}
					</div>
					<div class="rating">
						<div class="ratings">
							<div class="rating-box">
								<div class="rating" style="width:80%"></div>
							</div>
							{{--<p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>--}}
						</div>
					</div>
				</div>
			</div>
			<div class="item-info">
				<div class="info-inner">
					<div class="item-title"><a href="#" title="{{$product->name}}">{{$product->name}}</a> </div>
					<div class="item-content">
						<div class="item-price">
							<div class="price-box"><span class="regular-price"><span class="price"><span>&#8381;</span> {{$product->price}}</span> </span> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</li>
@endforeach
