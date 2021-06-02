@extends('admin.layouts.app')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Ver Cliente</h4>
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
                <a href="{{ route('cliente.show', $cliente->id_cliente) }}">Ver Cliente</a>
            </li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Nombres</label>
                            <h5>{{ $cliente->nombre }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Dirección</label>
                            <h5>{{!empty($cliente->direccion) ? $cliente->direccion:"Sin dirección registrada" }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Teléfono Principal</label>
                            <h5>{{ $cliente->telefono_principal }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Teléfono Secundario</label>
                            <h5>{{!empty($cliente->telefono_secundario) ? $cliente->telefono_secundario:"Sin teléfeno" }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text"> Correo</label>
                            <h5>{{  $cliente->correo }}</h5>
                        </div>

                        @if ($cliente->autorizacion_correo == 1)
                            <div class="form-group col-10 col-lg-8 custom-control custom-checkbox" style="cursor: context-menu">
                                <input type="checkbox" class="custom-control-input " id="autorizacion_correo" name="autorizacion_correo" checked disabled>
                                <label class="custom-control-label float-left ml-3" for="autorizacion_correo">Inscrito en la lista de correos</label>
                            </div>
                        @else
                            <div class="form-group col-10 col-lg-8 custom-control custom-checkbox" style="cursor: context-menu">
                                <input type="checkbox" class="custom-control-input " id="autorizacion_correo" name="autorizacion_correo" disabled>
                                <label class="custom-control-label float-left ml-3" for="autorizacion_correo">Inscrito en la lista de correos</label>
                            </div>
                        @endif

                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
