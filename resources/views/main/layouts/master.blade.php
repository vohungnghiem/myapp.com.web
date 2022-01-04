<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <base href="{{ asset('') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="main_template/image/logo/logo.png?v=2" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="main_template/plugins/font-awesome/css/all.css">
    <link rel="stylesheet" href="main_template/plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="main_template/template/css/index.css?v=3000">
    <title>@yield('title')</title>
    <meta name="keywords"
        content="">

    <meta name="description"
        content="" />
</head>

<body>
    @include('main.layouts.menu')
    @yield('content')
    @include('main.layouts.footer')
</body>

</html>
