<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view ('sessions.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        
        ]);
        if(auth()->attempt($attributes))
        {
            session()->regenerate();
            return redirect('/')->with('success','Bem vindo de volta!');
        }
        throw ValidationException::withMessages([
            'email' => 'Your provided credential cold not be verified.'
        ]);

    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!!');
    }
}
