<?php

namespace App\Http\Controllers;

use App\Models\alumno_tutorModel;
use App\Models\alumnos_model;
use App\Models\maestrosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class alumnosContorller extends Controller
{
    public function index()
{
    $totalRegistros = alumnos_model::count();
    $totalEgresados = alumnos_model::where('estatus', 3)->count();
    $totalActivos = alumnos_model::where('estatus', 1)->count();
    $totalBajas = alumnos_model::where('estatus', 4)->count();

    // Solo mostrar a los alumnos con tutor y aplicar paginación
    $alumnos = DB::table('alumnos')
        ->leftJoin('alumno_tutor', 'alumnos.codigo', '=', 'alumno_tutor.codigo')
        ->leftJoin('maestros', 'alumno_tutor.id_tutor', '=', 'maestros.codigo')
        ->select('alumnos.*', 'maestros.Nombre as tutor')
        ->paginate(10); // Aquí especificas cuántos alumnos por página quieres

    // Listar a los maestros para poder asignarlos al crear un registro
    $tutores = maestrosModel::all();

    return view('alumnos.index', compact('totalRegistros', 'tutores', 'totalEgresados', 'totalActivos', 'totalBajas', 'alumnos'));
}



    //Mostrar alumnos sin tutor

    public function alumno_sin_tutor(){
        $alumnos = DB::table('alumnos')
        ->leftJoin('alumno_tutor', 'alumnos.codigo', '=', 'alumno_tutor.codigo')
        ->leftJoin('maestros', 'alumno_tutor.id_tutor', '=', 'maestros.codigo')
        ->whereNull('maestros.codigo')
        ->select('alumnos.*')
        ->get();
        $tutores = maestrosModel::all();

        return view('alumnos.alumnos_sin_tutor',compact('alumnos','tutores'));
    }


    public function asignar_tutor(Request $request, alumnos_model $alumno)
    {
        $validatedData = $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            //'telefono' => 'required',
            //'sexo' => 'required',
            'procedencia' => 'required',
            'correo' => 'required',
            //'fechaNac' => 'required',
            //'dictamen' => 'required',
            //'estatus' => 'required',
            'tutor' => 'required'
            // Agrega aquí el resto de las validaciones necesarias
        ]);


        $tutor_alumno = new alumno_tutorModel();
        //$alumno->codigo = $validatedData['codigo'];
        $alumno->Nombre = $validatedData['nombre'];
        //$alumno->telefono = $validatedData['telefono'];
        $alumno->correo = $validatedData['correo'];
        //$alumno->sexo = $validatedData['sexo'];
        //$alumno->procedencia = $validatedData['procedencia'];
        //$alumno->fechaNac = $validatedData['fechaNac'];
        //$alumno->dictamen = $validatedData['dictamen'];
        //$alumno->estatus = $validatedData['estatus'];

        $tutor_alumno->codigo = $validatedData['codigo'];
        $tutor_alumno->id_tutor = $validatedData['tutor'];
        $tutor_alumno->activo = 1;
        // Asigna el resto de los campos
        $tutor_alumno->save();
        $alumno->update();

        return redirect()->back()->with('success', 'Alumno creado exitosamente');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'telefono' => 'required',
            'sexo' => 'required',
            'procedencia' => 'required',
            'correo' => 'required',
            'fechaNac' => 'required',
            'dictamen' => 'required',
            'estatus' => 'required',
            'tutor' => 'required'
            // Agrega aquí el resto de las validaciones necesarias
        ]);

        $alumno = new alumnos_model();
        $tutor_alumno = new alumno_tutorModel();
        $alumno->codigo = $validatedData['codigo'];
        $alumno->Nombre = $validatedData['nombre'];
        $alumno->telefono = $validatedData['telefono'];
        $alumno->correo = $validatedData['correo'];
        $alumno->sexo = $validatedData['sexo'];
        $alumno->procedencia = $validatedData['procedencia'];
        $alumno->fechaNac = $validatedData['fechaNac'];
        $alumno->dictamen = $validatedData['dictamen'];
        $alumno->estatus = $validatedData['estatus'];

        $tutor_alumno->codigo = $validatedData['codigo'];
        $tutor_alumno->id_tutor = $validatedData['tutor'];
        $tutor_alumno->activo = 1;
        // Asigna el resto de los campos
        $tutor_alumno->save();
        $alumno->save();

        return redirect()->back()->with('success', 'Alumno creado exitosamente');
    }

    //edit function
    public function edit($codigo)
    {
        $alumno = alumnos_model::find($codigo);
        return response()->json($alumno);
    }

    //update function
    public function update(Request $request, $codigo)
    {
        $alumno = alumnos_model::find($codigo);
        // Actualiza los datos del alumno
        $alumno->update($request->all());
        return redirect()->route('ruta.donde.este.la.lista');
    }
}
