
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashbord - ABLELE WASH</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
        <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
        @vite(['resources/css/app.css','resources/js/app.js'])
        <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="{{ URL::to('assets/js/chartjspro.js') }}"></script>
        <script src="{{ URL::to('assets/js/datepicker.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>

        @yield('style')

    </head>

    <body>
        <div class="flex flex-col items-center justify-center h-screen px-6 mx-auto xl:px-0 dark:bg-gray-900">
            <div class="block md:max-w-lg">
                <img src="{{ asset('images/404.png') }}" alt="astronaut image">
            </div>
            <div class="text-center xl:max-w-4xl">
                <h1 class="flex items-center justify-center gap-4 p-3 mb-3 text-2xl font-bold leading-tight text-red-700 bg-red-100 rounded-lg sm:text-4xl lg:text-5xl">
                    <svg class="w-10" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m3 3 8.735 8.735m0 0a.374.374 0 1 1 .53.53m-.53-.53.53.53m0 0L21 21M14.652 9.348a3.75 3.75 0 0 1 0 5.304m2.121-7.425a6.75 6.75 0 0 1 0 9.546m2.121-11.667c3.808 3.807 3.808 9.98 0 13.788m-9.546-4.242a3.733 3.733 0 0 1-1.06-2.122m-1.061 4.243a6.75 6.75 0 0 1-1.625-6.929m-.496 9.05c-3.068-3.067-3.664-7.67-1.79-11.334M12 12h.008v.008H12V12Z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <span>Problème de connexion</span>
                </h1>
                <p class="mb-5 text-base font-normal text-red-500 md:text-lg">Verifier votre connexion internet et réessayer plus tard, MERCI !</p>
                <a href="#" onclick="history.go(-1);" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-3">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    Aller à la page précédente
                </a>
            </div>
        </div>
    </body>

</html>
