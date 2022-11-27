@extends('tema.principal')

@section('cuerpo_central')

@include('reportes.controles')



<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%"
            cellspacing="0">
            <thead>
                <tr>
                    <th>Fecha de Ingreso</th>
                    <th>Hora de Ingreso</th>
                    <th>Patente</th>
                    <th>Sector</th>
                    <th>Número</th>
                    <th>Nombre Conductor</th>
                    <th>Contacto</th>
                    <th>Hora de Salida</th>
                </tr>
            </thead>

            <tbody>
                @if(count($reportes)<=0)
                    <tr>
                        <td colspan="8">No existen registros</td>
                    </tr>
                @else
                @foreach($reportes as $reporte)
                <tr>
                    <td>{{$reporte['fecha']}}</td>
                    <td>{{$reporte['hora_ingreso']}}</td>
                    <td>{{$reporte['patente']}}</td>
                    <td>{{$reporte['sector']}}</td>
                    <td>{{$reporte['codigo_est']}}</td>
                    <td>{{$reporte['nombre1']." ".$reporte['apellido1']}}</td>
                    <td>{{$reporte['telefono']}}</td>
                    <td>{{$reporte['hora_salida']}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

    <!-- DataTales Example -->
    <div class="card-body">
        <form action="{{route('descargar.pdf')}}" method="get">
                <td>
                    <input type="submit" class="btn btn-warning btn-icon-split right-align btn-sm" value="DESCARGAR REPORTE">
                </td>
                <input type="hidden" id="sector" name="sector" value="{{ $sector }}">
                <input type="hidden" id="fecha_ini" name="fecha_ini" value="{{ $fecha_ini }}">
                <input type="hidden" id="fecha_fin" name="fecha_fin" value="{{ $fecha_fin }}">
        </form>
    </div>



@endsection