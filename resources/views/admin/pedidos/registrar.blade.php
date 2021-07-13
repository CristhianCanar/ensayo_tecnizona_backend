@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Registrar pedido</h4>
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
                    <a href="{{ route('pedido.index') }}">Pedidos</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pedido.create') }}">Registrar Pedido</a>
                </li>
            </ul>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('pedido.store') }}" novalidate>
                            @csrf
                            <div class="form-row justify-content-center">
                                <div class="form-group col-10 col-lg-8">
                                    <h1>Información Cliente</h1>
                                </div>
                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> NIT (Asociado)
                                            </label>
                                    <input class="form-control" value="900593363" disabled>
                                    <input type="hidden" class="form-control"
                                        name="AccountNum" id="AccountNum" value="900593363">
                                </div>

                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> Nombre</label>
                                    <input type="text"
                                        class="form-control @error('NombreClienteEntrega') is-invalid @enderror"
                                        name="NombreClienteEntrega" id="NombreClienteEntrega"
                                        value="{{ old('NombreClienteEntrega') }}" placeholder="Juan Perez"
                                        maxlength="100" autofocus  required>
                                    @error('NombreClienteEntrega')
                                        <div class="invalid-feedback">
                                            El Nombre Cliente Entrega no cumple con las características mínimas
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> Indentificacion (Cédula de Ciudadania, Cédula Extranjera, otro.)</label>
                                    <input type="text"
                                        class="form-control @error('ClienteEntrega') is-invalid @enderror"
                                        name="ClienteEntrega" id="ClienteEntrega" value="{{ old('ClienteEntrega') }}"
                                        placeholder="1061812345" maxlength="12"  required>
                                    @error('ClienteEntrega')
                                        <div class="invalid-feedback">
                                            El Cliente Entrega no cumple con las características mínimas
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> Teléfono</label>
                                    <input type="number" min="1" max="99999999"
                                        class="form-control @error('TelefonoEntrega') is-invalid @enderror"
                                        name="TelefonoEntrega" id="TelefonoEntrega"
                                        value="{{ old('TelefonoEntrega') }}" placeholder="3221234567"
                                         required>
                                    @error('TelefonoEntrega')
                                        <div class="invalid-feedback">
                                            El Telefono Entrega no cumple con las características mínimas
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-10 col-lg-8">
                                    <label for="StateId" class="form-label"><span class="obligatorio"
                                            data-toggle="tooltip" title="Campo Obligatorio">*</span>
                                        Departamento</label>
                                    <select id="StateId" name="StateId"
                                        class="custom-select @error('StateId') is-invalid @enderror" autofocus  required>
                                        <option value="" selected disabled> Seleccione Departamento</option>
                                        @foreach ($departamentos as $departamento)
                                            <option value="{{ $departamento->id_departamento }}">
                                                {{ $departamento->departamento }}</option>
                                        @endforeach
                                    </select>
                                    @error('StateId')
                                        <div class="invalid-feedback">
                                            Selecciona un Departamento
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-10 col-lg-8">
                                    <label for="CountyId" class="form-label"><span class="obligatorio"
                                            data-toggle="tooltip" title="Campo Obligatorio">*</span> Municipio</label>
                                    <select class="custom-select" name="CountyId" id="CountyId"
                                        src="{{ route('pedido.getmunicipio', '#') }}" required>
                                        <option value="" selected disabled> Seleccione Municipio</option>
                                    </select>
                                    @error('CountyId')
                                        <div class="invalid-feedback">
                                            Selecciona un Municipio
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> Dirección de entrega</label>
                                    <input type="text"
                                        class="form-control @error('DireccionEntrega') is-invalid @enderror"
                                        name="DireccionEntrega" id="DireccionEntrega"
                                        value="{{ old('DireccionEntrega') }}"
                                        placeholder="Calle 9 # 1-23 Barrio Nuevo" maxlength="30"  required>
                                    @error('DireccionEntrega')
                                        <div class="invalid-feedback">
                                            El Direccion Entrega no cumple con las características mínimas
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-10 col-lg-8">
                                    <label class="form-label" for="text"><span data-toggle="tooltip"
                                            title="Campo Obligatorio">*</span> El cliente recoge el pedido en la empresa</label>
                                    <select class="form-control" name="RecogerEnSitio" required>
                                        <option value="1">Si</option>
                                        <option value="0" selected>No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row text-center align-items-center mt-4">
                                <div class="col-6 float-left">
                                    <h1>Productos</h1>
                                </div>
                                <div class="col-5">
                                    <div class="row align-items-center">
                                        <div class="col-9 p-0">
                                            <input type="text" class="form-control form-control-sm" id="buscar_producto" placeholder="Escriba codigo ref.">
                                        </div>
                                        <div class="col-1 p-0 ml-2">
                                            <a style="color: #fa8c15; cursor: pointer;" onclick="buscar_producto( '{{route('buscar_producto')}}')">
                                                <i class="fa fa-search search-icon" data-toggle="tooltip"
                                                    title="Buscar producto" ></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row text-center mt-4">
                                <div class="col-12">
                                    <h4>Lista de productos similares</h4>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="form-group" id="contenedor_res_buscador">
                                </div>
                            </div>

                            <div class="form-row justify-content-center">
                                <div class="form-group table-responsive">
                                    <table class="table table-hover">
                                        <thead id="thead_buscador">

                                        </thead>
                                        <tbody id="tbody_buscador">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="form-row text-center mt-4">
                                <div class="col-12">
                                    <h4>Mi pedido</h4>
                                </div>
                            </div>

                            <div class="form-row justify-content-center">
                                <div class="form-group table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th style="max-width: 60px;">#</th>
                                                <th scope="col">Referencia</th>
                                                <th scope="col">Nombre</th>
                                                <th class="text-center">Cantidad</th>
                                                <th scope="col">Precio</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody_pedido">

                                        </tbody>
                                        <tfoot>
                                            <!--
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <th>Subtotal</th>
                                                <td class="p-0 m-0 text-right" style="max-width: 150px; width:200px;">$ 1'200.000</td>
                                            </tr>
                                            -->
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <th>Total</th>
                                                <td class="p-0 m-0 text-right" style="max-width: 150px; width:200px;" id="tfoot_total">$ 0.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="form-row justify-content-center">
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
<script>

/* municipios */
$("#StateId").on('change', function() {
    $("#CountyId").empty();

    if ($(this).val().length == 0) {
        return false;
    } else {
        $("#CountyId")
            .load($("#CountyId").attr('src').replace('#', $(this).val()), function() {
                $("#CountyId").prepend($("<option/>").attr({
                    selected: true,
                    disabled: true
                }).html('Seleccione Municipio'))
            });
    }
});
</script>
@endsection
