<!-- DataTales Example -->

<div class="card shadow mb-4">

    <div class="card shadow-lg border-0 rounded-lg mt-5">

        <div class="card-header justify-content-center">
            <h3 class="fw-light my-4">Registrar Ingreso</h3>
        </div>
       
        <div class="card-body">

            <!-- Registration form-->
           
                <!-- Form Row-->
                <form action="{{route('guardar.ingreso')}}" method="POST" class="formulario-ingresar">
                    {{ csrf_field() }}
                    @method('post')
                    <input type="hidden" id="estado_est" name="estado_est" value="1">
                    <!-- Form Group (last name)-->
                    <label for="codigo_est">Estacionamiento</label>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <input id="codigo" type="text" name="codigo" class="form-control"
                            value=" {{ $codigo}} ">
                        </div>
                    </div>
              
                
                
                <div class="row gx-3">

                    @foreach($personas as $persona)
                    <div class="col-md-6">
                        <!-- Form Group (first name)-->
                    
                        <div class="mb-3">
                            
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Ingresar RUT"  
                                     name="rut" id="rut" value=" {{ trim($persona['rut']) }} ">
                                    
                                    <div class="input-group-append">
                                        <input type="submit" class="btn btn-primary btn-icon-split btn-primary" value="Buscar">                          
                                    </div>
                                </div>
                            
                            
                        </div>
                    
                    </div>
                    
                    <div class="col-md-6">
                        <!-- Form Group (last name)-->
                        <div class="mb-3">
                            <input class="form-control" id="conductor" type="text" placeholder="Conductor" 
                            value=" {{ $persona['nombre1'].' '.$persona['nombre2'].' '.$persona['apellido1'].' '.$persona['apellido2'] }} " disabled>

                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="patente">Patente</label>
                        <div class="mb-3">
                            <select id="patente" name="patente" class="form-control">
                                @foreach($patentes as $patente)
                                    <option value="{{ $patente['patente'] }}">
                                        {{ $patente['patente'] }}
                                    </option>
                                @endforeach
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
                    @endforeach
                </div><br>
            
                <!-- Form Group (create account submit)-->
                <hr class="sidebar-divider">
                    <input type="submit" class="btn btn-success btn-success" value="Asignar Estacionamiento">
                <a class="btn btn-secondary btn-secondary"
                    href="{{ url('/ingresos' )}}">Cancelar</a>
                </form>
        </div>
    
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
