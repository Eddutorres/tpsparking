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
                            <form action="{{route('eliminar.est')}}" method="post" class="formulario-eliminar">
                                {{ csrf_field() }}
                                @method('DELETE')                    
                                <input type="submit" class="btn btn-danger btn-icon-split btn-sm" value="ELIMINAR">
                                <input type="hidden" class="form-control" name="est_id" id="est_id" value="{{ $estacionamiento['est_id'] }}">
                                <input type="hidden" class="form-control" name="codigo" id="codigo" value="{{ $estacionamiento['codigo'] }}">
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
                            <form action="{{route('agregar.est')}}" method="post" class="formulario-agregar">
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
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
                title: '¿Eliminar el estacionamiento {{ $estacionamiento['codigo'] }} ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
            'Eliminado',
            'El estacionamiento {{ $estacionamiento['codigo'] }} ha sido eliminado',
            'success'
            )
                    this.submit();
                }
                })
                });

</script>
<script>
                    $('.formulario-agregar').submit(function(e){
            e.preventDefault();

            Swal.fire({
                title: '¿Agregar el estacionamiento?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Agregar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
            'Agregado',
            'El estacionamiento ha sido agregado',
            'success'
            )
                    this.submit();
                }
                })
                });


</script>
@endsection