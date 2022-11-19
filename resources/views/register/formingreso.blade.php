@extends('tema.principal')

@section('cuerpo_central')

<div class="card shadow mb-4">

    <div class="card shadow-lg border-0 rounded-lg mt-5">

        <div class="card-header justify-content-center">
            <h3 class="fw-light my-4">Registrar Ingreso</h3>
        </div>

        <div class="card-body">

            <!-- Registration form-->
            <form action="{{route('registro.store')}}" method="POST">
                {{ csrf_field() }}
                @method('post')
                <!-- Form Row-->
                @foreach($estacionamientos as $estacionamiento)
                <div class="col-md-6">
                    <!-- Form Group (last name)-->
                    <div class="mb-3">
                        
                        <input id="sector" type="text" name="sector" class="form-control"
                        value=" {{ $estacionamiento['sector'] }} " placeholder="Sector" disabled>

                    </div>

                    <div class="mb-3">
                        <input id="codigo" type="text" name="codigo_est" class="form-control"
                        value=" {{ $estacionamiento['codigo'] }} " placeholder="Codigo" disabled>
                    </div>
                </div>
                @endforeach


                <div class="row gx-3">


                    <div class="col-md-6">
                        <!-- Form Group (first name)-->

                        <div class="mb-3">
                            <div class="input-group">

                                <input class="form-control" id="inputFirstName" type="text"
                                    placeholder="Ingresar RUT" name="rut" id="rut">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                            <br>

                            <div class="mb-3">
                                <label class="form-label">Fecha</label>
                                <input type="date" name="fecha" id="fecha">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Hora Ingreso</label>
                                <input type="time" name="hora_ingreso" id="hora_ingreso">
                            </div>

                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Patente</label>
                        <input type="text" name="patente" id="patente" disabled>
                    </div>

                <!-- Form Group (create account submit)-->
                <input class="btn btn-success btn-success" type="submit" value="Asignar
                Estacionamiento">
                <a class="btn btn-secondary btn-secondary"
                    href="registrar_ingreso.html">Cancelar</a>
            </form>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection