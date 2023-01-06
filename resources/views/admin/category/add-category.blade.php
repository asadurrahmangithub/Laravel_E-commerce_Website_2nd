@extends('admin.master')
@section('title')
    Category
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Category</h3></div>
                    <div class="card-body">
                        <form action="{{route('new-category')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3 mb-md-0">
                                        <input class="form-control" name="category_name"  type="text" placeholder="Category" />

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <input class="form-control" name="image"  type="file"  />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10 mt-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="publication_status" checked id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Publish</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="publication_status" id="inlineRadio2" value="2">
                                        <label class="form-check-label" for="inlineRadio2">UnPublish</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button type="submit" class="btn btn-outline-primary btn-block">Create Category</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Manage Category</h3>
                </div>
                @if(session()->has('massage'))
                    <div class="alert alert-success">
                        {{session()->get('massage')}}
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-hover table-bordered table-striped">

                        <tr>
                            <th>sl</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Acton</th>
                        </tr>
                        @php $i=1 @endphp
                        @foreach($categories as $category)
                            <tr>
                                <th>{{$i++}}</th>
                                <th>{{$category->category_name}}</th>
                                <th>
                                    <img src="{{asset($category->image)}}" alt="" style="height: 60px; width: 60px;">
                                </th>
                                <th>
                                    @if($category->publication_status==1)
                                        Public
                                    @else
                                        UnPublic
                                    @endif
                                </th>
                                <th class="d-flex">
                                    <a href="{{route('edit-category',['id'=>$category->id])}}" class="btn btn-outline-primary m-1">Edit</a>
                                    @if($category->publication_status==1)
                                        <a href="{{route('publication-status',['id'=>$category->id])}}" class="m-1 btn btn-outline-success">Public</a>
                                    @else
                                        <a href="{{route('publication-status',['id'=>$category->id])}}" class="m-1 btn btn-outline-warning">UnPublic</a>
                                    @endif
                                    <form action="{{route('delete-category')}}" method="post" class="m-1">
                                        @csrf
                                        <input type="hidden" value="{{$category->id}}" name="delete_id">
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure to Delete this!!')">Delete</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
