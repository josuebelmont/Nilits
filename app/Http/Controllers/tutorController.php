<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class tutorController extends Controller
{
    public function index(){

        $user = Auth::user();

        $alumnos = DB::table('alumnos')->join('alumno_tutor','alumnos.codigo', '=', 'alumno_tutor.codigo')->where('alumno_tutor.id_tutor', '=', $user->nombre)->select('alumnos.*')->get() ;
        return view('tutor.index')->with('alumnos',$alumnos);
    }
}
