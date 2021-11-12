<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Perfil;
use App\Models\Tema;

class UsuarioController extends Controller
{
    public function index()
    {
        // mi perfil actual
        $my_perfil = 2;

        $perfil = Perfil::find($my_perfil);

        // cursos por perfil
        $cursos = $perfil->cursos;
        foreach ($cursos as $curso) {
            $temas = Tema::find($curso->id);
            $curso->temas = $temas;
        }

        // total de cursos por perfil
        $total_cursos_perfil = count($cursos);

        // total de usuarios por perfil
        $usuarios = $perfil->usuarios;

        // acá ordenaremos los usuarios para listarlos
        $usuarios_ordenados = array();

        foreach ($usuarios as $usuario) {
            $cursos_aprobados = 0;
            $promedio_todos_cursos = 0;
            $intentos_por_curso = 0;
            $cursos_inscritos = 0;
            $notas = 0;

            // **************
            // Evaluaciones realizadas por el usuario
            $evaluaciones = Inscripcion::join('evaluaciones', 'evaluaciones.inscripcion_id', '=', 'inscripciones.id')
                ->join('temas', 'temas.id', '=', 'evaluaciones.tema_id')
                ->whereColumn('inscripciones.curso_id', '=', 'temas.curso_id')
                ->where('inscripciones.usuario_id', $usuario->id)
                ->where('inscripciones.estado', ['aprobado', 'desaprobado'])
                ->get();

            $nota_temas = [];
            $total_temas = [];
            $intentos_temas = [];
            // evaluaciones
            foreach ($evaluaciones as $evaluacion) {
                if (isset($nota_temas[$evaluacion->curso_id])) {
                    $nota_temas[$evaluacion->curso_id] += doubleval($evaluacion->nota);
                    $total_temas[$evaluacion->curso_id] += 1;
                    $intentos_temas[$evaluacion->curso_id] += ($evaluacion->intento == 1) ? 0 : $evaluacion->intento;
                } else {
                    $nota_temas[$evaluacion->curso_id] = doubleval($evaluacion->nota);
                    $total_temas[$evaluacion->curso_id] = 1;
                    $intentos_temas[$evaluacion->curso_id] = ($evaluacion->intento == 1) ? 0 : $evaluacion->intento;
                }
            }
            // resultados de evaluaciones por temas, union de los temas a un curso
            foreach ($nota_temas as $key => $value) {
                $promedio_todos_cursos = ($total_temas[$key] > 0) ? $nota_temas[$key] / $total_temas[$key] : 0;
                $intentos_por_curso = round(($total_temas[$key] > 0) ? $intentos_temas[$key]  / $total_temas[$key] / 3 * 100 : 0, 2);
            }
            //********************

            // validar curso aprobado
            foreach ($usuario->inscripciones as $inscripcion) {
                if ($inscripcion->estado == 'aprobado') {
                    $cursos_aprobados++;
                }
            }
            // cursos inscritos por el usuario
            $cursos_inscritos = count($usuario->inscripciones);

            $usuario->promedio_todos_cursos = $promedio_todos_cursos;
            $usuario->cursos_aprobados = $cursos_aprobados;
            $usuario->cursos_inscritos = $cursos_inscritos;

            // lso resultados lo paso a porcentjae para obtener un promedio total
            $porcentaje_cursos_aprobados = ($total_cursos_perfil > 0) ? $cursos_aprobados / $total_cursos_perfil * 100 : 0;
            $porcentaje_cursos_completados = ($total_cursos_perfil > 0) ? $cursos_inscritos / $total_cursos_perfil * 100 : 0;
            $porcentaje_promedio_cursos = $promedio_todos_cursos / 20 * 100;


            $usuario->porcentaje_intentos_por_curso = $intentos_por_curso;
            $usuario->porcentaje_cursos_aprobados = $porcentaje_cursos_aprobados;
            // $usuario->porcentaje_cursos_completados = $porcentaje_cursos_completados;
            $usuario->porcentaje_promedio_cursos = $porcentaje_promedio_cursos;

            // porcentaje total para evaluar su posicion
            $usuario->total_porcentaje = round(($porcentaje_cursos_aprobados + $porcentaje_promedio_cursos - $intentos_por_curso) / 3, 2);

            array_push($usuarios_ordenados, array('promedio' => $usuario->total_porcentaje, 'usuario' => $usuario));
        }

        // ordenar usuarios
        $promedio  = array_column($usuarios_ordenados, 'promedio');
        array_multisort($promedio, SORT_DESC, $usuarios_ordenados);

        $data = compact("perfil", "cursos", "total_cursos_perfil", "usuarios", "usuarios_ordenados");
        return view('ranking', $data);
    }
}
