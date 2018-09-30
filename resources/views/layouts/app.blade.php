<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            window.Laravel = { csrfToken: '{{ csrf_token() }}' }
        </script>

        <title>Wishfiles List</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css')}}" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <div id="app" class="container">

            <div class="row justify-content-md-center">

                <div class="col-10">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>

            </div>

        </div>

        <script src="{{ asset('js/app.js')}}" /></script>
    </body>
</html>
