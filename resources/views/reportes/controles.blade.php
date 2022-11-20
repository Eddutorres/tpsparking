<!-- Begin Page Content -->
<div class="container-fluid">

    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="{{route('crear.reporte')}}" method="get">
            <div class="card-header py-3">
                <div class="mb-3 py-12">
                    <label class="label small" for="dateFrom">Desde</label>
                    <input type="date" id="fecha_ini" class="form-control" name="fecha_ini" value="<?php date_default_timezone_set("America/Santiago"); echo date("Y-m-d");?>">
                    <label class="control-label small" for="dateFrom">Hasta</label>
                    <input type="date" id="fecha_fin" class="form-control" name="fecha_fin" value="<?php date_default_timezone_set("America/Santiago"); echo date("Y-m-d");?>">
                    <br>
                    <label class="label small" for="dateFrom">Filtar por Sector</label>
                    <select class="form-control" name="sector" id="sector">
                        <option class="form-control" value="Varas">Sector Varas</option>
                        <option class="form-control" value="Centro">Sector Centro</option>
                        <option class="form-control" value="50">Sector 50</option>
                        <option class="form-control" value="Prat" selected>Sector Prat</option>
                    </select>
                </div>
                <td>
                    <hr class="sidebar-divider">
                    <input type="submit" class="btn btn-primary btn-icon-split btn-primary" value="GENERAR REPORTE">
                </td>
            </div>
        </form>

    </div>
</div> 