@extends('admin_inc.template')
@section('content')
	<div class="main-content-inner">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<h2 class="text-info text-center">Edit Product</h2>
					<div class="col-md-6 offset-3">
						<form action="{{route('admin.UpdateProduct')}}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="hidden" value="{{ Crypt::encrypt($product->id) }}" name="id">
							<div class="form-group">
								<label for="name" class="col-form-label">ID</label>
								<input class="form-control" value="{{ $product->id }}" type="number" disabled>
							</div>
							<div class="form-group">
								@if ($errors->has('name'))
									<p role="alert" class='text-danger'><strong>{{ $errors->first('name') }}</strong></p>
								@endif
								<label for="name" class="col-form-label">Product Name</label>
								<input class="form-control" value="{{ old('name')?old('name'):$product->name }}" type="text" name="name" id="name" placeholder="Product Name">
							</div>
							<div class="form-group">
								@if ($errors->has('description'))
									<p role="alert" class='text-danger'><strong>{{ $errors->first('description') }}</strong></p>
								@endif
								<label for="description" class="col-form-label">Product Description</label>
								<textarea class="form-control" name="description" id="description" placeholder="Product Description">{{old('description')?old('description'):$product->description}}</textarea>
							</div>
							<div class="form-group">
								@if ($errors->has('main_image'))
									<p role="alert" class='text-danger'><strong>{{ $errors->first('main_image') }}</strong></p>
								@endif
								<div class="input-group mb-3">
									@if(empty($product->main_image))
									<div class="input-group-prepend">
										<span class="input-group-text">Main Image</span>
									</div>
									<div class="custom-file">
										<input type="file" name="main_image" class="custom-file-input" id="main_image">
										<label class="custom-file-label" for="main_image">Choose file</label>
									</div>
									@else
										<label for="main_image" class="col-form-label">Main Image</label>
										<img src="{{ asset("/images/main_images/".$product->main_image) }}" class="main_images">
										<input type="file" name="main_image" class="custom-file-input hidden" id="main_image">
									@endif
								</div>
							</div>
							@if(empty($product->GalleryImages[0]))
							<div class="form-group">
								@if ($errors->has('main_image'))
									<p role="alert" class='text-danger'><strong>{{ $errors->first('main_image') }}</strong></p>
								@endif
								<div class="input-group mb-3">
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
							</div>
							@endif
							<div class='form-group'>
                                <div class="card">
                                    <div class="card-body">
                                        @if ($errors->has('product_categorys'))
                                            <p role="alert" class='text-danger'><strong>{{ $errors->first('product_categorys') }}</strong></p>
                                        @endif
                                        @foreach(App\ProductCategory::all() as $value)
                                        	@if(App\ProductFromCategory::where('product_id',$product->id)->where('category_id',$value->id)->first())
                                        		<div class="custom-control custom-checkbox custom-control-inline">
	                                                <input type="checkbox" checked name='product_categorys[]' value="{{$value->id}}" class="custom-control-input" id="checkbox_{{$value->id}}">
	                                                <label class="custom-control-label" for="checkbox_{{$value->id}}">{{$value->name}}</label>
	                                            </div>
                                        	@else
                                        		<div class="custom-control custom-checkbox custom-control-inline">
	                                                <input type="checkbox" name='product_categorys[]' value="{{$value->id}}" class="custom-control-input" id="checkbox_{{$value->id}}">
	                                                <label class="custom-control-label" for="checkbox_{{$value->id}}">{{$value->name}}</label>
	                                            </div>
                                        	@endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bulk" class="col-form-label">Product Bulk ( Объем )</label>
                                <input class="form-control" type="text" name="bulk" id="bulk" value="{{$product->bulk}}" placeholder="Product bulk">
                            </div>
                            <div class="form-group">
                                <label for="measurement" class="col-form-label">Product Unit of measurement ( Единица  измерения )</label>
                                <input class="form-control" type="text" name="measurement" value="{{$product->measurement}}" id="measurement" placeholder="Product measurement">
                            </div>
                            <div class="form-group">
                                <label for="quantity_1_pallet" class="col-form-label">Quantity on 1 pallet ( Количеств на 1 поддоне )</label>
                                <input class="form-control" type="text" name="quantity_1_pallet" value="{{$product->quantity_1_pallet}}" id="quantity_1_pallet" placeholder="Product Quantity">
                            </div>
							<div class="form-group">
								<button type="submit" class="btn btn-success mb-3">Update</button>
							</div>
						</form>
					</div>
					@if(!empty($product->GalleryImages[0]))
					<div class="col-md-9 offset-1">
						<h2 class="text-info">Gallery Image</h2>
						<div class="row mt-2">
							@foreach($product->GalleryImages as $gallery)
								<div class="col-md-3">
									<input type="file"  class="hidden product_gallery">
									<img src="{{ asset('/images/product_gallery/'.$gallery->image) }}" class="GalleryImage" data-id="{{ Crypt::encrypt($gallery->id) }}">
									<div class="float-right">
										<i class="fa fa-upload text-info cursor_pointer GalleryUpdate" aria-hidden="true"></i>
										<i class="fa fa-remove text-danger mr-1 ml-2 cursor_pointer GalleryRemove" aria-hidden="true"></i>
									</div>
								</div>
							@endforeach
							<div class="col-md-3 d-flex align-items-center justify-content-center GalleryAdd">
								<i class="fa fa-plus fa-5x text-info cursor_pointer" aria-hidden="true"></i>
							</div>
								<input type="file" multiple  id="product_gallery_add" class="hidden">
						</div>
					</div>
					@endif
				</div>
				<div class="card-body">
					<h2 class="text-info text-center">Product Prices</h2>
					<div class="col-md-8 offset-2">
						<form  action="{{route('admin.AddProductPrices')}}" method="post">
							<input type="hidden" value="{{ Crypt::encrypt($product->id) }}" name="id">
							<div class='row mt-4'>
                                @foreach(App\ProductKgPrice::all() as $value)
                                	<div class='col-md-4 mt-3'>
										<input type='text' class='form-control' value="{{$value->kg}}" name='kgs[]' placeholder='Kg'>
									</div>
									<div class='col-md-4 mt-3'>
										<input type='text' class='form-control' value="{{$value->price}}" name='prices[]' placeholder='Price'>
									</div>
									<div class='col-md-4 mt-3'>
										<input type='text' class='form-control' value="{{$value->color}}" name='colors[]' placeholder='Price'>
									</div>
								@endforeach
							</div>
							@csrf
							<div class='row mt-4'>
								<div class='col-md-4 mt-3'>
									<input type='text' class='form-control' name='kgs[]' placeholder='Kg'>
								</div>
								<div class='col-md-4 mt-3'>
									<input type='text' class='form-control' name='prices[]' placeholder='Price'>
								</div>
								<div class='col-md-4 mt-3'>
									<input type='text' class='form-control' name='colors[]' placeholder='Colors'>
								</div>
								<div class='col-md-4 mt-3'>
									<input type='text' class='form-control' name='kgs[]' placeholder='Kg'>
								</div>
								<div class='col-md-4 mt-3'>
									<input type='text' class='form-control' name='prices[]' placeholder='Price'>
								</div>

								<div class='col-md-4 mt-3'>
									<input type='text' class='form-control' name='colors[]' placeholder='Colors'>
								</div>
								<div class='col-md-4 mt-3'>
									<input type='text' class='form-control' name='kgs[]' placeholder='Kg'>
								</div>
								<div class='col-md-4 mt-3'>
									<input type='text' class='form-control' name='prices[]' placeholder='Price'>
								</div>

								<div class='col-md-4 mt-3'>
									<input type='text' class='form-control' name='colors[]' placeholder='Colors'>
								</div>
								<div class='col-md-4 mt-3'>
									<input type='text' class='form-control' name='kgs[]' placeholder='Kg'>
								</div>
								<div class='col-md-4 mt-3'>
									<input type='text' class='form-control' name='prices[]' placeholder='Price'>
								</div>

								<div class='col-md-4 mt-3'>
									<input type='text' class='form-control' name='colors[]' placeholder='Colors'>
								</div>
							</div>
							<div class='form-group mt-5'>
								<button class='btn btn-primary'>Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection