@extends('tema.principal')

@section('cuerpo_central')

<!-- Begin Page Content -->
<div class="container-fluid">

    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <td><a href="generar_reporte.html" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-table"></i>
                    </span>
                    <span class="text">GENERAR REPORTE</span>
                </a>
            </td>
            <td><a href="#" class="btn btn-warning btn-icon-split right-align btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                    </span>
                    <span class="text">DESCARGAR REPORTE</span>
                </a>
            </td>
            <hr class="sidebar-divider">
            <div class="mb-3 py-12">
                <label class="label small" for="dateFrom">Desde</label>
                <input type="datetime-local" id="meeting-time" class="form-control" autocomplete="on"
                    name="meeting-time" value="2022-11-12T19:30" min="2018-06-07T00:00"
                    max="2030-12-14T00:00"><label class="control-label small"
                    for="dateFrom">Hasta</label>
                <input type="datetime-local" id="meeting-time" class="form-control" autocomplete="on"
                    name="meeting-time" value="2022-11-12T19:30" min="2018-06-07T00:00"
                    max="2030-12-14T00:00">
                <br>
                <label class="label small" for="dateFrom">Filtar por Sector</label>
                <select class="form-control" name="patente" id="patente">
                    <option class="form-control" value="free">Sector A. Varas</option>
                    <option class="form-control" value="bronze">Sector 50</option>
                    <option class="form-control" value="bronze">Sector XX</option>
                    <option class="form-control" value="bronze">Sector A.Pratt</option>
                    <option class="form-control" value="silver" selected>Todos</option>
                </select>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Fecha de Ingreso</th>
                            <th>Hora de Ingreso</th>
                            <th>Patente</th>
                            <th>Sector</th>
                            <th>Número</th>
                            <th>Nombre Conductor</th>
                            <th>Contacto</th>
                            <th>Fecha de Salida</th>
                            <th>Hora de Salida</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>10/11/2022</td>
                            <td>11:11</td>
                            <td>GRT657</td>
                            <td>A. Varas</td>
                            <td>25</td>
                            <td>Juan Perez</td>
                            <td>97565432</td>
                            <td>10/11/2022</td>
                            <td>17:15</td>
                        </tr>
                        <tr>
                            <td>10/11/2022</td>
                            <td>09:11</td>
                            <td>GUY657</td>
                            <td>Sector 50</td>
                            <td>12</td>
                            <td>Luis Gomez</td>
                            <td>97897698</td>
                            <td>10/11/2022</td>
                            <td>13:19</td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>      

@endsection