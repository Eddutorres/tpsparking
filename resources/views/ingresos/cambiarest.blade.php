@extends('tema.principal')

@section('cuerpo_central')

@include('ingresos.controles')


<div class="col-md-6">
    <!-- Form Group (first name)-->

    <div class="mb-3">
        <form method="POST" action="{{route('cambiar.estacionamiento')}}" class="formulario-cambiar">
            @csrf
            @method('PUT')
            <br><br>
            <label for="codigo_est">Ingrese nuevo estacionamiento </label>
            <div class="input-group">
                
                <input type="text" class="form-control" aria-label="Search" aria-describedby="basic-addon2" name="codigo_est" id="codigo_est" required>
                <input type="hidden" id="id" name="id" value="{{$id}}">
                <div class="input-group-append">
                    <input type="submit" class="btn btn-primary btn-icon-split btn-primary" value="Aceptar">  
                    <a class="btn btn-secondary" href="{{ url('/ingresos' )}}">Salir</a>                        
                </div>
            </div>
        
        </form>
    </div>

</div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('cambiar')=='ok')

        <script>
            Swal.fire(
            'Deleted!',
            'Your file has been Cambiado.',
            'success'
            )

        </script>

    @endif
    <script>

        $('.formulario-cambiar').submit(function(e){
            e.preventDefault();

            Swal.fire({
        title: '¿Cambiar el estacionamiento?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Cambiar',
        cancelButtonText: 'Cancelar',
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Cambiado',
            'El estacionamiento ha sido cambiado',
            'success'
            )
            this.submit();
        }
        })
        });

    </script>
@endsection