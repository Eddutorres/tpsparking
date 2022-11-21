@extends('tema.principal')

@section('cuerpo_central')

@include('ingresos.controles')

<div class="card shadow mb-4">

    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header justify-content-center">
            <h3 class="fw-light my-4">Registrar Salida</h3>
        </div>
        <div class="card-body">
            <!-- Registration form-->
            <form method="POST" action="{{route('confirmarsalida')}}" method="get">
                @csrf
                @method('PUT')
                
                <input type="hidden" class="form-control" name="estado_est" id="estado_est" value="0">  
                <!-- Form Row-->
                @foreach($registros as $registro)
                <input type="hidden" class="form-control" name="id" id="id" value="{{$registro['id']}}">
                <div class="row gx-3">
                    <div class="col-md-6">
                        <!-- Form Group (first name)-->
                        <label for="rut">Rut</label>
                        <div class="mb-3">
                            <input class="form-control" id="rut" type="text"
                            value="{{ $registro['rut'] }}" disabled>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Form Group (last name)-->
                        <label for="patente">Patente</label>
                        <div class="mb-3">
                            <input class="form-control" id="patente" type="text"
                            value="{{ $registro['patente'] }}" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Form Group (last name)-->
                        <label for="conductor">Conductor</label>
                        <div class="mb-3">
                            <input class="form-control" id="conductor" type="text"
                            value="{{ $registro['nombre1']." ".$registro['apellido1'] }}" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Form Group (last name)-->
                        
                    </div>
                    <div class="col-md-6">
                        <!-- Form Group (last name)-->
                        <label for="hora_salida">Hora Salida</label>
                        <div class="mb-3">
                            <input class="form-control" name="hora_salida" id="hora_salida" type="time"
                            value="<?php date_default_timezone_set("America/Santiago"); echo date("h:i");?>" >
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Form Group (create account submit)-->                    
                    <input type="submit" class="btn btn-danger btn-icon-split btn-sm" value="   Liberar Estacionamiento   ">
                
                
                <a class="btn btn-secondary btn-secondary"
                    href="{{ url('/ingresos' )}}">Cancelar</a>
            </form>
        </div>


        <!-- Confirmar Liberar Modal-->
        <div class="modal fade" id="ConfModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Estacionamiento liberado
                            correctamente</h5>
                        <button class="close" type="button" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-primary" href="grilla_sector_varas.html">Aceptar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>

@endsection