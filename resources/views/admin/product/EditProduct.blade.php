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
								@if ($errors->has('price'))
									<p role="alert" class='text-danger'><strong>{{ $errors->first('price') }}</strong></p>
								@endif
								<label for="price" class="col-form-label">Product Price</label>
								<input class="form-control" value="{{old('price')?old('price'):$product->price}}" type="number" name="price" id="price" placeholder="Product Price">
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
			</div>
		</div>
	</div>
@endsection