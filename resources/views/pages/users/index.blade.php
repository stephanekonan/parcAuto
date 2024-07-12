@extends('layouts.app')

@section('style')
@endsection

@section('content')
    @if (Session::has('alert-type') && Session::has('alert-message'))
        <x-alert type="{{ Session::get('alert-type') }}" :message="Session::get('alert-message')" class="w-full mb-4 alert" />
    @endif

    <div class="py-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">

        <div class="w-full">

            <div class="justify-between mb-5 sm:flex">

                <div class="flex items-center space-x-3">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        Liste des utilisateurs
                    </h1>
                    <span class="font-bold text-blue-700 text-md">
                        {{ $users->count() > 0 ? $users->count() . ' utilisateur(s)' : 'Aucun utilisateur enregistré' }}
                    </span>
                </div>

                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <form class="flex items-center space-x-2 lg:pr-3" action="/manager/vehicule/search" method="GET">
                        <div class="w-full">
                            <input type="search" name="search" id="search"
                                class="block w-full p-2 text-gray-900 border border-gray-200 bg-gray-50 sm:text-sm focus:outline-none "
                                placeholder="Rechercher un véhicule">
                        </div>
                        <button type="submit"
                            class="flex items-center justify-center w-1/2 px-3 py-1.5 text-sm font-medium text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700">
                            <svg class="w-5 h-6 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                            <span>Rechercher</span>
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    @if ($users->count() > 0)
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">

                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col">
                                        #
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Nom complet
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Numéro de téléphone
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Créé le
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            @foreach ($users as $user)
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="w-4 p-4">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->username }}
                                        </td>
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->email }}
                                        </td>
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->userphone }}
                                        </td>
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ \Carbon\Carbon::parse($user->created_at)->locale('fr_FR')->isoFormat('ddd D MMMM YYYY [,] HH[h]mm') }}
                                        </td>
                                        <td class="p-4 space-x-2 whitespace-nowrap">
                                            <a href="{{ URL('/user/edit', Crypt::encryptString($user->id)) }}"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-blue-800 bg-blue-50 hover:bg-blue-100 focus:ring-4 focus:ring-blue-300 ">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                            <a href="#"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-red-800 bg-red-50 hover:bg-red-100 focus:ring-4 focus:ring-red-300">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    @endif

                    @if ($users->count() === 0)
                        <div class="flex items-center justify-center w-full h-auto">
                            <label class="flex flex-col items-center justify-center w-full h-64 dark:hover:bg-bray-800">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">AUCUNE DONNÉE TROUVÉE</p>
                                </div>
                            </label>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
