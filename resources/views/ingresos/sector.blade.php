@extends('tema.principal')

@section('cuerpo_central')

@include('ingresos.controles')

<!-- Begin Page Content -->
{{$nombre_sec=""}}
@if($sector=="Varas")
{{$nombre_sec="SECTOR ANTONIO VARAS"}}
@endif
@if($sector=="Prat")
{{$nombre_sec="SECTOR PRAT"}}
@endif
@if($sector=="50")
{{$nombre_sec="SECTOR 50"}}
@endif
@if($sector=="Centro")
{{$nombre_sec="SECTOR CENTRO"}}
@endif
<div class="container-fluid">

    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">{{ $nombre_sec }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Patente</th>
                            <th>Hora Ingreso</th>
                            <th>Estado</th>
                            <th>Cambiar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($estacionamientos as $estacionamiento)
                        <tr>
                        
                            <td>{{ $estacionamiento['codigo'] }}</td>
                            
                                @if (array_key_exists('patente',$estacionamiento))
                                    <td>{{ $estacionamiento['patente'] }}</td>
                                @else
                                    <td> </td>
                                    @endif
                                @if (array_key_exists('hora_ingreso',$estacionamiento))
                                    <td>{{ $estacionamiento['hora_ingreso'] }}</td>
                                @else
                                    <td> </td>
                                    @endif
                              
                                        @if (array_key_exists('estado_est',$estacionamiento))
                                        <td>
                                            <form action="{{route('editar.salida')}}" method="get">      
                                                <input type="hidden" class="form-control" name="id" id="id" value="{{$estacionamiento['id']}}">
                                                <input type="hidden" class="form-control" name="sector" id="sector" value="{{$estacionamiento['sector']}}">
                                                <input type="hidden" class="form-control" name="rut" id="rut" value="{{$estacionamiento['rut']}}">
                                                                      
                                                <input type="submit" class="btn btn-danger btn-icon-split btn-sm" value="   OCUPADO   ">
                                            </form>
                                        </td>
                                        @else
                                        <td>
                                            <form action="{{route('buscar.est')}}" method="get">                            
                                                <input type="submit" class="btn btn-success btn-icon-split btn-sm" value="   DISPONIBLE   ">
                                                <input type="hidden" class="form-control" name="codigo" id="codigo" value="{{$estacionamiento['codigo']}}">
                                                <input type="hidden" class="form-control" name="sector" id="sector" value="{{$estacionamiento['sector']}}"> 
                                            </form>
                                        </td> 
                                        @endif
                                        <td>
                                            @if (array_key_exists('id',$estacionamiento))
                                            <form action="{{route('cambiar.est')}}" method="get">                            
                                                <input type="submit" class="btn btn-warning btn-icon-split btn-sm" value="EDITAR">
                                                @if (array_key_exists('id',$estacionamiento))
                                                <input type="hidden" class="form-control" name="id" id="id" value="{{$estacionamiento['id']}}">
                                                <input type="hidden" class="form-control" name="sector" id="sector" value="{{$estacionamiento['sector']}}"> 
                                                <input type="hidden" class="form-control" name="codigo" id="codigo" value="{{$estacionamiento['codigo_est']}}"> 
                                                @endif
                                            </form>
                                            @endif
                                        </td>
                                
                                        
                        </tr>
                        
                        @endforeach                                         
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- /.container-fluid -->

@endsection