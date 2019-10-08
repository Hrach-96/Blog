@extends('admin_inc.template')
@section('content')
    <div class="main-content-inner">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-info text-center">Add Category</h2>
                    <div class="col-md-6 offset-3">
                        <form action="{{route('admin.NewCategory')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                @if ($errors->has('name'))
                                    <p role="alert" class='text-danger'><strong>{{ $errors->first('name') }}</strong></p>
                                @endif
                                <label for="name" class="col-form-label">Category Name</label>
                                <input class="form-control" value="{{old('name')}}" type="text" name="name" id="name" placeholder="Category Name">
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success mb-3">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection