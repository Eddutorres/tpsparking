<!-- Begin Page Content -->
<div class="container-fluid">

    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">SECTOR ANTONIO VARAS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                
                <table class="table table-bordered text-center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Patente</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($estacionamientos as $estacionamiento)
                       
                        <tr>
                            <td>{{$estacionamiento['codigo_est']}}</td>
                            <td>{{$estacionamiento['patente']}}</td>
                            <td><a href="form_salida.html"
                                    class="btn btn-danger btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-"></i>
                                    </span>
                                    <span class="text">OCUPADO</span>
                                </a>
                            </td>
                            <td><a href="#" class="btn btn-warning btn-icon-split btn-sm"
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
