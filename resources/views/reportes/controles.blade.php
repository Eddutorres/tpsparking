<!-- Begin Page Content -->
<div class="container-fluid">

    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="{{route('crear.reporte')}}" method="get">
            <div class="card-header py-3">
                <td>
                    <input type="submit" class="btn btn-primary btn-icon-split btn-primary" value="GENERAR REPORTE">
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
                    <input type="date" id="fecha_ini" class="form-control" autocomplete="on"
                        name="fecha_ini"><label class="control-label small"
                        for="dateFrom">Hasta</label>
                    <input type="date" id="fecha_fin" class="form-control" autocomplete="on"
                        name="fecha_fin">
                    <br>
                    <label class="label small" for="dateFrom">Filtar por Sector</label>
                    <select class="form-control" name="sector" id="sector">
                        <option class="form-control" value="Varas">Sector Varas</option>
                        <option class="form-control" value="50">Sector 50</option>
                        <option class="form-control" value="XX">Sector XX</option>
                        <option class="form-control" value="Prat" selected>Sector Prat</option>
                        <option class="form-control" value="Todos">Todos</option>
                    </select>
                </div>
            </div>
        </form>

    </div>
</div> 