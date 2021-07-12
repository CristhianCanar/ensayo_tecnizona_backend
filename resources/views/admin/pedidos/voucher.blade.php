@extends('admin.layouts.app')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Ver Voucher</h4>
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
                <a href="{{ route('pedido.index') }}">Pedidos</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('pedido.show', $pedido->id_pedido) }}">Ver Voucher</a>
            </li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-row @if ($pedido->estado_pedido == "Realizado")
                                            voucher-fondo-exitoso
                                         @elseif($pedido->estado_pedido == "Pendiente")
                                             voucher-fondo-pendiente
                                         @elseif($pedido->estado_pedido == "Fallido")
                                             voucher-fondo-fallido
                                         @endif">
                        <div class="col-12 mt-4 text-center">
                            @if ($pedido->estado_pedido == "Realizado")
                                <h1>Pedido realizado con Éxito!</h1>
                                <h4>{{$pedido->created_at}}</h4>
                                <h4>Número de Pedido: {{$respuesta_api_mps->pedido}}</h4>
                            @elseif($pedido->estado_pedido == "Pendiente")
                                <h1>Pedido Pendiente!</h1>
                                <h4>Ultimo intento: {{$pedido->created_at}}</h4>

                            @elseif($pedido->estado_pedido == "Fallido")
                                <h1>Pedido Fallido</h1>
                                <h4>{{$pedido->created_at}}</h4>

                            @endif
                        </div>
                    </div>

                    <div class="form-row justify-content-center text-center">
                        <div class="form-group col-10 col-lg-8">
                            <h1>Información Cliente</h1>
                        </div>
                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Nombre</label>
                            <h5>{{ $pedido->NombreClienteEntrega }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Indentificación (Cédula de Ciudadania, Cédula Extranjera, otro.)</label>
                            <h5>{{ $pedido->ClienteEntrega }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Teléfono</label>
                            <h5>{{ $pedido->TelefonoEntrega }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Dirección</label>
                            <h5>{{ $pedido->DireccionEntrega }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
