<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PARC AUTO - LOGIN</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins'
        }

        .form {
            background: #FFFFFF;
            box-shadow: #000000
        }

        .form button {
            background: #1567B9;
        }

        .form button:hover {
            background: #034C96
        }

        section {
            background-image: radial-gradient(circle, #3606c2, #1d139f, #0b157d, #06135a, #090d39);
        }
    </style>

</head>

<body class="antialiased">

    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center h-screen px-6 py-8 mx-auto lg:py-0">
            <h1 class="mb-10 text-3xl font-black text-white">PARC AUTO</h1>
            <div class="w-full rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 form">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    @if (Session::has('alert-type') && Session::has('alert-message'))
                        <x-alert type="{{ Session::get('alert-type') }}" :message="Session::get('alert-message')" class="w-full mb-4" />
                    @endif
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Connectez-vous à votre compte
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Votre
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:placeholder-gray-400 "
                                placeholder="stephanekonan.dev@gmail.com">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Mot de
                                passe</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div class="flex items-center justify-between">
                            <a href="{{ URL('/forget-password') }}"
                                class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Mot
                                de passe oublié?</a>
                        </div>
                        <button type="submit"
                            class="w-full text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Se
                            connecter
                        </button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Vous n'avez pas encore de compte ? <a href="{{ URL('/auth/register') }}"
                                class="font-semibold text-yellow-600 hover:underline dark:text-yellow-500">S'inscrire
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
