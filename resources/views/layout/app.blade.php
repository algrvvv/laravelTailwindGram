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

<body class="font-body bg-gray-200 relative z-0 h-screen">
    <div class="min-h-screen ">
        @include('inc.header')
        <div class="flex justify-center items-center m-3 absolute z-10 bottom-0 right-0 ">
            @include('inc.message')
        </div>
        @yield('content')
        <footer class="sticky top-[100vh]">
            @include('inc.footer')
        </footer>
    </div>
</body>

</html>
