<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/DateTimePicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">



    <title>ITGLOBAL Task manager</title>
</head>
<body class="bg-light">
<div class="container">
    <div class="row">
        <div class="content mt-30">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/DateTimePicker/DateTimePicker.js') }}"></script>
<script src="{{ asset('js/DateTimePicker/i18n/DateTimePicker-i18n.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</body>
</html>
