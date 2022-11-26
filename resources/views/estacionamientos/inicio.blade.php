@extends('tema.principal')

@section('cuerpo_central')


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editar Cantidad de Estacionamientos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%"
                cellspacing="0">
                <thead>
                    <tr>
                        <th>Sector</th>
                        <th>Editar</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>VARAS</td>
                        <td>
                            <form action="{{route('listarest')}}" method="get">                            
                                <input type="submit" class="btn btn-warning btn-icon-split btn-sm" value="EDITAR">
                                <input type="hidden" class="form-control" name="sector" id="sector" value="Varas">
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>PRAT</td>
                        <td>
                            <form action="{{route('listarest')}}" method="get">                            
                                <input type="submit" class="btn btn-warning btn-icon-split btn-sm" value="EDITAR">
                                <input type="hidden" class="form-control" name="sector" id="sector" value="Prat">
                            </form>
                        </td>

                    </tr>
                    <tr>
                        <td>CENTRO</td>
                        <td>
                            <form action="{{route('listarest')}}" method="get">                            
                                <input type="submit" class="btn btn-warning btn-icon-split btn-sm" value="EDITAR">
                                <input type="hidden" class="form-control" name="sector" id="sector" value="Centro">
                            </form>
                        </td>
                    </tr>

                    <tr>
                        <td>50</td>
                        <td>
                            <form action="{{route('listarest')}}" method="get">                            
                                <input type="submit" class="btn btn-warning btn-icon-split btn-sm" value="EDITAR">
                                <input type="hidden" class="form-control" name="sector" id="sector" value="50">
                            </form>
                        </td>
                    </tr>
                </tbody>    
            </table>        
        </div>
    </div>
    <!-- /.container-fluid -->                                

</div>
<!-- End of Main Content -->


@endsection