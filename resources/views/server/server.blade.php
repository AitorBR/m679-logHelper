<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css\server_log_view.css" rel="stylesheet" type="text/css" />
</head>


<body>
    <h2>DASHBOARD SERVIDOR</h2>
    <a href="/serverCreate" class="btn float-right btn btn-success">Añadir Servidor ➕</a>
    <table id="listServer" class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ipv4</th>
                <th scope="col">ipv6</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Localización</th>
                <th>Funciones</th>
            </tr>
        </thead>

        <tbody id="table">
            <!--<tr>
                <th scope="row">1</th>
                <td>Servidor AWS</td>
                <td>192.168.144.12</td>
                <td>2001:0db8:85a3:0000:0000:8a2e:0370:7334</td>
                <td>Spain</td>
                <td>Servidor Amazon</td>

                <td>
                    <a href="logsServer(actdata['id'])">Ver logs</a> | <a href="#">Editar </a>| <a href="#">Eliminar</a>
                </td>
            </tr>

            <tr>
                <th scope="row">2</th>
                <td>Servidor AWS</td>
                <td>192.168.144.12</td>
                <td>2001:0db8:85a3:0000:0000:8a2e:0370:7334</td>
                <td>Spain</td>
                <td>Servidor Amazon</td>

                <td>
                    <a href="#">Ver logs</a> | <a href="#">Editar </a>| <a href="#">Eliminar </a>
                </td>
            </tr>

            <tr>
                <th scope="row">3</th>
                <td>Servidor AWS</td>
                <td>192.168.144.12</td>
                <td>2001:0db8:85a3:0000:0000:8a2e:0370:7334</td>
                <td>Spain</td>
                <td>Servidor Amazon</td>

                <td>
                    <a href="#">Ver logs</a> | <a href="#">Editar </a>| <a href="#">Eliminar </a>
                </td>
            </tr>-->
        </tbody>


</body>

<script type="text/javascript" src="{{ asset('js/server.js') }}"></script>
</html>
