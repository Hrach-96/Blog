<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="assets/images/icon/logo.png" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Products</span></a>
                        <ul class="collapse">
                            <li {{(Route::current()->getName() == "admin.homepage") ? "class=active" : ""}} ><a href="{{route('admin.homepage')}}">All Products</a></li>
                            <li {{(Route::current()->getName() == "admin.AddProduct") ? "class=active" : ""}}  ><a href="{{route('admin.AddProduct')}}">Add Product</a></li>
                            <li {{(Route::current()->getName() == "admin.AddCategory") ? "class=active" : ""}}  ><a href="{{route('admin.AddCategory')}}">Add Category</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->