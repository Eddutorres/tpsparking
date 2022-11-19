@extends('tema.principal')

@section('cuerpo_central')

<div class="card shadow mb-4">

    <div class="card shadow-lg border-0 rounded-lg mt-5">

        <div class="card-header justify-content-center">
            <h3 class="fw-light my-4">Registrar Ingreso</h3>
        </div>

        <div class="card-body">

            <!-- Registration form-->
            <form>
                <!-- Form Row-->
                @foreach($estacionamientos as $estacionamiento)
                <div class="col-md-6">
                    <!-- Form Group (last name)-->
                    <div class="mb-3">
                        
                        <input id="sector" type="text" name="sector" class="form-control"
                        value=" {{ $estacionamiento['sector'] }} " placeholder="Sector" disabled>

                    </div>

                    <div class="mb-3">
                        <input id="codigo" type="text" name="codigo" class="form-control"
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
                                    placeholder="Ingresar RUT">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                            <br><a href="#" class="btn btn-primary btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Asignar Nueva Patente</span>

                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Form Group (last name)-->

                        <select class="form-control" name="patente" id="patente">
                            <option class="form-control" value="free">Patente 1</option>
                            <option class="form-control" value="bronze">Patente 2</option>
                            <option class="form-control" value="silver" selected>Seleccionar
                                Patente Asiganada</option>
                        </select>


                    </div>

                    <div class="col-md-6">
                        <!-- Form Group (last name)-->
                        <div class="mb-3">
                            <input class="form-control" id="inputLastName" type="text"
                                placeholder="Nombres" disabled>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Form Group (last name)-->
                        <div class="mb-3">
                            <input class="form-control" id="inputLastName" type="text"
                                placeholder="Apellidos" disabled>
                        </div>
                    </div>
                </div>

                <!-- Form Group (create account submit)-->
                <a class="btn btn-success btn-success" href="grilla_sector_varas.html">Asignar
                    Estacionamiento</a>
                <a class="btn btn-secondary btn-secondary"
                    href="registrar_ingreso.html">Cancelar</a>
            </form>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection