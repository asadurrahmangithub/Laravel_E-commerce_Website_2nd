@extends('admin.master')
@section('title')
    Edit Brand
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Brand</h3></div>
                    <div class="card-body">
                        <form name="edit_form" action="{{route('save-brand')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Brand Name</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" id="" value="{{$brand->id}}">
                                    <input type="text" name="name" value="{{$brand->name}}" placeholder="Enter Brand Name"  class="form-control" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label mt-5" for="basic-default-name">Image</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <img id="img" src="{{asset($brand->image)}}" alt="" style="height: 150px; width: 150px">
                                    </div>
                                </div>
                                <div class="col-sm-7 mt-5">
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="image" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])" accept="image/*" />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10 mt-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="publication_status" id="inlineRadio1"
                                               @if($brand->publication_status==1)
                                               checked
                                               @endif

                                               value="1">
                                        <label class="form-check-label" for="inlineRadio1">Publish</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="publication_status" id="inlineRadio2"
                                               @if($brand->publication_status==2)
                                               checked
                                               @endif
                                               value="2">
                                        <label class="form-check-label" for="inlineRadio2">UnPublish</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-3">
                                    <input type="submit" value="Submit" class="form-control btn btn-outline-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
