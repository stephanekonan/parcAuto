@extends('layouts.app')

@section('content')
    @if (Session::has('alert-type') && Session::has('alert-message'))
        <x-alert type="{{ Session::get('alert-type') }}" :message="Session::get('alert-message')" class="w-full mb-4 alert" />
    @endif

    <div class="flex justify-between mt-5 mb-8 text-xl">
        <div class="flex">
            <span>Bonjour </span>
            <span class="ml-2 font-bold"> {{ Auth::user()->username }} !</span>
        </div>
        <div class="">
            <span class="px-2 py-1 text-sm text-green-700 bg-green-200 rounded-md">{{ Auth::user()->email }}</span>
        </div>
    </div>

    <div
        class="p-4 my-5 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="flex items-center justify-between mb-4">
            <div class="flex-shrink-0">
                <span
                    class="text-xl font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">{{ $vehiculesThisWeek }}
                    véhicules</span>
                <h3 class="text-base font-light text-gray-500 dark:text-gray-400">Cette semaine</h3>
            </div>
            <div
                class="flex items-center justify-end flex-1 text-base font-medium {{ $evolutionPercentage > 0 ? 'text-green-500' : 'text-red-500' }}">
                {{ $evolutionPercentage }}%
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
        <div id="statistics-chart"></div>
    </div>
@endsection
