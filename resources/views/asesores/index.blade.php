<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assesores</title>
    <!-- Incluir Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h1>NILITS</h1>
            <button class="btn btn-outline-danger">Cerrar Sesión</button>
        </div>

        <h2 class="mb-4 bg-warning text-light">Gestionar profesores</h2>

        <!-- Barra de búsqueda -->
        <input class="form-control mb-3" type="text" id="searchInput" placeholder="Buscar">

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Datos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($maestros as $maestro)
                        <tr>
                            <td>{{ $maestro->codigo }}</td>
                            <td>{{ $maestro->Nombre }} {{$maestro->Apellido}}</td>
                            <td>{{ $maestro->correo }}</td>
                            <td><i class="fas fa-edit"></i></td>
                        </tr>



                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="text-center">
            <button class="btn btn-warning text-light" type="button" data-toggle="modal"
                data-target="#agregar">AGREGAR PROFESOR</button>

        </div>


    </div>

    <!--funcion para buscar en la tabla-->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var searchInput = document.getElementById('searchInput');

            searchInput.addEventListener('keyup', function() {
                var filter = searchInput.value.toUpperCase();
                var table = document.querySelector('table.table');
                var tr = table.getElementsByTagName('tr');

                // Recorre todas las filas de la tabla y oculta aquellas que no coincidan con la consulta de búsqueda
                for (var i = 1; i < tr.length; i++) {
                    var td = tr[i].getElementsByTagName('td')[1]; // Columna 'Nombre' (ajustar el índice según sea necesario)
                    if (td) {
                        var txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = '';
                        } else {
                            tr[i].style.display = 'none';
                        }
                    }
                }
            });
        });
    </script>


    <!-- Incluir Bootstrap JS y sus dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.5/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>



</body>

</html>
