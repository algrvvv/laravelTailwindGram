<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('favicon.ico') }}" type="image/x-icon">
    <title>@yield('title', 'TWG | Admin home page')</title>
    @vite(['resources/css/app.css'])
</head>

<body class="font-body bg-gray-200">
    <div class="flex w-screen h-screen text-gray-400 bg-gray-900">

        <!-- Component Start -->
        @include('admin.inc.panel')

        <div class="flex flex-col flex-grow">
            @include('admin.inc.header')
            <div class="flex-grow p-6 overflow-auto bg-gray-800">
                @yield('content')
            </div>
        </div>
        <!-- Component End  -->
    </div>
</body>

</html>
