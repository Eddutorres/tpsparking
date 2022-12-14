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
                                <form action="{{route('mostrar.sec')}}" method="get">
                                    
                                    
                                        <input type="hidden" class="form-control" name="sector" id="sector" value="Varas">
                                        <input type="hidden" id="fecha_reg" class="form-control" name="fecha_reg" value="<?php date_default_timezone_set("America/Santiago"); echo date("Y-m-d");?>">
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
                            <form action="{{route('mostrar.sec')}}" method="get">
                                
                                    <input type="hidden" class="form-control" name="sector" id="sector" value="Prat">
                                    <input type="hidden" id="fecha_reg" class="form-control" name="fecha_reg" value="<?php date_default_timezone_set("America/Santiago"); echo date("Y-m-d");?>">
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
                            
                            <form action="{{route('mostrar.sec')}}" method="get">
                                
                                <input type="hidden" class="form-control" name="sector" id="sector" value="Centro">
                                <input type="hidden" id="fecha_reg" class="form-control" name="fecha_reg" value="<?php date_default_timezone_set("America/Santiago"); echo date("Y-m-d");?>">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            
                            <input type="submit" class="btn btn-primary btn-icon-split btn-primary" value="   SECTOR CENTRO   ">
                        </form>
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
                            
                            <form action="{{route('mostrar.sec')}}" method="get">
                                
                                <input type="hidden" class="form-control" name="sector" id="sector" value="50">
                                <input type="hidden" id="fecha_reg" class="form-control" name="fecha_reg" value="<?php date_default_timezone_set("America/Santiago"); echo date("Y-m-d");?>">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            
                            <input type="submit" class="btn btn-primary btn-icon-split btn-primary" value="   SECTOR 50   ">
                        </form>
                        </div>
                        <div class="col-auto">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>