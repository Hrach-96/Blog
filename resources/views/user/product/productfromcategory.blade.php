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
    <div class='container'>
        <div class='row'>
            <div class="category-products">
                <ul class="products-grid">
                    @foreach($products as $product)
                        <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a href="{{route('product.productinfo',['id' => $product->GetProductInfo->id])}}" title="Retis lapen casen" class="product-image">
                                            @if($product->GetProductInfo->main_image)
                                                <img alt="{{$product->name}}" src="{{asset('images/main_images/' . $product->GetProductInfo->main_image)}}" alt="Retis lapen casen">
                                            @else
                                                <img alt="{{$product->name}}" src="{{asset('images/main_images/default.jpg')}}" alt="Retis lapen casen">
                                            @endif
                                        </a>
                                        <div class="rating">
                                          <div class="ratings">
                                            <div class="rating-box">
                                              <div class="rating" style="width:100%"></div>
                                            </div>
                                            <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                  <div class="info-inner">
                                    <div class="item-title"><a href="#" title="Retis lapen casen">{{$product->GetProductInfo->name}}</a> </div>
                                  </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="brand-logo wow bounceInUp animated">
        <div class="container">
            <div class="slider-items-products">
                <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col6">

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="{{asset('user/home/images/partner_1.png')}}" style='height:100px' alt="Image"></a> </div>
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