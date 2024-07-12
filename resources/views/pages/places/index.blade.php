@extends('layouts.app')

@section('style')
    <style>
        .container-body {
            width: 500px
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        .hidden-accordion {
            display: none;
        }
    </style>
@endsection

@section('content')
    @if (Session::has('alert-type') && Session::has('alert-message'))
        <x-alert type="{{ Session::get('alert-type') }}" :message="Session::get('alert-message')" class="w-full mb-4 alert" />
    @endif

    <div class="flex items-center justify-between pb-5 my-10 border-b">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
            Places
        </h1>
        <div class="flex items-center space-x-5">
            <div>
                <span class="text-xl font-bold text-blue-700">
                    {{ $places->count() > 0 ? $places->count() . ' véhicules' : 'Aucune place enregistré' }}
                </span>
            </div>
        </div>
    </div>

    <div class="py-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 ">

        <div class="w-full mb-1">

            <div class="justify-between mb-5 sm:flex">

                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <a href="#" data-modal-target="place-modal" data-modal-toggle="place-modal"
                        class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Ajouter une place
                    </a>
                </div>

            </div>

        </div>

    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    @if ($places->count() > 0)
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">

                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col">
                                        #
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Numéro
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Ajoutée le
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            @foreach ($places as $place)
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="w-4 p-4">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="flex items-center p-4 mr-12 whitespace-nowrap">
                                            {{ $place->numero }}
                                        </td>
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ \Carbon\Carbon::parse($place->created_at)->locale('fr_FR')->isoFormat('dddd [le] D MMMM YYYY [à] HH[h]mm') }}
                                        </td>
                                        <td class="p-4 space-x-2 whitespace-nowrap">
                                            <a href="#" {{-- <a href="{{ URL('/place/edit', Crypt::encryptString($place->id)) }}" --}}
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-blue-800 rounded-lg bg-blue-50 hover:bg-blue-100 focus:ring-4 focus:ring-blue-300 ">
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
                                            <a href="{{ route('place.delete', $place->id) }}"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-red-800 rounded-lg bg-red-50 hover:bg-red-100 focus:ring-4 focus:ring-red-300">
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

                    @if ($places->count() === 0)
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
                                    <p class="text-xs text-gray-500 dark:text-gray-400">AUCUNE PLACE ENREGISTRÉE</p>
                                </div>
                            </label>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="place-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full p-4">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 ">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Ajouter une nouvelle place
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="{{ route('place.store') }}" method="POST">
                        @csrf
                        <div>
                            <input type="text" name="numero" id="numero"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="PK05" required>
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full my-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Enregistrer maintenant
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
