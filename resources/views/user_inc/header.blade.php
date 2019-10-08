  <!-- Header -->
  <header>
    <div class="header-container">
      <div class="header-top">
        <div class="container">
          <div class="row"> 
            <div class="col-xs-5 col-sm-6"> 
              <div class="top-cart-contain pull-right"> 
                <div id="ajaxconfig_info" style="display:none"><a href="#/"></a>
                  <input value="" type="hidden">
                  <input id="enable_module" value="1" type="hidden">
                  <input class="effect_to_cart" value="1" type="hidden">
                  <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- end header --> 
<!-- Navbar -->
<nav>
    <div class="container">
        <!-- Header Logo -->
        <div class="logo"><a title="Деловая Логистика" href="/"><img class='img_class_for_logo' alt="Деловая Логистика" src="{{asset('images/logo/logo.png')}}"></a></div>
        <!-- End Header Logo -->

        <div class="mm-toggle-wrap">
            <div class="mm-toggle"><i class="fa fa-reorder"></i><span class="mm-label">Menu</span> </div>
        </div>

        <ul class="nav hidden-xs menu-item menu-item-left">
            <li class="level0 parent drop-menu active">
                <a href="/">
                    <span>Главная</span>
                </a>
            </li>
        </ul>
        <ul class="nav hidden-xs menu-item menu-item-right">
            <li class="level0 parent drop-menu"><a href="#"><span>категории</span> </a>
              <ul class="level1" style="display: none;">
                @foreach(App\ProductCategory::all() as $category)
                    <li class="level1">
                        <a href="{{route('product.productfromcategory',['id' => $category->id])}}">
                            <span>{{$category->name}}</span>
                        </a>
                    </li>
                @endforeach
              </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- end nav -->