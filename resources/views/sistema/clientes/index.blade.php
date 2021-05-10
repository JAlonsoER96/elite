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
                                <td width="7%"> {{$item->idCliente}} </td>
                                <td width="13.28%"> {{$item->cliente}} </td>
                                <td width="13.28%">
                                    <a href="{{ URL::action('ClienteController@generarCuestionario',['id'=>$item->idCliente])}}" target="_blank">
                                        Descargar
                                    </a>
                                </td>
                                <td width="13.28%"> {{$item->telefono}} <br>{{$item->email}} </td>
                                <td width="13.28%"> {{$item->ultimo}} </td>
                                <td width="13.28%">Por programar</td>
                                <td>
                                    <img src="{{ asset('archivos/'.$item->foto) }}" height="110" width="110">
                                </td>
                                <td width="13.28%">
                                    @if($item->deleted_at=="")
                                    <a href="{{URL::action('ClienteController@obtenerPorId',['id'=>$item->idCliente])}}">
                                        <button class="btn btn-info btn-raised btn-sm">Ver</button>
                                    </a>
                                    <a href="{{URL::action('ClienteController@eliminacionLogica',['id'=>$item->idCliente])}}">
                                        <button class="btn btn-warning btn-raised btn-sm">Suspender</button>
                                    </a>
                                    @else
                                    <a href="{{URL::action('ClienteController@restore',['id'=>$item->idCliente])}}">
                                      <button class="btn-success btn-raised btn-sm">Restaurar</button>
                                    </a>
                                    <a href="{{URL::action('ClienteController@delete',['id'=>$item->idCliente])}}">
                                        <button class="btn-danger btn-raised btn-sm">Eliminar</button>
                                    </a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p style="text-align: center">
                <a href="{{URL::action('ClienteController@formAlta')}}"><button class="btn btn-success btn-raised">Agregar Nuevo</button></a>
            </p>
        </div>
    </div>
</div>
@endsection
