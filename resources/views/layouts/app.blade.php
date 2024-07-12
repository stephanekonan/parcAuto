<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashbord - PARC AUTO</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Poppins:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        body {
            font-family: 'Poppins', 'Sans-serif';
        }

        .tilte-parcAuto {
            color: #0b157d
        }
    </style>

    @yield('style')

</head>

<body class="antialiased">
    <div class="bg-white ">

        <x-navbar />

        <x-sidebar />

        <main class="h-auto p-8 pt-20 md:ml-64">
            @yield('content')
        </main>
    </div>

    @yield('script')

</body>

</html>
