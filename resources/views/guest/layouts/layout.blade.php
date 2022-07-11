<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flowbite.min.css') }}" />

    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <script src="{{ asset('js/jquery.js')}}"></script>
 

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <style>

    </style>
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <main>
            @yield('container')
        </main>
    </div>
    <script src="{{ asset('js/flowbite.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    </script>
</body>

</html>
