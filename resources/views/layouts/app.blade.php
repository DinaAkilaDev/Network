<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Network') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

   @include('includes.css')
</head>
<body>
    <div id="app" class="theme-layout">
        @include('includes.header')


        <main class="py-4">
            <div class="gap gray-bg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row" id="page-contents">
{{--                                @include('includes.leftsidebar')--}}
                                @yield('content')
{{--                                @include('includes.rightsidebar')--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        @include('includes.footer')
    </div>
    @include('includes.js')
    <script src="{{ URL::to('src/js/app.js') }}"></script>
</body>
</html>
