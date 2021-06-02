@extends('admin.layouts.app')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Modificar Cliente</h4>
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
                <a href="{{ route('cliente.index') }}">Clientes</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('cliente.edit', $cliente->id_cliente) }}">Modificar Cliente</a>
            </li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <form class="needs-validation" method="POST" action="{{ route('cliente.update', $cliente->id_cliente) }}" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-row justify-content-center">
                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> Nombres</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                        name="nombre" id="nombre" value="{{ $cliente->nombre }}"
                                        placeholder="Ej: Juan Jose" maxlength="50" required>
                                    @error('nombre')
                                        <div class="invalid-feedback">
                                            Los nombres no cumple con las características mínimas
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> Dirección</label>
                                    <input type="text" class="form-control @error('direccion') is-invalid @enderror"
                                        name="direccion" id="direccion" value="{{!empty($cliente->direccion) ? $cliente->direccion:"Sin dirección registrada" }}"
                                        placeholder="Ej: Calle 65 # 12-95" maxlength="50">
                                    @error('direccion')
                                        <div class="invalid-feedback">
                                            La direccion no cumple con las características mínimas
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> Teléfono Principal</label>

                                    <input type="text" class="form-control @error('telefono_principal') is-invalid @enderror"
                                        name="telefono_principal" id="telefono_principal" value="{{ $cliente->telefono_principal }}"
                                        placeholder="Ej: 3221233456" maxlength="15" required>
                                    @error('telefono_principal')
                                        <div class="invalid-feedback">
                                            El teléfono principal no cumple con las características mínimas
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text">Teléfono Secundario</label>
                                    <input type="text" class="form-control @error('telefono_secundario') is-invalid @enderror"
                                        name="telefono_secundario" id="telefono_secundario" value="{{!empty($cliente->telefono_secundario) ? $cliente->telefono_secundario:"Sin teléfeno" }}"
                                        placeholder="Ej: 838123347" maxlength="15">
                                    @error('telefono_secundario')
                                        <div class="invalid-feedback">
                                            El teléfono secundario no cumple con las características mínimas
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> Correo</label>
                                    <input type="email" class="form-control @error('correo') is-invalid @enderror"
                                        name="correo" id="correo" value="{{  $cliente->correo }}"
                                        placeholder="Ej: juan.ortega@gmail.com" maxlength="50" autocomplete="new-text"
                                        required>
                                    @error('correo')
                                        <div class="invalid-feedback">
                                            El correo ya se encuentra registrado
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-10 col-lg-8 offset-1">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> Nueva Contraseña</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="password" maxlength="50" value="{{$cliente->password}}" disabled required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fas fa-eye-slash color-azul" id="mostrar-password"></i>
                                            </div>
                                        </div>
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
                                @if ($cliente->autorizacion_correo == 1)
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
        var password = document.getElementById("password");
        var checkbox = document.getElementById("cambiar_password");
        if (checkbox.checked == true) {
            password.disabled = false;
        } else {
            password.disabled = true;
        }
    }
</script>

@endsection
