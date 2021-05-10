@extends('sistema.template')
@section('titulo')
Clientes
@endsection
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="col-sm-12 col-md-6 col-lg-8">
            <h1 class="text-titles"><i class="zmdi zmdi-accounts-list-alt"></i> <b>Listado clientes</b></small></h1>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <form action="{{ route('clientes') }}" method="get" role="search" autocomplete="off">
                <div class="form-group">
                    <input class="form-control" type="text" name="searchText" value="{{ $searchText }}">
                    <button class="btn btn-info btn-raised btn-sm" type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="myTabContent" class="tab-content">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>No. Registro</th>
                        <th>Nombre</th>
                        <th>Cuestionario</th>
                        <th>Teléfono y Correo</th>
                        <th>Último pago</th>
                        <th>Siguiente pago</th>
                        <th>Foto</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $item)
                            <tr>
                                <td> {{$item->idCliente}} </td>
                                <td> {{$item->cliente}} </td>
                                <td>
                                    <a href="{{$item->cuestionario}}">Descargar</a>
                                </td>
                                <td> {{$item->telefono}} <br>{{$item->email}} </td>
                                <td> {{$item->ultimo}} </td>
                                <td>Por programar</td>
                                <td> {{$item->foto}}</td>
                                <td>
                                    <button class="btn btn-info btn-raised btn-sm" style="color: black;">Ver</button>
                                    <button class="btn btn-danger btn-raised btn-sm">Bloquear</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
