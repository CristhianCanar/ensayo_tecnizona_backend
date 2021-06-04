@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Registrar Usuario</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('home') }}">
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
                    <a href="{{ route('user.create') }}">Registrar Usuario</a>
                </li>
            </ul>
        </div>

        <div class="row justify-content-center">
            <div class="col-10 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <form class="needs-validation" method="POST" action="{{ route('user.store') }}" novalidate>
                                @csrf
                                <div class="form-row justify-content-center">
                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre"
                                            value="{{ old('nombre') }}" placeholder="Ej: Juan Perez" maxlength="50"
                                            required>
                                        @error('nombre')
                                            <div class="invalid-feedback">
                                                El nombre no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Teléfono</label>
                                        <input type="text" class="form-control" name="telefono" id="telefono"
                                            value="{{ old('telefono') }}" placeholder="Ej: 3221234565" maxlength="15"
                                            required>
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
                                            <option value="" selected disabled>Seleccione Rol</option>
                                            @foreach ($roles as $rol)
                                                <option value="{{ $rol->id_rol }}">{{ $rol->rol }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Correo</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ old('email') }}" placeholder="Ej: juan.ortega@gmail.com"
                                            maxlength="50" autocomplete="new-text" required>
                                        @error('email') 
                                            <div class="invalid-feedback">
                                                El correo no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Contraseña -->
                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Contraseña</label>
                                        <div class="input-group">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                id="password" maxlength="50" autocomplete="new-password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    Contraseña minimo de 8 carácteres
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Confirmar Contraseña</label>
                                        <div class="input-group">
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                                id="password_confirmation" maxlength="50" autocomplete="new-password" required>
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

                                    <div class="form-group col-10 col-lg-8 custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input " id="autorizacion_correo" name="autorizacion_correo">
                                        <label class="custom-control-label float-left ml-3" for="autorizacion_correo">Inscribir en la lista de correos</label>
                                    </div>

                                    <div class="form-group col-10 col-lg-8 mt-3">
                                        <button class="btn btn-success w-100" type="submit"><i class="fa fa-check"></i>
                                            Registrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
