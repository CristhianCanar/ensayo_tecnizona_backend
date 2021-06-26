@extends('admin.layouts.app')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Ver Boucher</h4>
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
                <a href="{{ route('pedido.show', $pedido->id_pedido) }}">Ver Boucher</a>
            </li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-row justify-content-center">
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
                            <label class="form-label" for="text">Descripción</label>
                            <h5>{{ $pedido->respuesta_api_mps }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Marca</label>
                            <h5>{{ $pedido->Marks }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Moneda</label>
                            <h5>{{ $pedido->CurrencyDef }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Precio minimo del pedido</label>
                            <h5>{{ $pedido->Salesminprice }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Precio máximo del pedido</label>
                            <h5>{{ $pedido->Salesmaxprice }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Precio</label>
                            <h5>{{ $pedido->precio }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Cantidad</label>
                            <h5>{{ $pedido->Quantity }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Clasificación Tributaria</label>
                            <h5>{{ $pedido->TributariClassification }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Nombre Imagen</label>
                            <h5>{{ $pedido->NombreImagen }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Descuento</label>
                            <h5>{{ $pedido->Descuento }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Shipping</label>
                            <h5>-1</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Sku</label>
                            <h5>{{ $pedido->Sku }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
