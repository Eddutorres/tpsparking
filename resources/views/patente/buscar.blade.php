
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
                                    <th>Sector</th>
                                    <th>Número</th>
                                    <th>Conductor</th>
                                    <th>Contacto</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($patentes as $patente)
                                <tr>
                                    <td>{{$patente['patente']}}</td>
                                    <td>{{$patente['hora_ingreso']}}</td>
                                    <td>{{$patente['sector']}}</td>
                                    <td>{{$patente['codigo']}}</td>
                                    <td>{{$patente['nombre1']." ".$patente['apellido1']}}</td>
                                    <td>{{$patente['telefono']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->





        </div>
