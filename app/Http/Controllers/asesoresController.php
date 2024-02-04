<?php

namespace App\Http\Controllers;

use App\Models\maestrosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class asesoresController extends Controller
{
    //
    public function index(){
        $maestros = DB::table('maestros')->where('Activo','=',1)->get();

        return view('asesores.index')->with('maestros',$maestros);
    }

    public function getionarT(){
        $maestros = DB::table('maestros')
                        ->leftJoin('alumno_tutor', 'maestros.codigo', '=', 'alumno_tutor.id_tutor')
                        ->select('maestros.*', DB::raw('COUNT(alumno_tutor.codigo) as NumeroTutorados'))
                        ->where('maestros.Activo', '=', 1)
                        ->groupBy('maestros.codigo', 'maestros.id', 'maestros.Nombre', 'maestros.Apellido', 'maestros.grado', 'maestros.nombramiento', 'maestros.cargaHoraria', 'maestros.correo', 'maestros.telefonoFijo', 'maestros.telCel', 'maestros.telExt', 'maestros.observaciones', 'maestros.adscripcion', 'maestros.Activo')
                        ->get();

        return view('tutores.index', compact('maestros'));
    }

    public function getTutorados($maestroId)
{
    $tutorados = DB::table('alumno_tutor')
                    ->join('alumnos', 'alumno_tutor.codigo', '=', 'alumnos.codigo')
                    ->where('alumno_tutor.id_tutor', $maestroId)
                    ->select('alumnos.*') // Ajusta esto según la estructura de tu tabla de alumnos
                    ->get();

    return response()->json($tutorados);
}





}
