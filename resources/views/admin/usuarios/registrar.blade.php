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
                                                title="Campo Obligatorio">*</span> Rol</label>
                                        <input type="text" class="form-control" name="rol" id="rol"
                                            placeholder="Ej: Administrador" maxlength="25" required>
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Correo</label>
                                        <input type="email" class="form-control" name="correo" id="correo"
                                            value="{{ old('correo') }}" placeholder="Ej: juan.ortega@gmail.com"
                                            maxlength="50" autocomplete="new-text" required>
                                        @error('correo')
                                            <div class="invalid-feedback">
                                                El correo no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Contraseña</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="password" maxlength="50" autocomplete="new-password"
                                            required>
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
