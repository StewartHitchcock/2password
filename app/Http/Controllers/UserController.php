<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user = Auth::user();

        return view('users.edit')->with('user', $user);
    }

    public function update(Request $request, $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
        ]);

        // $record->update($request->all());

        $user = user::find($user);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Crypt::encryptString($request->password);
        $user->save();

        return view('/home');
    }
}
