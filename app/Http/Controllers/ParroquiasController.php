<?php

namespace App\Http\Controllers;

use App\Models\Parroquias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParroquiasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Texto= 'Crear';
        $parroquias = Parroquias::all();
        return view('modules.parroquia.InicioParroquia', compact('parroquias', 'Texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            db::select('CALL insertar_parroquia(?,?,?)', [
                $request->input('nom_parroquia'),
                $request->input('dir_parroquia'),
                $request->input('lugar')
            ]);
            return redirect()->route('parroquias.index')->with('success', 'Parroquia creada con éxito');
        } catch (\Throwable $th) {
            $mensaje = $th->getMessage();

            // Buscar si hay un mensaje SQLSTATE
            if (str_contains($mensaje, 'SQLSTATE')) {
                // Extrae solo el mensaje del trigger, antes de "(Connection:"
                preg_match('/\d{4} (.+?) \(Connection:/', $mensaje, $coincidencias);
                $mensaje = $coincidencias[1] ?? 'Ocurrió un error.';
            }

            return redirect()->back()
                ->withInput()
                ->with('error', $mensaje);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Texto= 'Actualizar';
        $parroquia = Parroquias::findOrFail($id);
        $parroquias = Parroquias::all(); // Para la tabla
        return view('modules.parroquia.InicioParroquia', compact('parroquias', 'parroquia', 'Texto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            db::select('CALL actualizar_parroquia(?,?,?,?)', [
                $request->input('nom_parroquia'),
                $request->input('dir_parroquia'),
                $request->input('lugar'),
                $id
            ]);
            return redirect()->route('parroquias.index')->with('success', 'Parroquia actualizada con éxito');
        } catch (\Throwable $th) {
            $mensaje = $th->getMessage();
            if (str_contains($mensaje, 'SQLSTATE')) {
                preg_match('/\d{4} (.+?) \(Connection:/', $mensaje, $coincidencias);
                $mensaje = $coincidencias[1] ?? 'Ocurrió un error.';
            }
            return redirect()->back()
                ->withInput()
                ->with('error', $mensaje);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $parroquia = Parroquias::findOrFail($id);
        $parroquia->delete();
        return redirect()->route('parroquias.index')->with('success', 'Parroquia eliminada con éxito');
    }
}
