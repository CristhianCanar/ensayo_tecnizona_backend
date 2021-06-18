@extends('admin.layouts.app')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Gestionar Pedidos</h4>
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
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="max-width: 60px;">#</th>
                                <th scope="col">Empleado</th>
                                <th scope="col">Cuenta Número</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Telefono Entrega</th>
                                <th class="text-right" >Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr>
                                    <th scope="row" style="max-width: 60px;">{{ $loop->iteration }}</th>
                                    <td class="text-truncate" style="max-width: 50px;">{{ $pedido->user->nombre}}</td>
                                    <td class="text-truncate" style="max-width: 300px;">{{ $pedido->AccountNum }}</td>
                                    <td class="text-truncate" style="max-width: 150px;">{{ $pedido->NombreClienteEntrega }}</td>
                                    <td class="text-truncate" style="max-width: 120px;">{{ $pedido->TelefonoEntrega }}</td>
                                    <td class="">
                                        <div class="row float-right" style="font-size: 20px">
                                            <div class="col-4">
                                                <a href="{{ route('pedido.show', $pedido->id_pedido) }}" style="color: #fa8c15;">
                                                    <i class="la icon-eye" data-toggle="tooltip"
                                                        title="Ver pedido"></i>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <form action="{{ route('pedido.destroy', $pedido->id_pedido) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn p-0"
                                                        onclick="return confirm('Seguro que desea eliminar el registro del pedido?')">
                                                        <i class="la icon-trash" data-toggle="tooltip"
                                                            data-placement="top" title="Eliminar pedido" style="font-size: 20px; color: #f44336;"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{ $pedidos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
