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
            <div class="col-10 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <form class="needs-validation" method="POST" action="{{ route('pedido.store') }}"
                                novalidate>
                                @csrf
                                <div class="form-row justify-content-center">
                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> NIT Cliente</label>
                                        <input type="text" class="form-control @error('AccountNum') is-invalid @enderror"
                                            name="AccountNum" id="AccountNum" value="{{ old('AccountNum') }}"
                                            placeholder="12345678-9" maxlength="30" required>
                                        @error('AccountNum')
                                            <div class="invalid-feedback">
                                                El NIT Cliente no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Nombre Cliente Entrega</label>
                                        <input type="text" class="form-control @error('NombreClienteEntrega') is-invalid @enderror"
                                            name="NombreClienteEntrega" id="NombreClienteEntrega" value="{{ old('NombreClienteEntrega') }}"
                                            placeholder="12345678-9" maxlength="100" required>
                                        @error('NombreClienteEntrega')
                                            <div class="invalid-feedback">
                                                El NombreClienteEntrega no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Indentificacion Cliente Entrega</label>
                                        <input type="text" class="form-control @error('ClienteEntrega') is-invalid @enderror"
                                            name="ClienteEntrega" id="ClienteEntrega" value="{{ old('ClienteEntrega') }}"
                                            placeholder="12345678-9" maxlength="30" required>
                                        @error('ClienteEntrega')
                                            <div class="invalid-feedback">
                                                El ClienteEntrega no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Telefono Entrega</label>
                                        <input type="text" class="form-control @error('TelefonoEntrega') is-invalid @enderror"
                                            name="TelefonoEntrega" id="TelefonoEntrega" value="{{ old('TelefonoEntrega') }}"
                                            placeholder="12345678-9" maxlength="30" required>
                                        @error('TelefonoEntrega')
                                            <div class="invalid-feedback">
                                                El TelefonoEntrega no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Direccion Entrega</label>
                                        <input type="text" class="form-control @error('DireccionEntrega') is-invalid @enderror"
                                            name="DireccionEntrega" id="DireccionEntrega" value="{{ old('DireccionEntrega') }}"
                                            placeholder="12345678-9" maxlength="30" required>
                                        @error('DireccionEntrega')
                                            <div class="invalid-feedback">
                                                El DireccionEntrega no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Direccion Entrega</label>
                                        <input type="text" class="form-control @error('DireccionEntrega') is-invalid @enderror"
                                            name="DireccionEntrega" id="DireccionEntrega" value="{{ old('DireccionEntrega') }}"
                                            placeholder="12345678-9" maxlength="30" required>
                                        @error('DireccionEntrega')
                                            <div class="invalid-feedback">
                                                El DireccionEntrega no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Direccion Entrega</label>
                                        <input type="text" class="form-control @error('DireccionEntrega') is-invalid @enderror"
                                            name="DireccionEntrega" id="DireccionEntrega" value="{{ old('DireccionEntrega') }}"
                                            placeholder="12345678-9" maxlength="30" required>
                                        @error('DireccionEntrega')
                                            <div class="invalid-feedback">
                                                El DireccionEntrega no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Direccion Entrega</label>
                                        <input type="text" class="form-control @error('DireccionEntrega') is-invalid @enderror"
                                            name="DireccionEntrega" id="DireccionEntrega" value="{{ old('DireccionEntrega') }}"
                                            placeholder="12345678-9" maxlength="30" required>
                                        @error('DireccionEntrega')
                                            <div class="invalid-feedback">
                                                El DireccionEntrega no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Codigo Deparatamento segun DANE</label>
                                        <input type="text" class="form-control @error('StateId') is-invalid @enderror"
                                            name="StateId" id="StateId" value="{{ old('StateId') }}"
                                            placeholder="12345678-9" maxlength="30" required>
                                        @error('StateId')
                                            <div class="invalid-feedback">
                                                El StateId no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Codigo Municipio segun DANE</label>
                                        <input type="text" class="form-control @error('CountyId') is-invalid @enderror"
                                            name="CountyId" id="CountyId" value="{{ old('CountyId') }}"
                                            placeholder="12345678-9" maxlength="30" required>
                                        @error('CountyId')
                                            <div class="invalid-feedback">
                                                El CountyId no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                        title="Campo Obligatorio">*</span>Recoge en el sitio</label>
                                        <select class="form-control" name="RecogerEnSitio">
                                            <option value="1" selected>Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                        title="Campo Obligatorio">*</span>Entrega Usuario Final</label>
                                        <select class="form-control" name="EntregaUsuarioFinal">
                                            <option value="1" selected>Si</option>
                                            <option value="0">No</option>
                                        </select>
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
