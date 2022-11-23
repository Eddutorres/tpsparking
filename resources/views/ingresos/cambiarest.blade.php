@extends('tema.principal')

@section('cuerpo_central')

@include('ingresos.controles')


<div class="col-md-6">
    <!-- Form Group (first name)-->

    <div class="mb-3">
        <form method="POST" action="{{route('cambiar.estacionamiento')}}">
            @csrf
            @method('PUT')
            <div class="input-group">
                <input type="text" class="form-control" aria-label="Search" aria-describedby="basic-addon2" name="codigo_est" id="codigo_est">
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