<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>404 - PARC AUTO</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="{{ URL::to('assets/js/chartjspro.js') }}"></script>
    <script src="{{ URL::to('assets/js/datepicker.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>

    @yield('style')

</head>

<body>
    <div class="flex flex-col items-center justify-center h-screen px-6 mx-auto xl:px-0 dark:bg-gray-900">
        <div class="block md:max-w-lg">
            <img src="{{ asset('images/svg/404.svg') }}" alt="astronaut image">
        </div>
        <div class="text-center xl:max-w-4xl">
            <h1 class="mb-3 text-2xl font-bold leading-tight text-gray-900 sm:text-4xl lg:text-5xl dark:text-white">Page
                introuvable</h1>
            <p class="mb-5 text-base font-normal text-gray-500 md:text-lg dark:text-gray-400">Oops! On dirait que vous
                avez suivi un mauvais lien. Si vous pensez qu'il s'agit d'un problème chez nous, veuillez nous le
                signaler l'administration</p>
            <a href="#" onclick="history.go(-1);"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-3">
                <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                Aller à la page précedente
            </a>
        </div>
    </div>
</body>

</html>
