<?php

namespace App\Http\Controllers;

use App\Models\Nino;
use App\Models\Nivel;

use Illuminate\Http\Request;
use App\Http\Requests\NinoEditarNivelRequest;
use App\Http\Requests\NinosRequest;



class NinosController extends Controller
{

    public function index()
    {
        return Nino::orderBy('apellido')->get();
    }



    public function store(NinosRequest $request)
    {
        $nino = new Nino();
        $nino->nombre = $request->nombre;
        $nino->apellido = $request->apellido;
        $nino->fecha_nacimiento = $request->fecha_nacimiento;
        $nino->rut = $request->rut;
        $nino->contacto_apoderado = $request->contacto_apoderado;
        $nino->nivel_id = $request->nivel_id;
        $nino->imagen = $request->imagen;

        $nino->save();
        return $nino; 

    }

    public function show(Nino $nino)
    {
        return $nino;
    }


    public function update(Request $request, Nino $nino)
    {
        $nino->nombre = $request->nombre;
        $nino->apellido = $request->apellido;
        $nino->fecha_nacimiento = $request->fecha_nacimiento;
        $nino->rut = $request->rut;
        $nino->contacto_apoderado = $request->contacto_apoderado;
        $nino->nivel_id = $request->nivel_id;
        $nino->save();
        return $nino;
    }
    public function updateNivel(NinoEditarNivelRequest $request, Nino $nino){
        $nino->nivel_id = $request->nivel_id;
        $nino->save();
        return $nino;
    }
    public function ninoeventos(Nino $nino)
    {
        return $nino->eventos;
    }
    public function ninonivel(Nino $nino){
        return Nivel::where('id', $nino->nivel_id)->first()->nombre;
    }
    public function destroy(Nino $nino)
    {
        //File::delete(public_path($nino->imagen));
        $nino->delete();
    }
}
