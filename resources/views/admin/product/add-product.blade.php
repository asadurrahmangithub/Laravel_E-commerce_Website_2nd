@extends('admin.master')
@section('title')
    Product
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 justify-content-center">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Create Product</h4>

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                @endif
                <!-- Basic Layout & Basic with Icons -->
                    <div class="row">
                        <!-- Basic Layout -->
                        <div class="col-xxl">
                            <div class="card mb-4">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Add New Product Item</h5>
                                    <a class="float-end btn btn-outline-secondary text-danger" href="{{route('manage-product')}}">Back</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('save-product')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Category</label>
                                            <div class="col-sm-10">
                                                <select name="category_id" required id="" class="form-control">
                                                    <option disabled selected>Select A Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Sub Category</label>
                                            <div class="col-sm-10">
                                                <select name="sub_category_id" required id="" class="form-control">
                                                    <option disabled selected>Select A Sub Category</option>
                                                    @foreach($subCategories as $subCategory)
                                                        <option value="{{$subCategory->id}}">{{$subCategory->subcategory_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Brand</label>
                                            <div class="col-sm-10">
                                                <select name="brand_id" required id="" class="form-control">
                                                    <option disabled selected>Select A Brand</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="product_name" id="basic-default-name" placeholder="Enter Your Product Name" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-company">Sub Description</label>
                                            <div class="col-sm-10">
                                                <textarea
                                                    name="sub_description"
                                                    id="basic-default-message"
                                                    class="form-control"
                                                    placeholder="Enter Your Sub Description Title Name"
                                                    aria-label="Hi, Do you have a moment to talk Joe?"
                                                    aria-describedby="basic-icon-default-message2"
                                                ></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-company">Description</label>
                                            <div class="col-sm-10">
                                                <textarea
                                                    name="description"
                                                    id="basic-default-message"
                                                    class="form-control summernote"
                                                    placeholder="Enter Your Description Title Name"
                                                    aria-label="Hi, Do you have a moment to talk Joe?"
                                                    aria-describedby="basic-icon-default-message2"
                                                ></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Code</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="product_Code" id="basic-default-name" placeholder="Enter Your Product Code" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Stroke</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="product_stroke" id="basic-default-name" placeholder="Enter Your Product Stroke" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="regular_price" id="basic-default-name" placeholder="Enter Your Product Regular Price" />
                                                    <input type="number" class="form-control" name="selling_price" id="basic-default-name" placeholder="Enter Your Product Selling Price" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Image 1*</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <input type="file" required class="form-control" id="inputGroupFile02" name="image" />
                                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Other Img</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="" name="other_image[]" multiple/>
                                                    <label class="input-group-text" for="">Upload</label>
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
                                                    id="defaultRadio1"
                                                    checked
                                                />
                                                <label class="form-check-label" for="defaultRadio1"> Public </label>
                                            </div>
                                            <div class="form-check col-sm-2">
                                                <input
                                                    name="publication_status"
                                                    class="form-check-input"
                                                    type="radio"
                                                    value="2"
                                                    id="defaultRadio2"
                                                />
                                                <label class="form-check-label" for="defaultRadio2"> UnPublic </label>
                                            </div>
                                        </div>


                                        <div class="row justify-content-end">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Send</button>
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
