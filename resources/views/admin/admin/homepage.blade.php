@extends('admin_inc.template')
@section('content')
        <div class="main-content-inner">
            <div class="main-panel p-3">
                <table class="datatable table table-hover nowrap w-100" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Description</th>
                        <th>Main Image</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($AllProduct as  $product)
                        <tr >
                            <td>{{$product->id}} </td>
                            <td>{{$product->name}} </td>
                            <td>{{$product->price}} </td>
                            <td>{{$product->description}} </td>
                            <td><img src="{{ asset("/images/main_images/".$product->main_image) }}" width="50" alt=""></td>
                            <td>
                                <a class="btn btn-outline-warning" href="{{ route('admin.EditProduct',['id' => $product->id]) }}" >Edit</a>
                                <a class="btn btn-outline-danger  ml-1" href="{{ route('admin.DeleteProduct',['id' => $product->id]) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection