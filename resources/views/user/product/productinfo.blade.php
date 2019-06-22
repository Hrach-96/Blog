@extends('user_inc.template')
@section('content')
<style>
    nav{
        background: url({{asset('user/home/images/slide-img11.jpg')}}) repeat top left;
        height: 170px;
        background-size:cover;
    }
</style>
<div id="page">
    <!-- Main Container -->
    <section class="main-container col1-layout wow bounceInUp animated">
        <div class="main container">
            <div class="col-main">
                <div class="row">
                    <div class="product-view">
                        <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div>
                        <div class="product-essential">
                            <form action="#" method="post" id="product_addtocart_form">
                                <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                                <div class="product-img-box col-sm-6 col-xs-12">
                                    <div class="new-label new-top-left"> New </div>
                                    <div class="product-image">
                                        <div class="large-image"> <a href="{{asset('images/main_images/' . $productInfo->main_image)}}" class="cloud-zoom" id="zoom1"> <img src="{{asset('images/main_images/' . $productInfo->main_image)}}" alt="{{$productInfo->name}}"> </a> </div>
                                        <div class="flexslider flexslider-thumb">
                                            <ul class="previews-list slides">
                                                @foreach(App\ProductImageGallery::where('product_id' , $productInfo->id)->get() as $image)
                                                    <li>
                                                        <a href='{{asset('images/product_gallery/' . $image->image)}}' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '{{asset('images/product_gallery/' . $image->image)}}' "><img src="{{asset('images/product_gallery/' . $image->image)}}" alt = "T{{$productInfo->name}}"/></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end: more-images -->
                                </div>
                                <div class="product-shop col-sm-8 col-xs-12">
                                    <div class="product-name">
                                        <h1>{{$productInfo->name}}</h1>
                                    </div>
                                    {{--<div class="ratings">--}}
                                        {{--<div class="rating-box">--}}
                                            {{--<div style="width:60%" class="rating"></div>--}}
                                        {{--</div>--}}
                                        {{--<p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p>--}}
                                    {{--</div>--}}
                                    <div class="price-block">
                                        <div class="price-box">
                                            <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> <span>&#8381;</span> {{$productInfo->price}}</span> </p>
                                            {{--<p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $315.99 </span> </p>--}}
                                        </div>
                                        <p class="availability in-stock pull-right"><span>In Stock</span></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="product-collateral col-lg-12 col-sm-12 col-xs-12 bounceInUp animated">
                            <div class="add_info">
                                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                    <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Product Description </a> </li>
                                </ul>
                                <div id="productTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="product_tabs_description">
                                        <div class="std">
                                            <p>{{$productInfo->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Container End -->

    <!-- Related Products Slider -->
    <section class="related-pro wow bounceInUp animated">
        <div class="container">
            <div class="slider-items-products">
                <div class="new_title center">
                    <h2>Other Products</h2>
                </div>
                <div id="related-products-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid">
                        @foreach( $randomprod = App\Product::all()->random(8) as $product)
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info"><a href="{{route('product.productinfo',['id' => $product->id])}}" title="{{$product->name}}" class="product-image"><img class="class_for_height_width_155px" src="{{asset('images/main_images/' . $product->main_image)}}" alt="{{$product->name}}"></a>

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
                                                    <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a href="#" title="{{$product->name}}">{{$product->name}}</a> </div>
                                            <div class="item-content">
                                                <div class="item-price">
                                                    <div class="price-box"><span class="regular-price"><span class="price"><span>&#8381;</span>{{$product->price}}</span> </span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Products Slider End -->
    <!-- Brand logo starts  -->
    <div class="brand-logo wow bounceInUp animated">
        <div class="container">
            <div class="slider-items-products">
                <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col6">

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="{{asset('user/home/images/b-logo3.png')}}" alt="Image"></a> </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="{{asset('user/home/images/b-logo2.png')}}" alt="Image"></a> </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="{{asset('user/home/images/b-logo1.png')}}" alt="Image"></a> </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="{{asset('user/home/images/b-logo4.png')}}" alt="Image"></a> </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="{{asset('user/home/images/b-logo5.png')}}" alt="Image"></a> </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="{{asset('user/home/images/b-logo6.png')}}" alt="Image"></a> </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="{{asset('user/home/images/b-logo1.png')}}" alt="Image"></a> </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="{{asset('user/home/images/b-logo4.png')}}" alt="Image"></a> </div>
                        <!-- End Item -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand logo ends  -->

@endsection