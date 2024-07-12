<?php

namespace App\Http\Controllers\Auth;

use App\Mail\RegisterUser;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function loginStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'Le champ email est obligatoire.',
            'email.email' => 'Le champ email doit être valide.',
            'email.exists' => 'Email introuvable',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
        ]);

        if ($validator->fails()) {

            $errorMessage = $validator->errors()->first();

            Session::flash('alert-type', 'error');
            Session::flash('alert-message', $errorMessage);

            return redirect()->back();
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if (!Hash::check($password, $user->password)) {

            Session::flash('alert-type', 'error');
            Session::flash('alert-message', 'Mot de passe incorrect !');
            return redirect()->back();
        }

        Auth::attempt(['email' => $email, 'password' => $password]);

        Session::flash('alert-type', 'success');
        Session::flash('alert-message', 'Vous êtes à présent connectés');

        return redirect()->route('dashboard.index');

    }

    public function errorConnexion()
    {
        return view('errors.connexion');
    }

    public function logout()
    {
        Auth::logout();
        Session::flash('alert-type', 'success');
        Session::flash('alert-message', 'Vous êtes à présent deconnectés');
        return redirect()->route('login.index');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'userphone' => ['required', 'numeric', 'regex:/^\d{10}$/'],
        ], [
            'username.required' => 'Le champ nom et prénoms est obligatoire.',
            'username.string' => 'Le champ nom et prénoms doit être une chaîne de caractères.',
            'username.max' => 'Le champ nom et prénoms ne peut pas dépasser 255 caractères.',
            'email.required' => 'Le champ email est obligatoire.',
            'email.email' => 'Le champ email doit être valide.',
            'email.unique' => 'Cette email est déjà utilisée.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
            'userphone.required' => 'Le numéro de téléphone est obligatoire.',
            'userphone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'userphone.regex' => 'Le numéro de téléphone doit contenir 10 chiffres (pas plus, pas moins).',
        ]);

        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();

            Session::flash('alert-type', 'error');
            Session::flash('alert-message', $errorMessage);

            return redirect()->back();
        }

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->userphone = $request->userphone;
        $user->remember_token = Str::random(40);

        //$userRole = $user->assignRole('admin');

        // if (!$userRole) {
        //     Session::flash('alert-type', 'error');
        //     Session::flash('alert-message', 'Inscription impossible. Veuillez consulter le service client pour en savoir plus.');
        // }

        //Mail::to($user->email)->send(new RegisterUser($user, $request->password));


        $user->save();

        Session::flash('alert-type', 'success');
        Session::flash('alert-message', 'Inscription effectuée avec succès. Un mail vous a été envoyé pour confirmer votre email');

        return redirect()->route('login.index');
    }

    public function verify(?string $token)
    {
        if (!$token) {
            abort(404);
        }

        $user =  User::where('remember_token', $token)->first();

        if ($user) {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->remember_token = Str::random(40);
            $user->save();

            return view('auth.email-verified-sucessfull', ['token' => $token]);
        } else {

            Session::flash('alert-type', 'error');
            Session::flash('alert-message', 'Email introuvable');

            return back();
        }
    }
}
