@extends('tema.principal')

@section('cuerpo_central')
    
    @include('register.formpatente')
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('ingresar')=='ok')

        <script>
            Swal.fire(
            'Deleted!',
            'Your file has been Ingresado',
            'success'
            )

        </script>

    @endif
    <script>

        $('.formulario-ingresar').submit(function(e){
            e.preventDefault();

            Swal.fire({
                title: '¿Ingresar el registro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ingresar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
            'Ingresado',
            'El registro ha sido ingresado',
            'success'
            )
                    this.submit();
                }
                })
                });

    </script>
@endsection