@extends('sistema.template')
@section('titulo')
Editar registro
@endsection
@section('content')
<div class="container-fluid">
    <div class="page-header">
      <h1 class="text-titles"><i class="zmdi zmdi-font zmdi-hc-fw"></i><b>Cliente {{$cliente->nombre}}</b></h1>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="new">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1">
                                <form action="{{ route('saveUpdatesCliente') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                    @csrf

                                    <div class="form-group label-floating">
                                        <label class="control-label" style="color: black;">Registro</label>
                                        <input class="form-control" type="text" name="id" value="{{$cliente->id}}" readonly="readonly">
                                    </div>
                                    @if($errors->first('nombre'))
                                        <div class="alert alert-danger" role="alert">
                                            <i> {{ $errors->first('nombre') }} </i>
                                        </div>
                                    @endif
                                    <div class="form-group label-floating">
                                        <label class="control-label" style="color: black;">Nombre Completo</label>
                                        <input class="form-control" type="text" name="nombre" value="{{$cliente->nombre}}">
                                    </div>
                                    @if($errors->first('edad'))
                                        <div class="alert alert-danger" role="alert">
                                            <i> {{ $errors->first('edad') }} </i>
                                        </div>
                                    @endif
                                    <div class="form-group label-floating">
                                        <label class="control-label" style="color: black;">Edad</label>
                                        <input class="form-control" type="text" name="edad" value="{{$cliente->edad}}">
                                    </div>

                                    <div class="form-group label-floating">
                                        <label style="color: black;">Fecha nacimiento</label>
                                        <input class="form-control" type="date" name="fecha_nacimiento" value="{{$cliente->fecha_nacimiento}}">
                                    </div>
                                    @if($errors->first('sexo'))
                                        <div class="alert alert-danger" role="alert">
                                            <i> {{ $errors->first('sexo') }} </i>
                                        </div>
                                    @endif
                                    <div class="form-group label-floating">
                                        <label class="control-label" style="color: black;">Sexo</label>
                                        @if ($cliente->sexo=='H')
                                            <input type="radio" name="sexo" value="M">M
                                            <input checked type="radio" name="sexo" value="H">H
                                        @else
                                            <input checked type="radio" name="sexo" value="M">M
                                            <input type="radio" name="sexo" value="H">H
                                        @endif
                                    </div>
                                    @if($errors->first('direccion'))
                                        <div class="alert alert-danger" role="alert">
                                            <i> {{ $errors->first('direccion') }} </i>
                                        </div>
                                    @endif
                                    <div class="form-group label-floating">
                                        <label class="control-label" style="color: black;">Dirección</label>
                                        <input class="form-control" type="text" name="direccion" value="{{$cliente->direccion}}">
                                    </div>
                                    @if($errors->first('telefono'))
                                        <div class="alert alert-danger" role="alert">
                                            <i> {{ $errors->first('telefono') }} </i>
                                        </div>
                                    @endif
                                    <div class="form-group label-floating">
                                        <label class="control-label" style="color: black;">Teléfono</label>
                                        <input class="form-control" type="text" name="telefono" value="{{$cliente->telefono}}">
                                    </div>
                                    @if($errors->first('email'))
                                        <div class="alert alert-danger" role="alert">
                                            <i> {{ $errors->first('email') }} </i>
                                        </div>
                                    @endif
                                    <div class="form-group label-floating">
                                        <label class="control-label" style="color: black;">Email</label>
                                        <input class="form-control" type="text" name="email" value="{{$cliente->email}}">
                                    </div>
                                    @if($errors->first('ocupacion'))
                                        <div class="alert alert-danger" role="alert">
                                            <i> {{ $errors->first('ocupacion') }} </i>
                                        </div>
                                    @endif
                                    <div class="form-group label-floating">
                                        <label class="control-label" style="color: black;">Ocupación</label>
                                        <input class="form-control" type="text" name="ocupacion" value="{{$cliente->ocupacion}}">
                                    </div>
                                    @if($errors->first('foto'))
                                        <div class="alert alert-danger" role="alert">
                                            <i> {{ $errors->first('foto') }} </i>
                                        </div>
                                    @endif
                                    <div class="form-group label-floating">
                                        <img src = "{{asset('archivos/'.$cliente->foto)}}" height =100 width=100><br>
                                        <i class="zmdi zmdi-camera-add" style="font-size: 48px;"></i>
                                        <input class="form-control" type="file" name="foto"><br>
                                        Seleccione Foto
                                    </div>
                                    <br>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Cuestionario de salud</h3>
                                            @if($errors->first('cronica'))
                                                <div class="alert alert-danger" role="alert">
                                                    <i> {{ $errors->first('cronica') }} </i>
                                                </div>
                                            @endif
                                            <div class="form-group label-floating">
                                                <label class="control-label" style="color: black;">¿Padece alguna enfermedad cronica?</label>
                                                @if ($cliente->enfermedad_cronica ==1)
                                                <input checked type="radio" name="cronica" value="1">Si
                                                <input type="radio" name="cronica" value="0">No
                                                @else
                                                <input type="radio" name="cronica" value="1">Si
                                                <input checked type="radio" name="cronica" value="0">No
                                                @endif
                                            </div>
                                            @if($errors->first('respiratoria'))
                                                <div class="alert alert-danger" role="alert">
                                                    <i> {{ $errors->first('respiratoria') }} </i>
                                                </div>
                                            @endif
                                            <div class="form-group label-floating">
                                                <label class="control-label" style="color: black;">¿Padece alguna enfermedad respiratoria?</label>
                                                @if ($cliente->enfermedad_respiratoria ==1)
                                                <input checked type="radio" name="respiratoria" value="1">Si
                                                <input type="radio" name="respiratoria" value="0">No
                                                @else
                                                <input type="radio" name="respiratoria" value="1">Si
                                                <input checked type="radio" name="respiratoria" value="0">No
                                                @endif
                                            </div>
                                            @if($errors->first('impedimento'))
                                                <div class="alert alert-danger" role="alert">
                                                    <i> {{ $errors->first('impedimento') }} </i>
                                                </div>
                                            @endif
                                            <div class="form-group label-floating">
                                                <label class="control-label" style="color: black;">¿Padece alguna enfermedad que le impida practicar ejercicio?</label>
                                                @if ($cliente->impedimento_fisico ==1)
                                                <input checked type="radio" name="impedimento" value="1">Si
                                                <input type="radio" name="impedimento" value="0">No
                                                @else
                                                <input type="radio" name="impedimento" value="1">Si
                                                <input checked type="radio" name="impedimento" value="0">No
                                                @endif

                                            </div>
                                            @if($errors->first('cardiovascular'))
                                                <div class="alert alert-danger" role="alert">
                                                    <i> {{ $errors->first('cardiovascular') }} </i>
                                                </div>
                                            @endif
                                            <div class="form-group label-floating">
                                                <label class="control-label" style="color: black;">¿Padece alguna enfermedad cardiovascular ?</label>
                                                @if ($cliente->enfermedad_cardiovascular ==1)
                                                <input checked type="radio" name="cardiovascular" value="1">Si
                                                <input type="radio" name="cardiovascular" value="0">No
                                                @else
                                                <input type="radio" name="cardiovascular" value="1">Si
                                                <input checked type="radio" name="cardiovascular" value="0">No
                                                @endif

                                            </div>
                                            @if($errors->first('lesion'))
                                                <div class="alert alert-danger" role="alert">
                                                    <i> {{ $errors->first('lesion') }} </i>
                                                </div>
                                            @endif
                                            <div class="form-group label-floating">
                                                <label class="control-label" style="color: black;">¿Ha tenido alguna lesión muscular en los ultimos 3 meses?</label>
                                                @if ($cliente->lesion_muscular ==1)
                                                <input checked type="radio" name="lesion" value="1">Si
                                                <input type="radio" name="lesion" value="0">No
                                                @else
                                                <input type="radio" name="lesion" value="1">Si
                                                <input checked type="radio" name="lesion" value="0">No
                                                @endif
                                            </div>
                                            @if($errors->first('osea'))
                                                <div class="alert alert-danger" role="alert">
                                                    <i> {{ $errors->first('osea') }} </i>
                                                </div>
                                            @endif
                                            <div class="form-group label-floating">
                                                <label class="control-label" style="color: black;">¿Ha tenido alguna lesión osea ?</label>
                                                @if ($cliente->lesion_osea ==1)
                                                <input checked type="radio" name="osea" value="1">Si
                                                <input type="radio" name="osea" value="0">No
                                                @else
                                                <input type="radio" name="osea" value="1">Si
                                                <input checked type="radio" name="osea" value="0">No
                                                @endif
                                            </div>
                                            @if($errors->first('salud'))
                                                <div class="alert alert-danger" role="alert">
                                                    <i> {{ $errors->first('salud') }} </i>
                                                </div>
                                            @endif
                                            <div class="form-group label-floating">
                                                <label class="control-label" style="color: black;">¿Como considera su estado de salud ?</label>
                                                @if ($cliente->estado_salud=="Bueno")
                                                <input checked type="radio" name="salud" value="Bueno">Bueno
                                                <input type="radio" name="salud" value="Malo">Malo
                                                <input type="radio" name="salud" value="Regular">Regular
                                                @endif
                                                @if ($cliente->estado_salud=="Malo")
                                                <input type="radio" name="salud" value="Bueno">Bueno
                                                <input checked type="radio" name="salud" value="Malo">Malo
                                                <input type="radio" name="salud" value="Regular">Regular
                                                @endif
                                                @if ($cliente->estado_salud=="Regular")
                                                <input type="radio" name="salud" value="Bueno">Bueno
                                                <input type="radio" name="salud" value="Malo">Malo
                                                <input checked type="radio" name="salud" value="Regular">Regular
                                                @endif
                                            </div>
                                            <input type="hidden" name="idCuest" value="{{$cliente->idCuest}}">
                                        </div>
                                    </div>
                                    <p class="text-center">
                                        <button class="btn btn-info btn-raised btn-md"><i class="zmdi zmdi-floppy"></i> Guardar</button>
                                    </p>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
