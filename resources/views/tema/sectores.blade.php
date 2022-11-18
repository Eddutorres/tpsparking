                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Card Sector 1 -->
                        
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <form action="{{route('mostrarsec')}}" method="get">
                                                    <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">
                                                        15 DISPONIBLES</div>
                                                        <input type="hidden" class="form-control" name="sector" id="sector" value="Varas">
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                                    
                                                    <input type="submit" class="btn btn-primary btn-icon-split btn-primary" value="   SECTOR VARAS   ">
                                                </form>
                                            </div>
                                            <div class="col-auto">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        <!-- Card Sector 2 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <form action="{{route('mostrarsec')}}" method="get">
                                                <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">
                                                    8 DISPONIBLES</div>
                                                    <input type="hidden" class="form-control" name="sector" id="sector" value="Prat">
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                                
                                                <input type="submit" class="btn btn-primary btn-icon-split btn-primary" value="   SECTOR PRAT   ">
                                            </form>
                                        </div>
                                        <div class="col-auto">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Sector 3 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">
                                                0 DISPONIBLES</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            <a href="grilla_sectorXX.html"
                                                class="btn btn-primary btn-icon-split btn-primary">
                                                <span class="icon text-white-60">
                                                    <i class="fas fa-car"></i>
                                                </span><span class="text">SECTOR XX </span>
                                            </a>
                                        </div>
                                        <div class="col-auto">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Sector 4 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">
                                                8 DISPONIBLES</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            <a href="grilla_sectorPratt.html"
                                                class="btn btn-primary btn-icon-split btn-primary">
                                                <span class="icon text-white-60">
                                                    <i class="fas fa-car"></i>
                                                </span><span class="text">SECTOR A. PRATT </span>
                                            </a>
                                        </div>
                                        <div class="col-auto">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                
                    <!-- Begin Page Content -->
                    {{$nombre_sec=""}}
                    @if($sector=="Varas")
                    {{$nombre_sec="SECTOR ANTONIO VARAS"}}
                    @endif
                    @if($sector=="Prat")
                    {{$nombre_sec="SECTOR PRAT"}}
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
                                                    
                                                
                                                <td><a href="form_salida.html"
                                                        class="btn btn-danger btn-icon-split btn-sm">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-"></i>
                                                        </span>
                                                        <span class="text">OCUPADO</span>
                                                    </a>
                                                </td>

                                                    
                                                @else
                                                <td><a href="form_salida.html"
                                                    class="btn btn-success btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-"></i>
                                                    </span>
                                                    <span class="text">DISPONIBLE</span>
                                                    </a>
                                                </td> 
                                                @endif
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
                </div>

                <!-- /.container-fluid -->