
@extends('layout/master')
@section('title','Category Create')

@section('content')
    <div class="container mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-5">
                    @include("layout/admin_sidebar")
                </div>
                <div class="col-md-7">
                    <h1 class="text-primary text-center">Create Category</h1>
                    <form action="/admin/category/create" method="post" enctype="multipart/form-data">
                        <div class="mb-3 form-group">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <input type="hidden" name="token" id="token" value="{{\App\classes\CSRFToken::_token()}}">
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                    </form>
                    <ul class="list-group mt-5">
                        @foreach($cats as $cat)
                            <li class="list-group-item">
                                <a href="/admin/category/all" class="text-decoration-none">{{$cat->name}}</a>
                                <span class="float-right">
                                    <i class="fa-solid fa-pen-to-square text-warning"></i>
                                    <i class="fa-solid fa-trash text-danger"></i>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection

