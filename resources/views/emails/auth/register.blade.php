{{-- <img style="width: 200px;" src="{{ asset('images/sucess_icon.png') }}" alt=""> --}}

<p>Bonjour {{ $user->username }}</p>

<p>Vous venez de vous inscrire sur PARC AUTO</p>

<p>Login: {{ $user->email }}</p>
<p>Mot de passe: {{ $password }}</p>

<p>
    <a href="{{ url('/auth/login') }}">Connectez-vous maintenant</a>
</p>

<p>
    <a href="{{ $user->remember_token ? route('verify.email', $user->remember_token) : route('login.index') }}">
        Confirmer votre email en cliquant juste ici
    </a>
</p>
