@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Registrar Producto</h4>
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
                    <a href="{{ route('producto.index') }}">Productos</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('producto.create') }}">Registrar Producto</a>
                </li>
            </ul>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <form class="needs-validation" method="POST" action="{{ route('producto.store') }}"
                                novalidate>
                                @csrf
                                <div class="form-row justify-content-center">
                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Referencia</label>
                                        <input type="text" class="form-control @error('PartNum') is-invalid @enderror"
                                            name="PartNum" id="PartNum" value="{{ old('PartNum') }}"
                                            placeholder="REF123" maxlength="80" required>
                                        @error('PartNum')
                                            <div class="invalid-feedback">
                                                La referencia no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Familia</label>
                                        <input type="text" class="form-control @error('Familia') is-invalid @enderror"
                                            name="Familia" id="Familia" value="{{ old('Familia') }}"
                                            placeholder="SERVIDORES" maxlength="80" required>
                                        @error('Familia')
                                            <div class="invalid-feedback">
                                                El campo de familia no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Categoria</label>
                                        <input type="text" class="form-control @error('Categoria') is-invalid @enderror"
                                            name="Categoria" id="Categoria" value="{{ old('Categoria') }}"
                                            placeholder="Accesorios Servidores" maxlength="80" required>
                                        @error('Categoria')
                                            <div class="invalid-feedback">
                                                La categoria no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Nombre</label>
                                        <textarea class="form-control @error('Name') is-invalid @enderror" name="Name"
                                            id="Name" cols="10" rows="5">{{ old('Name') }}</textarea>
                                        @error('Name')
                                            <div class="invalid-feedback">
                                                El nombre no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Descripción</label>
                                        <textarea class="form-control @error('Description') is-invalid @enderror" name="Description"
                                            id="Description" cols="10" rows="10">{{ old('Description') }}</textarea>
                                        @error('Description')
                                            <div class="invalid-feedback">
                                                La descripción no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Marca</label>
                                        <input type="text" class="form-control @error('Marks') is-invalid @enderror"
                                        name="Marks" id="Marks" value="{{ old('Marks') }}"
                                        placeholder="ACER" maxlength="80" required>
                                        @error('Marks')
                                            <div class="invalid-feedback">
                                                La marca no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Moneda</label>
                                        <input type="text" step="0.01" class="form-control @error('CurrencyDef') is-invalid @enderror"
                                            name="CurrencyDef" id="CurrencyDef" value="{{ old('CurrencyDef') }}"
                                            placeholder="COP" maxlength="3" required>
                                        @error('CurrencyDef')
                                            <div class="invalid-feedback">
                                                La moneda de cambio no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Precio minimo del producto</label>
                                        <input type="number" step="0.01" class="form-control @error('Salesminprice') is-invalid @enderror"
                                            name="Salesminprice" id="Salesminprice" value="{{ old('Salesminprice') }}"
                                            placeholder="$-" required>
                                        @error('Salesminprice')
                                            <div class="invalid-feedback">
                                                El precio minimo no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Precio máximo del producto</label>
                                        <input type="number" step="0.01" class="form-control @error('Salesmaxprice') is-invalid @enderror"
                                            name="Salesmaxprice" id="Salesmaxprice" value="{{ old('Salesmaxprice') }}"
                                            placeholder="$+" required>
                                        @error('Salesmaxprice')
                                            <div class="invalid-feedback">
                                                El precio máximo no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>



                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Precio</label>
                                        <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror"
                                            name="precio" id="precio" value="{{ old('precio') }}"
                                            placeholder="$" required>
                                        @error('precio')
                                            <div class="invalid-feedback">
                                                El precio no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Cantidad</label>
                                        <input type="number" class="form-control @error('Quantity') is-invalid @enderror"
                                            name="Quantity" id="Quantity" value="{{ old('Quantity') }}"
                                            placeholder="1" min="0" max="9999" required>
                                        @error('Quantity')
                                            <div class="invalid-feedback">
                                                La cantidad de cambio no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Clasificación Tributaria</label>
                                        <input type="text" class="form-control @error('TributariClassification') is-invalid @enderror"
                                            name="TributariClassification" id="TributariClassification" value="{{ old('TributariClassification') }}"
                                            placeholder="GRAVADO" maxlength="20" required>
                                        @error('TributariClassification')
                                            <div class="invalid-feedback">
                                                La clasificación tributaria no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Nombre Imagen</label>
                                        <input type="text" class="form-control @error('NombreImagen') is-invalid @enderror"
                                            name="NombreImagen" id="NombreImagen" value="{{ old('NombreImagen') }}"
                                            placeholder="abc001.jpg" maxlength="200" required>
                                        @error('NombreImagen')
                                            <div class="invalid-feedback">
                                                Nombre Imagen no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Descuento</label>
                                        <input type="number" step="0.01" class="form-control @error('Descuento') is-invalid @enderror"
                                            name="Descuento" id="Descuento" value="{{ old('Descuento') }}"
                                            placeholder="$%" min="0" required>
                                        @error('Descuento')
                                            <div class="invalid-feedback">
                                                El Descuento no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Shipping</label>
                                        <input class="form-control " value="-1" disabled>
                                        <input type="hidden" class="form-control @error('shipping') is-invalid @enderror"
                                            name="shipping" id="shipping" value="-1">
                                        @error('shipping')
                                            <div class="invalid-feedback">
                                                El shipping no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Sku</label>
                                        <input type="text" class="form-control @error('Sku') is-invalid @enderror"
                                            name="Sku" id="Sku" value="{{ old('Sku') }}"
                                            placeholder="01CV760" maxlength="25" required>
                                        @error('Sku')
                                            <div class="invalid-feedback">
                                                El Sku no cumple con las características mínimas
                                            </div>
                                        @enderror
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
