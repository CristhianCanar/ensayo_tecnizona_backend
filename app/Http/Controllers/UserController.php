<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::orderBy('created_at', 'desc')->paginate('10');
        return view('admin.usuarios.gestionar', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $autorizacion_correo = 0;
        if ($request->autorizacion_correo == "on") {
            $autorizacion_correo = 1;
        }

        $request->validate([
            'nombre'               => 'required|string|max:50',
            'email'                => 'required|email|unique:clientes,email|max:50',
            'password'             => ['required', 'confirmed', Rules\Password::defaults()],
            'autorizacion_correo'  => 'required',
        ]);

        $usuario = new User();
        $usuario->nombre              = $request->nombre;
        $usuario->email               = $request->email;
        $usuario->password            = Hash::make($request->input('password'));
        $usuario->autorizacion_correo = $autorizacion_correo;
        $usuario->save();

        $rol = Rol::where('id_rol', 2)->first();
        $usuario->roles()->attach($rol);

        toast('Cliente Registrado con éxito!', 'success')->width(250);
        //Alert::success('Registrado', 'Cliente con éxito');
        return redirect(route('cliente.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
