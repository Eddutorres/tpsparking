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
                        <th>Numero</th>
                        <th>Editar</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($estacionamientos as $estacionamiento)
                    <tr>
                        <td>{{ $estacionamiento['sector'] }}</td>
                        <td>{{ $estacionamiento['codigo'] }}</td>
                        <td>
                            <form action="{{route('eliminarest')}}" method="post">
                                {{ csrf_field() }}
                                @method('DELETE')                    
                                <input type="submit" class="btn btn-danger btn-icon-split btn-sm" value="ELIMINAR">
                                <input type="hidden" class="form-control" name="est_id" id="est_id" value="{{ $estacionamiento['est_id'] }}">
                                <input type="hidden" id="sector" name="sector" value="{{ $estacionamiento['sector'] }}">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>    
            </table>


                    <div class="col-md-4">
                        <!-- Form Group (first name)-->
                        <div class="mb-2">
                            <form action="{{route('agregarest')}}" method="post" >
                                {{ csrf_field() }}
                                @method('post')
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Número estacionamiento" aria-label="Search" aria-describedby="basic-addon2" name="codigo" id="codigo" required>
                                    <input type="hidden" id="sector" name="sector" value="{{ $estacionamiento['sector'] }}">
                                    
                                    <div class="input-group-append">
                                        <input type="submit" class="btn btn-primary btn-icon-split btn-primary" value=" AGREGAR ">                          
                                    </div>
                                </div>
                            
                            </form>
                        </div>                
                    </div>
     
        </div>
    </div>
    <!-- /.container-fluid -->                                

</div>
<!-- End of Main Content -->
@endsection