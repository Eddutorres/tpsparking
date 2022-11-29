
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <p class="mb-4"></p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Resultado de la Búsqueda:</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Patente</th>
                                    <th>Hora Ingreso</th>
                                    <th>Número</th>
                                    <th>Sector</th>
                                    <th>Contacto</th>
                                    <th>Conductor</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(count($patentes)<=0)
                                    <tr>
                                        <td colspan="6">La patente no se encuentra en el terminal</td>

                                    </tr>
                                @else
                                
                                <tr>
                                    @foreach($patentes as $patente)
                                    <td>{{$patente['patente']}}</td>
                                    <td>{{$patente['hora_ingreso']}}</td>
                                    <td>{{$patente['codigo_est']}}</td>
                                    @endforeach
                                    @foreach($estacionamientos as $estacionamiento)
                                    <td>{{$estacionamiento['sector']}}</td>
                                    @endforeach
                                    @foreach($personas as $persona)
                                    <td>{{$persona['telefono']}}</td>
                                    <td>{{$persona['nombre1']." ".$persona['apellido1']}}</td>
                                    @endforeach
                                </tr>
                                
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->





        </div>
