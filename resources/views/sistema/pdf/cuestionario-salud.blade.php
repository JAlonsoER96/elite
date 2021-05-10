<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Cuestionario salud</title>
</head>
<body>
    <div class="container-fluid">
        <table class="table">
            <tbody>
                <tr>
                    <td width="25%">
                        <img src="{{public_path('archivos/'.$data->foto)}}" alt="" height="170" width="150">
                    </td>
                    <td width="75%">
                        Nombre: {{$data->cliente}}
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="card">
            <div class="card-header">
              Cuestionario de Salud
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group label-floating">
                    <label class="control-label" style="color: black;">¿Padece alguna enfermedad cronica?</label><br>
                    @if ($data->enfermedad_cronica ==1)
                        <input checked type="radio" name="cronica" value="1">Si
                        <input type="radio" name="cronica" value="0">No
                    @else
                        <input type="radio" name="cronica" value="1">Si
                        <input checked type="radio" name="cronica" value="0">No
                    @endif
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" style="color: black;">¿Padece alguna enfermedad respiratoria?</label><br>
                    @if ($data->enfermedad_respiratoria ==1)
                        <input checked type="radio" name="cronica" value="1">Si
                        <input type="radio" name="cronica" value="0">No
                    @else
                        <input type="radio" name="cronica" value="1">Si
                        <input checked type="radio" name="cronica" value="0">No
                    @endif
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" style="color: black;">¿Padece alguna enfermedad que le impida practicar ejercicio?</label><br>
                    @if ($data->impedimento_fisico ==1)
                        <input checked type="radio" name="cronica" value="1">Si
                        <input type="radio" name="cronica" value="0">No
                    @else
                        <input type="radio" name="cronica" value="1">Si
                        <input checked type="radio" name="cronica" value="0">No
                    @endif
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" style="color: black;">¿Padece alguna enfermedad cardiovascular ?</label><br>
                    @if ($data->enfermedad_cardiovascular ==1)
                        <input checked type="radio" name="cronica" value="1">Si
                        <input type="radio" name="cronica" value="0">No
                    @else
                        <input type="radio" name="cronica" value="1">Si
                        <input checked type="radio" name="cronica" value="0">No
                    @endif
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" style="color: black;">¿Ha tenido alguna lesión muscular en los ultimos 3 meses?</label><br>
                    @if ($data->lesion_muscular ==1)
                        <input checked type="radio" name="cronica" value="1">Si
                        <input type="radio" name="cronica" value="0">No
                    @else
                        <input type="radio" name="cronica" value="1">Si
                        <input checked type="radio" name="cronica" value="0">No
                    @endif
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" style="color: black;">¿Ha tenido alguna lesión osea ?</label><br>
                    @if ($data->lesion_osea ==1)
                        <input checked type="radio" name="cronica" value="1">Si
                        <input type="radio" name="cronica" value="0">No
                    @else
                        <input type="radio" name="cronica" value="1">Si
                        <input checked type="radio" name="cronica" value="0">No
                    @endif
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" style="color: black;">¿Como considera su estado de salud ?</label><br>
                    @if ($data->estado_salud=="Bueno")
                    <input checked type="radio" name="salud" value="Bueno">Bueno
                    <input type="radio" name="salud" value="Malo">Malo
                    <input type="radio" name="salud" value="Regular">Regular
                    @endif
                    @if ($data->estado_salud=="Malo")
                    <input type="radio" name="salud" value="Bueno">Bueno
                    <input checked type="radio" name="salud" value="Malo">Malo
                    <input type="radio" name="salud" value="Regular">Regular
                    @endif
                    @if ($data->estado_salud=="Regular")
                    <input type="radio" name="salud" value="Bueno">Bueno
                    <input type="radio" name="salud" value="Malo">Malo
                    <input checked type="radio" name="salud" value="Regular">Regular
                    @endif

                </div>
            </div>
        </div>

    </div>
</body>
</html>
