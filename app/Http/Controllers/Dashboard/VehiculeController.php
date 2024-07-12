<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Place;
use App\Models\Marque;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class VehiculeController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::all();
        return view('pages.vehicule.index', compact('vehicules'));
    }

    public function create()
    {
        $auth = auth()->check();

        if ($auth) {
            $marques = Marque::all();
            $places = Place::all();
            return view('pages.vehicule.create', compact('marques', 'places'));
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'immatriculation' => ['required', 'string'],
            'type' => ['required', 'string'],
            'model' => ['required', 'string'],
            'place_id' => ['required'],
            'marque_id' => ['required'],
            'proprietaire' => ['required', 'string'],
            'proprietaire_phone' => ['required', 'regex:/^\d{10}$/'],
            'carburant' => ['required', 'integer'],
            'panne' => ['required', 'string'],
            'garantie' => ['required'],
        ], [
            'immatriculation.required' => 'Le champ immatriculation est obligatoire.',
            'immatriculation.string' => 'Le champ immatriculation doit être une chaîne de caractères.',
            'type.required' => 'Le champ image est obligatoire.',
            'type.string' => 'Type doit être une chaîne de caractère',
            'model.required' => 'Le modèle est obligatoire',
            'model.string' => 'Le model doit être une chaîne de caractère.',
            'place_id.required' => 'La place est obligatoire',
            'marque_id.required' => 'La marque est obligatoire',
            'proprietaire.required' => 'Le champ propriétaire est obligatoire',
            'proprietaire.string' => 'Le model doit être une chaîne de caractère.',
            'proprietaire_phone.required' => 'Le champ téléphone du propriétaire est obligatoire',
            'proprietaire_phone.regex' => 'Le champ téléphone du propriétaire doit contenir 10 chiffres.',
            'carburant.required' => 'Le champ carburant est obligatoire',
            'carburant.integer' => 'Le champ carburant doit contenir seulement des chiffres.',
            'panne.required' => 'Le champ panne est obligatoire',
            'panne.string' => 'Le champ carburant doit être une chaîne de caractères.',
            'garantie.required' => 'Garentie non renseignée',
        ]);

        $author_id = auth()->user()->getAuthIdentifier();

        if ($validator->fails()) {

            $errorMessage = $validator->errors()->first();

            Session::flash('alert-type', 'error');
            Session::flash('alert-message', $errorMessage);

            return redirect()->back();
        }

        $vehicule = new Vehicule();
        $vehicule->immatriculation = $request->immatriculation;
        $vehicule->type = $request->type;
        $vehicule->model = $request->model;
        $vehicule->place_id = $request->place_id;
        $vehicule->marque_id = $request->marque_id;
        $vehicule->proprietaire = $request->proprietaire;
        $vehicule->proprietaire_phone = $request->proprietaire_phone;
        $vehicule->carburant = $request->carburant;
        $vehicule->garantie = $request->garantie;
        $vehicule->panne = $request->panne;
        $vehicule->author_id = $author_id;

        $vehicule->save();

        Session::flash('alert-type', 'success');
        Session::flash('alert-message',  "Véhicule ajouté avec succès !");

        return redirect()->route('dashboard.vehicules');
    }

    public function edit(string $id)
    {

        $vehicule_id = Crypt::decryptString($id);

        $vehicule = Vehicule::find($vehicule_id)->first();

        $marques = Marque::all();
        $places = Place::all();

        return view('pages.vehicule.edit', compact('vehicule', 'marques', 'places'));
    }

    public function update(Request $request, string $id)
    {
        $vehicule = Vehicule::findOrFail($id);

        $data = [
            'immatriculation' => $request->input('immatriculation'),
            'type' => $request->input('type'),
            'model' => $request->input('model'),
            'place_id' => $request->input('place_id'),
            'marque_id' => $request->input('marque_id'),
            'proprietaire' => $request->input('proprietaire'),
            'proprietaire_phone' => $request->input('proprietaire_phone'),
            'carburant' => $request->input('carburant'),
            'garantie' => $request->input('garantie'),
            'panne' => $request->input('panne'),
        ];

        $vehicule->update($data);

        Session::flash('alert-type', 'success');
        Session::flash('alert-message', 'Mise à jour effectuée avec succès !');

        return redirect()->route('dashboard.vehicules');
    }

    public function delete(string $id)
    {

        $vehicule = Vehicule::query()->find($id)->first();
        $vehicule->delete();

        Session::flash('alert-type', 'success');
        Session::flash('alert-message',  "Véhicule supprimé avec succès !");

        return back();
    }
}
