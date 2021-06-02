<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $autorizacion_correo = 0;
        if ($request->autorizacion_correo == "on") {
            $autorizacion_correo = 1;
        }

        $request->validate([
            'nombre'               => 'required|string|max:255',
            'email'                => 'required|string|email|max:255|unique:users',
            'password'             => ['required', 'confirmed', Rules\Password::defaults()],
            'autorizacion_correo'  => 'required',
        ]);

        $user = User::create([
            'nombre'               => $request->nombre,
            'email'                => $request->email,
            'password'             => Hash::make($request->password),
            'autorizacion_correo'  => $autorizacion_correo,
        ]);

        $rol = Rol::where('id_rol', 2)->first();
        $user->roles()->attach($rol);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
