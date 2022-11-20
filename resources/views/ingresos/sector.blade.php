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
                            <th>Editar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($estacionamientos as $estacionamiento)
                        <tr>
                            <td>{{$estacionamiento['codigo']}}</td>
                            <td>{{$estacionamiento['patente']}}</td>
                            <td>{{$estacionamiento['hora_ingreso']}}</td>
                            @if ($estacionamiento['estado_est']==1)
                                
                            
                            <td>
                                <a href="form_salida.html"
                                    class="btn btn-danger btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-"></i>
                                    </span>
                                    <span class="text">OCUPADO</span>
                                </a>
                            </td>

                                
                            @else
                            <td>
                                <form action="{{route('buscarest')}}" method="get">                            
                                    <input type="submit" class="btn btn-success btn-icon-split btn-sm" value="   DISPONIBLE   ">
                                    <input type="hidden" class="form-control" name="codigo" id="codigo" value="{{$estacionamiento['codigo']}}">
                                </form>
                            </td> 
                            @endif
                            <td>
                                <a href="#" class="btn btn-warning btn-icon-split btn-sm"
                                    data-toggle="modal" data-target="#Edit_GrillaModal">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>

                                </a>
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