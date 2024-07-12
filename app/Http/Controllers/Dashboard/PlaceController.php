<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        return view('pages.places.index', compact('places'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make([
            'numero' => ['required', 'string'],
        ], [
            'numero.required' => 'Le champ est obligatoire.',
            'numero.string' => 'Les chaînes de caractère seulement autorisés',
        ]);

        if ($validator->fails()) {

            $errorMessage = $validator->errors()->first();

            Session::flash('alert-type', 'error');
            Session::flash('alert-message', $errorMessage);

            return redirect()->back();
        }

        $place = new Place();
        $place->numero = $request->numero;
        $place->save();

        Session::flash('alert-type', 'success');
        Session::flash('alert-message',  "Place ajoutée avec succès !");

        return back();
    }

    public function edit($id)
    {

        $place_id = Crypt::decryptString($id);

        $place = Place::find($place_id)->first();

        return view('pages.places.edit', compact('place'));
    }

    public function delete($id)
    {

        $place = Place::query()->find($id)->first();
        $place->delete();

        Session::flash('alert-type', 'success');
        Session::flash('alert-message',  "Place supprimée avec succès !");

        return back();
    }
}
