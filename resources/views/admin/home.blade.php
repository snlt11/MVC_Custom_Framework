@extends("layout/master")
@section("Title","Admin Home Page")


@section("content")
{{--    <h1>Admin Home Page</h1>--}}
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                @include("layout/admin_sidebar")
            </div>

            <div class="col-md-8">

            </div>
        </div>
    </div>

@endsection