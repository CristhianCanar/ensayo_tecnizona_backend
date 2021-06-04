<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\ModuloRol;
use App\Models\Rol;
use App\Models\RolUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

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
        $roles = Rol::orderBy('rol')->get();
        return view('admin.usuarios.registrar', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'               => 'required|string|max:80',
            'telefono'             => 'required|string|max:15',
            'email'                => 'required|string|email|max:50|unique:users',
            'password'             => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $autorizacion_correo = 0;
        if ($request->autorizacion_correo == "on") {
            $autorizacion_correo = 1;
        }

        $usuario = new User();
        $usuario->nombre              = $request->nombre;
        $usuario->telefono            = $request->telefono;
        $usuario->email               = $request->email;
        $usuario->password            = Hash::make($request->input('password'));
        $usuario->autorizacion_correo = $autorizacion_correo;
        $usuario->save();

        $rol = Rol::where('id_rol', $request->rol_id)->first();
        $usuario->roles()->attach($rol);

        toast('Usuario registrado con éxito!', 'success')->width(250);
        //Alert::success('Registrado', 'user con éxito');
        return redirect(route('user.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_user)
    {
        $user = User::where('id_user', $id_user)->first();
        return view('admin.usuarios.ver', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_user)
    {
        $user  = User::where('id_user', $id_user)->first();
        $roles = Rol::orderBy('rol')->where('id_rol','!=',$user->roles['0']->id_rol)->get();
        return view('admin.usuarios.modificar', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {
        $request->validate([
            'nombre'               => 'required|string|max:80',
            'telefono'             => 'required|string|max:15',
            'password'             => ['confirmed', Rules\Password::defaults()],
        ]);

        $autorizacion_correo = 0;
        $password = 0;
        if ($request->input('autorizacion_correo') == "on") {
            $autorizacion_correo = 1;
        }

        if ($request->input('cambiar_password') == "on") {
            $password = $request->input('password');
        } else {
            $user_pass = User::where('id_user', $id_user)->first();
            $password = $user_pass->password;
        }

        User::where('id_user', $id_user)->update([
            'nombre'                => $request->nombre,
            'telefono'              => $request->telefono,
            'email'                 => $request->email,
            'password'              => Hash::make($password),
            'autorizacion_correo'   => $autorizacion_correo
        ]);

        RolUser::where('user_id', $id_user)->update([
            'rol_id'                => $request->rol_id,
        ]);

        toast('Usuario modificado con éxito!', 'success')->width(250);
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        User::where('id_user', $id_user)->delete();
        toast('Usuario eliminado con éxito!', 'info')->width(250);
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user_gestionar_permisos()
    {
        $roles = Rol::orderBy('id_rol', 'asc')->get();

        $modulos_roles = ModuloRol::get();
        return view('admin.usuarios.gestionar_permisos', compact('roles', 'modulos_roles'));
    }

    /* Validación para buscar Cliete formación */
    public function buscar_user(Request $request)
    {
        $buscar = $request->input('nombre_user');
        $busqueda = User::where('nombre', 'LIKE', "$buscar%")
            ->first();
        if ($buscar == "") {
            Alert::error('¡Escribe!', 'Para buscar');
            return redirect(route('user.index'));
        }
        if (isset($busqueda)) {
            $buscar = $request->input('nombre_user');
            $users = User::orderBy('created_at', 'desc')
                ->where('nombre', 'LIKE', "$buscar%")
                ->paginate(10);

            return view('admin.users.gestionar', compact('users'));
        } else {
            Alert::info('Vacio', 'No se encontraron users');
            return redirect(route('user.index'));
        }
    }
}
