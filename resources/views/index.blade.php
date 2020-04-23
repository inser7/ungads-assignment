<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Animal</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    {{--        <link href="/css/gentelella-custom.css" rel="stylesheet">--}}
</head>

<body>

<div class="container">
    <div id="app" class="full-width spaced">
            <div class="panel-body">
                <router-view name="AnimalIndex"></router-view>
                <router-view></router-view>
            </div>
    </div>
</div>

<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">https://github.com/inser7/ungads</p>
    </div>
</footer>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
