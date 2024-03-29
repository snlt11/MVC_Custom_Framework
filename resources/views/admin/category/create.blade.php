@extends('layout/master')
@section('title','Category Create')

@section('content')
    <style>
        .pagination > li{
            padding: 5px 10px;
            background :#ddd;
            margin-right : 1px;
        }
    </style>
    <div class="container mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-5">
                    @include("layout/admin_sidebar")
                </div>
                <div class="col-md-7">
                    <h1 class="text-primary text-center">Create Category</h1>
                    @include("layout.report_message")
                    @if(\App\Classes\Session::has('delete_success'))
                        {{\App\Classes\Session::flash('delete_success')}}
                    @endif
                    @if(\App\Classes\Session::has('delete_fail'))
                        {{\App\Classes\Session::flash('delete_fail')}}
                    @endif
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
                                    <a href="/admin/category/{{$cat->id}}/delete"><i class="fa-solid fa-trash text-danger"></i></a>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-5">
                        {!! $pages !!}
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

