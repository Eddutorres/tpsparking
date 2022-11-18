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
            </tbody>
        </table>
    </div>
</div>
@endsection