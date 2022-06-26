<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    </head>
    <body class="">

        <div class="container">



            <div class="row ">
                <div class="col-12 text-center">
                    <h1>Welcome to Exam App </h1>
                </div>
                <div class="col-12 text-center">

                    @if (Route::has('login'))
                        <div class="">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-success">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>

{{--                                @if (Route::has('register'))--}}
{{--                                    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>--}}
{{--                                @endif--}}
                            @endauth
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </body>
</html>
