@extends('tema.principal')

@section('cuerpo_central')
<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card shadow-lg border-0 rounded-lg mt-5">

        <div class="card-header justify-content-center">
            <h3 class="fw-light my-4">Registrar Ingreso</h3>
        </div>
       
        <div class="card-body">

            <!-- Registration form-->
           
                <!-- Form Row-->

                @foreach($estacionamientos as $estacionamiento)
               
                    <!-- Form Group (last name)-->
                    <label for="codigo_est">Estacionamiento</label>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <input id="codigo_est" type="text" name="codigo_est" class="form-control"
                            value=" {{ $estacionamiento['codigo'] }} " disabled>
                        </div>
                    </div>
                @endforeach
                
                
                <div class="row gx-3">

                    
                    <div class="col-md-6">
                        <!-- Form Group (first name)-->
                    
                        <div class="mb-3">
                            <form action="{{route('buscar.rut')}}" method="get" >
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Ingresar RUT" aria-label="Search" aria-describedby="basic-addon2" name="rut" id="rut" required>
                                    <input type="hidden" id="codigo" name="codigo" value="{{ $estacionamiento['codigo'] }}">
                                    <input type="hidden" id="sector" name="sector" value="{{ $estacionamiento['sector'] }}">
                                    <div class="input-group-append">
                                        <input type="submit" class="btn btn-primary btn-icon-split btn-primary" value="Buscar">                          
                                    </div>
                                </div>
                            
                            </form>
                        </div>
                    
                    </div>
                    
                    <div class="col-md-6">
                        <!-- Form Group (last name)-->
                        <div class="mb-3">
                            <input class="form-control" id="conductor" type="text" placeholder="Conductor">

                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="patente">Patente</label>
                        <div class="mb-3">
                            <select class="form-control" name="patente" placeholder="Conductor">
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="hora_ingreso">Hora Ingreso</label>
                        <div class="mb-3">
                            <div class="input-group">
                                    <input id="hora_ingreso" type="time" name="hora_ingreso" class="form-control" aria-describedby="basic-addon2" value="<?php date_default_timezone_set("America/Santiago"); echo date("H:i");?>">
                                <div class="input-group-append">
                                    <input type="date" id="fecha" class="form-control" name="fecha" value="<?php date_default_timezone_set("America/Santiago"); echo date("Y-m-d");?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
            
                <!-- Form Group (create account submit)-->
                <a class="btn btn-secondary btn-secondary"
                    href="{{ url('/ingresos' )}}">Cancelar</a>
        </div>
    
    </div>
    <!-- /.container-fluid -->
    <script src="js/validacion.js"></script>
</div>
<!-- End of Main Content -->
@endsection