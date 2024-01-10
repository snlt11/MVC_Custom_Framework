<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="Shortcut Icon" href="{{asset("images/logo.jpg")}}" >
    <link rel="stylesheet" href="{{asset("css/app.css")}}" >
</head>
<body>

@include('layout/nav')

@yield('content')

<script src="{{asset("js/bootstrap.bundle.min.js")}}"></script>

</body>
</html>