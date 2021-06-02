@extends('admin.layouts.app')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Ver Producto</h4>
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
                <a href="{{ route('producto.index') }}">Productos</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('producto.show', $producto->id_producto) }}">Ver Producto</a>
            </li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Referencia</label>
                            <h5>{{ $producto->PartNum }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Familia</label>
                            <h5>{{ $producto->Familia }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Categoria</label>
                            <h5>{{ $producto->Categoria }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Nombre</label>
                            <h5>{{ $producto->Name }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Descripción</label>
                            <h5>{{ $producto->Description }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Marca</label>
                            <h5>{{ $producto->Marks }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Moneda</label>
                            <h5>{{ $producto->CurrencyDef }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Precio minimo del producto</label>
                            <h5>{{ $producto->Salesminprice }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Precio máximo del producto</label>
                            <h5>{{ $producto->Salesmaxprice }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Precio</label>
                            <h5>{{ $producto->precio }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Cantidad</label>
                            <h5>{{ $producto->Quantity }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Clasificación Tributaria</label>
                            <h5>{{ $producto->TributariClassification }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Nombre Imagen</label>
                            <h5>{{ $producto->NombreImagen }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Descuento</label>
                            <h5>{{ $producto->Descuento }}</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Shipping</label>
                            <h5>-1</h5>
                        </div>

                        <div class="form-group col-10 col-lg-8">
                            <label class="form-label" for="text">Sku</label>
                            <h5>{{ $producto->Sku }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
