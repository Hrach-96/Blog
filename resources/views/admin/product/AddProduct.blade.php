@extends('admin_inc.template')
@section('content')
    <div class="main-content-inner">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-info text-center">Add Product</h2>
                    <div class="col-md-6 offset-3">
                        <form action="{{route('admin.NewProduct')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                @if ($errors->has('name'))
                                    <p role="alert" class='text-danger'><strong>{{ $errors->first('name') }}</strong></p>
                                @endif
                                <label for="name" class="col-form-label">Product Name</label>
                                <input class="form-control" value="{{old('name')}}" type="text" name="name" id="name" placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                @if ($errors->has('description'))
                                    <p role="alert" class='text-danger'><strong>{{ $errors->first('description') }}</strong></p>
                                @endif
                                <label for="description" class="col-form-label">Product Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Product Description">{{old('description')}}</textarea>
                            </div>
                            <div class="form-group">
                                @if ($errors->has('main_image'))
                                    <p role="alert" class='text-danger'><strong>{{ $errors->first('main_image') }}</strong></p>
                                @endif
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Main Image</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="main_image" class="custom-file-input" id="main_image">
                                        <label class="custom-file-label" for="main_image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Images For Gallery</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" multiple class="custom-file-input" name="images_for_gallery[]" id="images_for_gallery">
                                        <label class="custom-file-label" for="images_for_gallery">Choose files</label>
                                    </div>
                                </div>
                            </div>
                            <div class='form-group'>
                                <div class="card">
                                    <div class="card-body">
                                        @if ($errors->has('product_categorys'))
                                            <p role="alert" class='text-danger'><strong>{{ $errors->first('product_categorys') }}</strong></p>
                                        @endif
                                        @foreach(App\ProductCategory::all() as $value)
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" name='product_categorys[]' value="{{$value->id}}" class="custom-control-input" id="checkbox_{{$value->id}}">
                                                <label class="custom-control-label" for="checkbox_{{$value->id}}">{{$value->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bulk" class="col-form-label">Product Bulk ( Объем )</label>
                                <input class="form-control" value="{{old('bulk')}}" type="text" name="bulk" id="bulk" placeholder="Product bulk">
                            </div>
                            <div class="form-group">
                                <label for="measurement" class="col-form-label">Product Unit of measurement ( Единица  измерения )</label>
                                <input class="form-control" value="{{old('measurement')}}" type="text" name="measurement" id="measurement" placeholder="Product measurement">
                            </div>
                            <div class="form-group">
                                <label for="quantity_1_pallet" class="col-form-label">Quantity on 1 pallet ( Количеств на 1 поддоне )</label>
                                <input class="form-control" value="{{old('quantity_1_pallet')}}" type="text" name="quantity_1_pallet" id="quantity_1_pallet" placeholder="Product Quantity">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success mb-3">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection