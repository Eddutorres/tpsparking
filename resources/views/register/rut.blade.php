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

                    <div class="mb-3">
                        <input id="codigo_est" type="text" name="codigo_est" class="form-control"
                        value=" {{ $estacionamiento['codigo'] }} " disabled>
                    </div>
                @endforeach


                <div class="row gx-3">


                    <div class="col-md-6">
                        <!-- Form Group (first name)-->

                        <div class="mb-3">
                            <form action="{{route('buscarrut')}}" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Ingresar RUT" aria-label="Search" aria-describedby="basic-addon2" name="rut" id="rut">
                                    <input type="hidden" id="codigo" name="codigo" value="{{ $estacionamiento['codigo'] }}">
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
                            <input class="form-control" id="conductor" type="text" placeholder="Conductor" disabled>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <input id="patente" type="text" name="patente" class="form-control" placeholder="Patente">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="input-group">
                                    <input id="hora_ingreso" type="time" name="hora_ingreso" class="form-control" aria-describedby="basic-addon2" value="<?php date_default_timezone_set("America/Santiago"); echo date("h:i");?>">
                                <div class="input-group-append">
                                    <input type="date" id="fecha" class="form-control" name="fecha" value="<?php date_default_timezone_set("America/Santiago"); echo date("Y-m-d");?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>

                <!-- Form Group (create account submit)-->
                <a class="btn btn-secondary btn-secondary"
                    href="registrar_ingreso.html">Cancelar</a>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->