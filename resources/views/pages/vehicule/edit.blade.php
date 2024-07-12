@extends('layouts.app')


@section('content')
    <section class="bg-white ">
        <div class="max-w-3xl px-4 py-8 mx-auto lg:py-16">
            <div class="p-6 space-y-4 shadow-lg md:space-y-6 sm:p-8">
                @if (Session::has('alert-type') && Session::has('alert-message'))
                    <x-alert type="{{ Session::get('alert-type') }}" :message="Session::get('alert-message')" class="w-full mb-4 alert" />
                @endif
                <h1 class="p-3 mb-10 text-2xl font-semibold text-center text-blue-700 bg-blue-50">
                    Modification de véhicule {{ $vehicule->immatriculation }}
                </h1>
                <form class="space-y-5 md:space-y-10" action="{{ route('vehicule.update', $vehicule->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex justify-between space-x-5">

                        <div class="w-full">
                            <select name="place_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm block w-full p-2.5">
                                @foreach ($places as $place)
                                    <option value="{{ $place->id }}"
                                        {{ $vehicule->place_id === $place->id ? 'selected' : '' }}>
                                        {{ $place->numero }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-full">
                            <select name="marque_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                @foreach ($marques as $marque)
                                    <option value="{{ $marque->id }}"
                                        {{ $vehicule->marque_id === $marque->id ? 'selected' : '' }}>
                                        {{ $marque->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-between space-x-5">
                        <div class="w-full">
                            <label for="proprietaire" class="block mb-2 text-sm font-medium text-gray-900">
                                Nom complet du propriétaire
                            </label>
                            <input type="text" name="proprietaire" id="proprietaire"
                                value="{{ $vehicule->proprietaire }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:placeholder-gray-400 "
                                placeholder="Allah Joel">
                        </div>
                        <div class="w-full">
                            <label for="proprietaire_phone" class="block mb-2 text-sm font-medium text-gray-900">
                                Numéro de téléphone du propriétaire
                            </label>
                            <input type="text" name="proprietaire_phone" id="proprietaire_phone"
                                value="{{ $vehicule->proprietaire_phone }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:placeholder-gray-400 "
                                placeholder="0102030405">
                        </div>
                    </div>

                    <div class="flex justify-between space-x-5">
                        <div class="w-full">
                            <label for="immatriculation"
                                class="block mb-2 text-sm font-medium text-gray-900">Immatriculation du
                                véhicule</label>
                            <input type="text" name="immatriculation" id="immatriculation"
                                value="{{ $vehicule->immatriculation }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:placeholder-gray-400 "
                                placeholder="CI02154">
                        </div>
                        <div class="w-full">
                            <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Type du
                                véhicule</label>
                            <input type="text" name="type" id="type" value="{{ $vehicule->type }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:placeholder-gray-400 "
                                placeholder="4x4">
                        </div>
                    </div>

                    <div class="flex justify-between space-x-5">
                        <div class="w-full">
                            <label for="model" class="block mb-2 text-sm font-medium text-gray-900">
                                Modèle du véhicule
                            </label>
                            <input type="text" name="model" id="model" value="{{ $vehicule->model }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:placeholder-gray-400 "
                                placeholder="X5">
                        </div>
                        <div class="relative w-full">
                            <label for="carburant" class="block mb-2 text-sm font-medium text-gray-900">
                                Carburant
                            </label>
                            <input type="number" name="carburant" id="carburant" value="{{ $vehicule->carburant }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:placeholder-gray-400 "
                                placeholder="15000">
                            <span class="absolute text-gray-400 right-10 top-10">F CFA</span>
                        </div>
                    </div>

                    <div class="flex justify-between space-x-5">
                        <div class="w-full">
                            <label for="panne" class="block mb-2 text-sm font-medium text-gray-900">
                                Panne du véhicule
                            </label>
                            <input type="text" name="panne" id="panne" value="{{ $vehicule->panne }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:placeholder-gray-400 "
                                placeholder="Moteur en panne">
                        </div>
                        <div class="w-full">
                            <label for="garantie" class="block mb-2 text-sm font-medium text-gray-900">Garantie</label>
                            <select name="garantie" id="garantie"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm block w-full p-2.5">
                                <option value="oui" {{ $vehicule->garantie === 'oui' ? 'selected' : '' }}> Oui </option>
                                <option value="non" {{ $vehicule->garantie === 'non' ? 'selected' : '' }}> Non </option>
                            </select>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full text-white bg-blue-700 focus:ring-4 focus:outline-none font-medium text-sm px-5 py-2.5 text-center">
                        Enregistrer
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
