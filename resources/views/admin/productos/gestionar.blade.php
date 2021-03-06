@extends('admin.layouts.app')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Gestionar Productos</h4>
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
                                <th scope="col">Referencia</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Familia</th>
                                <th scope="col">Marca</th>
                                <th class="text-right" >Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <th scope="row" style="max-width: 60px;">{{ $loop->iteration }}</th>
                                    <td class="text-truncate" style="max-width: 50px;">{{ $producto->PartNum }}</td>
                                    <td class="text-truncate" style="max-width: 300px;">{{ $producto->Name }}</td>
                                    <td class="text-truncate" style="max-width: 150px;">{{ $producto->Familia }}</td>
                                    <td class="text-truncate" style="max-width: 120px;">{{ $producto->Marks }}</td>
                                    <td class="">
                                        <div class="row float-right" style="font-size: 20px">
                                            <div class="col-4">
                                                <a href="{{ route('producto.show', $producto->id_producto) }}" style="color: #fa8c15;">
                                                    <i class="la icon-eye" data-toggle="tooltip"
                                                        title="Ver producto"></i>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="{{ route('producto.edit', $producto->id_producto) }}" style="color: #2c3e50;">
                                                    <i class="la icon-pencil" data-toggle="tooltip"
                                                        title="Modificar producto"></i>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <form action="{{ route('producto.destroy', $producto->id_producto) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn p-0"
                                                        onclick="return confirm('Seguro que desea eliminar el registro del Producto?')">
                                                        <i class="la icon-trash" data-toggle="tooltip"
                                                            data-placement="top" title="Eliminar producto" style="font-size: 20px; color: #f44336;"></i>
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
                        {{ $productos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
