@extends('admin.layouts.app')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Ver Pedido</h4>
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
                <a href="{{ route('pedido.show', $pedido->id_pedido) }}">Ver Pedido</a>
            </li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-row justify-content-center">

                        <div class="form-group col-10 col-lg-8">
                            <h1>Información Pedido</h1>
                        </div>
                        @isset($respuesta_api_mps[0])
                            <div class="form-group col-10 col-lg-8">
                                <label class="form-label" for="text">Número Pedido: </label>
                                <h5>{{ $respuesta_api_mps[0]->pedido }}</h5>
                            </div>
                        @endisset

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Estado Pedido: </label>
                            <h5>{{ $pedido->estado_pedido }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Fecha Pedido: </label>
                            <h5>{{ $pedido->updated_at }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <h1>Información Cliente</h1>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">NIT (Asociado)</label>
                            <h5>{{ $pedido->AccountNum }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Nombre</label>
                            <h5>{{ $pedido->NombreClienteEntrega }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Indentificacion (Cédula de Ciudadania, Cédula Extranjera, otro.)</label>
                            <h5>{{ $pedido->ClienteEntrega }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Teléfono</label>
                            <h5>{{ $pedido->TelefonoEntrega }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Departamento</label>
                            <h5>{{ $departamento->departamento }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Dirección de entrega</label>
                            <h5>{{ $pedido->DireccionEntrega }}</h5>
                        </div>

                        @if ($pedido->RecogerEnSitio)
                            <div class="form-group col-10 col-lg-8">
                                <label class="form-label" for="text">El pedido se recogerá en la empresa</label>
                            </div>
                        @else
                            <div class="form-group col-10 col-lg-8">
                                <label class="form-label" for="text">El pedido se enviará a la dirección del Cliente</label>
                            </div>
                        @endif

                        <div class="form-row text-center mt-4 col-10 col-lg-8">
                            <div class="col-12">
                                <h4>Mi pedido</h4>
                            </div>
                        </div>

                        <div class="form-group table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Referencia</th>
                                        <th scope="col">Nombre</th>
                                        <th class="text-center">Cantidad</th>
                                        <th scope="col" class="text-right">Precio</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_pedido">
                                    @foreach ($lista_pedido as $producto)
                                    <tr>
                                        <td class="text-truncate">{{ $producto->PartNum }}</td>
                                        <td class="text-truncate" style="max-width: 450px;" data-toggle="tooltip" title="{{ $producto->Name }}">{{ $producto->Name }}</td>
                                        <td class="text-center">{{ $producto->Cantidad }}</td>
                                        <td class="text-truncate">$ {{ $producto->Precio }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
