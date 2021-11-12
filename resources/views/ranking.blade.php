<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ranking</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <h2>
                        Perfil {{$perfil->nombre}}
                    </h2>
                    <h3>Cursos por perfil</h3>
                    <ul>
                        @foreach ($cursos as $curso)
                            <li>{{$curso->nombre}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div>Usuarios</div>
                    <div>
                        @foreach ($usuarios as $usuario)
                            <div class="card mb-3 p-5">
                                <h2>{{$usuario->nombre}}</h2>
                                <div>
                                    Cursos inscritos: {{$usuario->cursos_inscritos}} de {{$total_cursos_perfil}}
                                </div>
                                <div>
                                    Cursos aprobados: {{$usuario->cursos_aprobados}}
                                </div>
                                <div>
                                    Promedio del curso: {{$usuario->promedio_todos_cursos}}
                                </div>
                                <hr>
                                <h5>Porcentajes</h5>
                                <div>
                                    Intentos usados por curso: {{$usuario->porcentaje_intentos_por_curso}} %
                                </div>
                                <div>
                                    Cursos aprobados: {{$usuario->porcentaje_cursos_aprobados}} %
                                </div>
                                {{-- <div>
                                    Cursos completados: {{$usuario->porcentaje_cursos_completados}} %
                                </div> --}}
                                <div>
                                    Promedio cursos: {{$usuario->porcentaje_promedio_cursos}} %
                                </div>
                                <div class="bg-info text-white">
                                    Total Porcentaje: {{$usuario->total_porcentaje}} %
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-6">
                    <div>Usuarios Ordenados</div>
                    <div>
                        @foreach ($usuarios_ordenados as $usuario)
                            <div class="card mb-3 p-5">
                                <h2>{{$usuario['usuario']->nombre}}</h2>
                                <div>
                                    Cursos inscritos: {{$usuario['usuario']->cursos_inscritos}} de {{$total_cursos_perfil}}
                                </div>
                                <div>
                                    Cursos aprobados: {{$usuario['usuario']->cursos_aprobados}}
                                </div>
                                <div>
                                    Promedio del curso: {{$usuario['usuario']->promedio_todos_cursos}}
                                </div>
                                <hr>
                                <h5>Porcentajes</h5>
                                <div>
                                    Intentos usados por curso: {{$usuario['usuario']->porcentaje_intentos_por_curso}} %
                                </div>
                                <div>
                                    Cursos aprobados: {{$usuario['usuario']->porcentaje_cursos_aprobados}} %
                                </div>
                                <div>
                                    Promedio cursos: {{$usuario['usuario']->porcentaje_promedio_cursos}} %
                                </div>
                                <div class="bg-info text-white">
                                    Total Porcentaje: {{$usuario['usuario']->total_porcentaje}} %
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
