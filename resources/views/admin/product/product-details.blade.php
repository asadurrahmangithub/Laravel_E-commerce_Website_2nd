@extends('admin.master')
@section('title')
    Product Details
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 justify-content-center">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Product Details</h4>

                <!-- Basic Layout & Basic with Icons -->
                    <div class="row">
                        <!-- Basic Layout -->
                        <div class="col-xxl">
                            <div class="card mb-4">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Product Details</h5>
                                    <a class="float-end btn btn-outline-secondary text-danger" href="{{route('manage-product')}}">Back</a>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">Category</label>
                                        <div class="col-sm-9">
                                            <select id="" class="form-control">
                                                <option disabled selected>{{$product->category['category_name']}}</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">Sub Category</label>
                                        <div class="col-sm-9">
                                            <select id="" class="form-control">
                                                <option disabled selected>{{$product->subCategory['subcategory_name']}}</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">Brand</label>
                                        <div class="col-sm-9">
                                            <select id="" class="form-control">
                                                <option disabled selected>{{$product->brand['name']}}</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" disabled id="basic-default-name" value="{{$product->product_name}}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-company">Sub Description</label>
                                        <div class="col-sm-9">
                                                <textarea
                                                    disabled
                                                    name="sub_description"
                                                    id="basic-default-message"
                                                    class="form-control"
                                                    placeholder="Enter Your Sub Description Title Name"
                                                    aria-label="Hi, Do you have a moment to talk Joe?"
                                                    aria-describedby="basic-icon-default-message2"
                                                >{{$product->sub_description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-company">Description</label>
                                        <div class="col-sm-9">
                                                <textarea
                                                    disabled
                                                    name="description"
                                                    id="basic-default-message"
                                                    class="form-control"
                                                    placeholder="Enter Your Description Title Name"
                                                    aria-label="Hi, Do you have a moment to talk Joe?"
                                                    aria-describedby="basic-icon-default-message2"
                                                >{!! str($product->description) !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">Product Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" disabled  value="{{$product->product_code}}" id="basic-default-name" placeholder="Enter Your Product Code" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">Product Stroke</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" disabled value="{{$product->product_stroke}}" id="basic-default-name" placeholder="Enter Your Product Stroke" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">Product Price</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="number" class="form-control" disabled value="{{$product->regular_price}}" id="basic-default-name" placeholder="Enter Your Product Regular Price" />
                                                <input type="number" class="form-control" disabled value="{{$product->selling_price}}" id="basic-default-name" placeholder="Enter Your Product Selling Price" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label mt-5" for="basic-default-name">Image</label>
                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <img id="img1" src="{{asset($product->image)}}" alt="" style="height: 150px; width: 150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label mt-5" for="basic-default-name">Other Image</label>
                                        @foreach($product->otherImages as $otherImage)
                                        <div class="col-sm-3">
                                            <div class="input-group">

                                                <img id="img1" src="{{asset($otherImage->image)}}" alt="" style="height: 150px; width: 150px">

                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
