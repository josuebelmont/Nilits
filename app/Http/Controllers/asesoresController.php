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
}
