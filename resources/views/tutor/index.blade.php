@if (Auth::check())
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tutorados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>



    <div class="container mt-5">
        <!-- Encabezado con el título y la opción de cerrar sesión -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">NILITS</h1>

            <form method="POST" class="btn btn-danger mt-3" action="{{ route('logout') }}">
                @csrf
                <button class="btn text-light" type="submit">
                    Cerrar Sesión
                </button>
            </form>
        </div>
        <h2 class="mb-4 bg-warning text-light">Gestion de tutorados</h2>

     <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Correo</th>

                    <th>Estatus</th>
                    <th>Ultimo Dictamen</th>
                    <th>Listado de dictamenes</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->codigo }}</td>
                        <td>{{ $alumno->Nombre }}</td>
                        <td>{{ $alumno->correo }}</td>

                        <td>
                            @if ($alumno->estatus == 1)
                                Activo
                            @elseif ($alumno->estatus == 3)
                                Egresado
                            @elseif ($alumno->estatus == 4)
                                Baja
                            @else
                                Otro
                            @endif
                        </td>

                        <td>
                            @php
                                $dictamenes = explode('.', $alumno->dictamen);
                                natsort($dictamenes);
                                $dictamenActual = end($dictamenes);
                            @endphp
                            {{ $dictamenActual }}
                        </td>
                        <td>
                            <!-- Botón que activa el modal -->
                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#dictamenModal{{ $alumno->codigo }}">Ver Dictámenes</button>

                            <!-- Modal para los dictámenes -->
                            <div class="modal fade" id="dictamenModal{{ $alumno->codigo }}" tabindex="-1"
                                role="dialog" aria-labelledby="modalTitle{{ $alumno->codigo }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitle{{ $alumno->codigo }}">Dictámenes
                                                de {{ $alumno->Nombre }} </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                $dictamenes = explode('.', $alumno->dictamen);
                                            @endphp
                                            <ul>
                                                @foreach ($dictamenes as $dictamen)
                                                    <li>{{ $dictamen }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Botón para activar el modal -->

                    </tr>
                    <!-- Modal para editar alumno -->
                    <!-- Modal para editar alumno -->



                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.5/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</body>
</html>

@endif
