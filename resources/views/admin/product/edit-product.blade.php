@extends('admin.master')
@section('title')
    Edit Product
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 justify-content-center">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Product</h4>

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
                                    <form action="{{route('update-product',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-default-name">Category</label>
                                            <div class="col-sm-9">
                                                <select id="" name="category_id" class="form-control">
                                                    <option disabled selected> Selected A Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" {{$category->id==$product->category_id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-default-name">Sub Category</label>
                                            <div class="col-sm-9">
                                                <select name="sub_category_id" id="" class="form-control">
                                                    <option disabled selected>Selected A Sub Category</option>
                                                    @foreach($subCategories as $subCategory)
                                                        <option value="{{$subCategory->id}}" {{$subCategory->id == $product->sub_category_id ? 'selected' : ''}}>{{$subCategory->subcategory_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-default-name">Brand</label>
                                            <div class="col-sm-9">
                                                <select name="brand_id" id="" class="form-control">
                                                    <option disabled selected>Selected A Brand</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' : ''}}>{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-default-name">Product Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="product_name" id="basic-default-name" value="{{$product->product_name}}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-default-company">Sub Description</label>
                                            <div class="col-sm-9">
                                                <textarea
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
                                                    name="description"
                                                    id="basic-default-message"
                                                    class="form-control summernote"
                                                    placeholder="Enter Your Description Title Name"
                                                    aria-label="Hi, Do you have a moment to talk Joe?"
                                                    aria-describedby="basic-icon-default-message2"
                                                >{!! str($product->description) !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-default-name">Product Code</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="product_code"  value="{{$product->product_code}}" id="basic-default-name" placeholder="Enter Your Product Code" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-default-name">Product Stroke</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="product_stroke" value="{{$product->product_stroke}}" id="basic-default-name" placeholder="Enter Your Product Stroke" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-default-name">Product Price</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="regular_price" value="{{$product->regular_price}}" id="basic-default-name" placeholder="Enter Your Product Regular Price" />
                                                    <input type="number" class="form-control" name="selling_price" value="{{$product->selling_price}}" id="basic-default-name" placeholder="Enter Your Product Selling Price" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label mt-5" for="basic-default-name">Image</label>
                                            <div class="col-sm-3">
                                                <div class="input-group">
                                                    <img id="img1" src="{{asset($product->image)}}" alt="" style="height: 150px; width: 150px">
                                                </div>
                                            </div>
                                            <div class="col-sm-7 mt-5">
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="image" onchange="document.getElementById('img1').src = window.URL.createObjectURL(this.files[0])" accept="image/*" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label mt-5" for="basic-default-name">Other Image</label>
                                            @foreach($product->otherImages as $otherImage)
                                                <div class="col-sm-3">
                                                    <div class="input-group">

                                                        <img id="img9" src="{{asset($otherImage->image)}}" alt="" style="height: 150px; width: 150px">

                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="col-sm-12 mt-5">
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="other_image[]" onchange="document.getElementById('img9').src = window.URL.createObjectURL(this.files[0])" accept="image/*" multiple/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Status</label>
                                            <div class="form-check col-sm-2">
                                                <input
                                                    name="publication_status"
                                                    class="form-check-input"
                                                    type="radio"
                                                    value="1"
                                                    @if($product->publication_status==1)
                                                    checked
                                                    @endif
                                                    id="defaultRadio1"
                                                />
                                                <label class="form-check-label" for="defaultRadio1"> Public </label>
                                            </div>
                                            <div class="form-check col-sm-2">
                                                <input
                                                    name="publication_status"
                                                    class="form-check-input"
                                                    type="radio"
                                                    value="2"
                                                    @if($product->publication_status==2)
                                                    checked
                                                    @endif
                                                    id="defaultRadio2"
                                                />
                                                <label class="form-check-label" for="defaultRadio2"> UnPublic </label>
                                            </div>
                                        </div>


                                        <div class="row justify-content-end">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update Product</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
