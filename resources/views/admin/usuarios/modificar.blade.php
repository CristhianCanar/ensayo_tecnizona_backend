@extends('admin.layouts.app')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Modificar Usuario</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{route('home')}}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.index') }}">Usuarios</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.edit', $user->id_user) }}">Modificar Usuario</a>
            </li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <form class="needs-validation" method="POST" action="{{ route('user.update', $user->id_user) }}" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-row justify-content-center">
                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> Nombre</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                        name="nombre" id="nombre" value="{{ $user->nombre }}"
                                        placeholder="Ej: Juan Jose" maxlength="50" required>
                                    @error('nombre')
                                        <div class="invalid-feedback">
                                            Los nombres no cumple con las características mínimas
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> Teléfono</label>

                                    <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                                        name="telefono" id="telefono" value="{{ $user->telefono }}"
                                        placeholder="Ej: 3221233456" maxlength="15" required>
                                    @error('telefono')
                                        <div class="invalid-feedback">
                                            El teléfono no cumple con las características mínimas
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> Rol</label>
                                    <select class="custom-select" name="rol_id" id="rol_id" autofocus required>
                                        <option value="{{ $user->roles['0']->id_rol }}">{{ $user->roles['0']->rol }}</option>
                                        @foreach ($roles as $rol)
                                            <option value="{{ $rol->id_rol }}">{{ $rol->rol }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> Correo</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" value="{{  $user->email }}"
                                        placeholder="Ej: juan.ortega@gmail.com" maxlength="50" autocomplete="new-text"
                                        required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            El email ya se encuentra registrado
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-10 col-lg-8 offset-1">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> Nueva Contraseña</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="password" maxlength="50" disabled required>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                Contraseña minimo de 8 carácteres
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-1" id="icono-pass">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cambiar_password" name="cambiar_password" onclick="Password()">
                                        <label class="custom-control-label float-right" for="cambiar_password"  style="margin-top: 40px" data-toggle="tooltip" title="Cambiar Contraseña" data-placement="right"></label>
                                    </div>
                                </div>

                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> Confirmar Contraseña</label>
                                    <div class="input-group">
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                            id="password_confirmation" maxlength="50" autocomplete="new-password" disabled required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fas fa-eye-slash color-azul" id="mostrar-password"></i>
                                            </div>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                Contraseña minimo de 8 carácteres
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                @if ($user->autorizacion_correo == 1)
                                    <div class="form-group col-10 col-lg-8 custom-control custom-checkbox" style="cursor: context-menu">
                                        <input type="checkbox" class="custom-control-input " id="autorizacion_correo" name="autorizacion_correo" checked>
                                        <label class="custom-control-label float-left ml-3" for="autorizacion_correo">Inscrito en la lista de correos</label>
                                    </div>
                                @else
                                    <div class="form-group col-10 col-lg-8 custom-control custom-checkbox" style="cursor: context-menu">
                                        <input type="checkbox" class="custom-control-input " id="autorizacion_correo" name="autorizacion_correo">
                                        <label class="custom-control-label float-left ml-3" for="autorizacion_correo">Inscrito en la lista de correos</label>
                                    </div>
                                @endif

                                <div class="form-group col-10 col-lg-8 mt-3">
                                    <button class="btn btn-info w-100" type="submit"><i class="fa fa-edit"></i>
                                        Modificar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function Password() {
        var password              = document.getElementById("password");
        var password_confirmation = document.getElementById("password_confirmation");
        var checkbox              = document.getElementById("cambiar_password");
        if (checkbox.checked == true) {
            password.disabled              = false;
            password_confirmation.disabled = false;
        } else {
            password.disabled              = true;
            password_confirmation.disabled = true;

        }
    }
</script>

@endsection
