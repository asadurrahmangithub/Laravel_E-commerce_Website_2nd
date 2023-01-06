@extends('admin.master')
@section('title')
    Category
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Category</h3></div>
                    <div class="card-body">
                        <form action="{{route('sub-category',['id'=>$subcategory->id])}}" method="post" >
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <select name="category_name"  id="" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id==$subcategory->category_id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mb-md-0">
                                        <input type="hidden" name="id" id="" value="{{$subcategory->id}}">
                                        <input class="form-control" name="subcategory_name" value="{{$subcategory->subcategory_name}}"  type="text" placeholder="Sub Category" />

                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10 mt-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="publication_status"
                                               @if($subcategory->publication_status==1)
                                               checked
                                               @endif
                                               id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Publish</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="publication_status"
                                               @if($subcategory->publication_status==2)
                                               checked
                                               @endif
                                               id="inlineRadio2" value="2">
                                        <label class="form-check-label" for="inlineRadio2">UnPublish</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button type="submit" class="btn btn-outline-primary btn-block">Update Sub Category</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
