<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Furbook</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $('.datepicker').datepicker({
                dateFormat: 'yy/mm/dd'
            });
        });
    </script>
</head>
<body>
<div class="container">
    <div class="page-header">
        @yield('header')
    </div>
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-success">
            {{\Illuminate\Support\Facades\Session::get('success')}}
        </div>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('error'))
        <div class="alert alert-warning">
            {{\Illuminate\Support\Facades\Session::get('error')}}
        </div>
    @endif
    @yield('content')
</div>
</body>
</html>