@extends('admin.layouts.app')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Gestionar Permisos Usuarios</h4>
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
                <a href="{{ route('user_gestionar_permisos') }}">Permisos Usuarios</a>
            </li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="table-header">
                            <tr>
                                <th>Modulo</th>
                                @foreach($roles as $rol)
                                <th class="text-center">{{$rol->rol}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="table-body" id="roles_profiles">

                            <tr>
                                <td class="align-bottom">
                                    <div class="row">

                                            <div class="col-lg-1">
                                                <i class=""></i>
                                            </div>
                                            <div class="col-lg-8">
                                                <h6>Tablero</h6>
                                            </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-orange">
                                        <input type="checkbox" name="_" id="_" value="|"

                                                    checked
                                        >
                                        <label for="_">
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
