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
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="#">animal</a>
                </div>
            </nav>

            <div class="container">
                <div id="app" class="full-width spaced">
                    <example-component></example-component>
                </div>
            </div>

            <footer class="py-5 bg-dark">
                <div class="container">
                    <p class="m-0 text-center text-white">https://github.com/</p>
                </div>
            </footer>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
