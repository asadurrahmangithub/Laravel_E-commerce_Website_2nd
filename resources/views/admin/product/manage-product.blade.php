@extends('admin.master')
@section('title')
    Manage Product
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 justify-content-center">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Manage Product</h4>

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                @endif
                <!-- Basic Layout & Basic with Icons -->

                </div>
                <div class="container">
                    <div class="card">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-header">Manage All Product Item Table</h5>
                            <a class="float-end btn btn-outline-secondary text-danger" href="{{route('save-product')}}">Add Product</a>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Selling Price</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                <?php $i=1 ?>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->category['category_name']}}</td>
                                        <td>{{$product->selling_price}}</td>
                                        <td><img src="{{asset($product->image)}}" alt="" style="height: 50px;width: 50px;"></td>


                                        <td>
                                            @if($product->publication_status==1)

                                                <a href="{{route('publication-status-product',['id'=>$product->id])}}" class="btn btn-success btn-xs" title="UnPublished">Public
                                                    <span class="glyphicon glyphicon-arrow-up"><i class="bi bi-arrow-down-circle-fill"></i></span>
                                                </a>
                                            @else
                                                <a href="{{route('publication-status-product',['id'=>$product->id])}}" class="btn btn-warning btn-xs" title="Published">
                                                    <span><i class="bi bi-arrow-up-circle-fill"></i>UnPublic</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow bg-white" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('product-details-admin',['id'=>$product->id])}}"><i class="bx bx-edit-alt me-1"></i> Details</a>
                                                    <a class="dropdown-item" href="{{route('edit-product',['id'=>$product->id])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>

                                                    <a class="dropdown-item" onclick="return confirm('Are you sure to Delete this!!')" href="{{route('delete-product',['id'=>$product->id])}}"><i class="bx bx-trash me-1"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
