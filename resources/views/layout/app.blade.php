<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{url('favicon.ico')}}" type="image/x-icon">
    <title>@yield('title', 'TWG | Home page')</title>
    @vite(['resources/css/app.css'])
</head>

<body class="font-body bg-gray-200">
    <div class="min-h-screen">
        @include('inc.header')
        @yield('content')
        <footer class="sticky top-[100vh]">
            @include('inc.footer')
        </footer>
    </div>
</body>

</html>
