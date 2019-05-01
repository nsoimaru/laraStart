<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Larastart</title>
        <link rel="stylesheet" href="/css/app.css">
        <!-- Fonts -->


        <!-- Styles -->
        <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            {{-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}
            <div class="container flex-center position-ref full-height">
              <div class="row justify-content-center">
                <div class="col-sm-12">
                  <div class="title m-b-md">
                      Larastart
                  </div >
                  <h1 class="jumbotron-heading">Starter template</h1>
                  <p class="lead text-muted">Based on Laravel 5.8 Framework and Admin LTE 3</p>
                  <p class="lead text-muted">Please <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a> to acces the APP</p>
                </div>
              </div>
            </div>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
