<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Estacionamientos</title>


    <link
        href="{{ public_path('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ public_path('css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body>
<h2>Reporte de Estacionamientos</h2>
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
                    <th>Hora de Salida</th>
                </tr>
            </thead>

            <tbody>
                @foreach($reportes as $reporte)
                <tr>
                    <td>{{$reporte['fecha']}}</td>
                    <td>{{$reporte['hora_ingreso']}}</td>
                    <td>{{$reporte['patente']}}</td>
                    <td>{{$reporte['sector']}}</td>
                    <td>{{$reporte['codigo_est']}}</td>
                    <td >{{$reporte['nombre1']." ".$reporte['apellido1']}}</td>
                    <td>{{$reporte['telefono']}}</td>
                    <td>{{$reporte['hora_salida']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    
</body>
</html>