<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.users.index', compact('users'));
    }

    public function edit(string $id)
    {

        $vehicule_id = Crypt::decryptString($id);

        $user = User::find($vehicule_id)->first();

        return view('pages.user.edit', compact('user'));
    }
}
