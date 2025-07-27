<?php

namespace App\Http\Controllers;

use App\Models\Jerarquias;
use App\Models\Parroquias;
use Illuminate\Http\Request;
use App\Models\Personas;
use App\Models\Sacerdotes;
use App\Models\TipoIdentificacion;
use Illuminate\Support\Facades\DB;

class SacerdotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sacerdotes = Sacerdotes::with(['persona.tipoidentificacion', 'jerarquia'])->paginate(10);
        return view('modules.sacerdote.InicioSacerdote', compact('sacerdotes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = TipoIdentificacion::all();
        $jerarquias = Jerarquias::all();
        $parroquias = Parroquias::all();
        return view('modules.sacerdote.CreateSacerdotePersona', compact('tipos', 'jerarquias', 'parroquias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            db::select('CALL insertar_persona_sacerdote(?,?,?,?,?,?,?,?,?,?,?,?,?)', [
                $request->input('numero_identificacion'),
                $request->input('nombres'),
                $request->input('apellido1'),
                $request->input('apellido2'),
                $request->input('email'),
                $request->input('fec_nacimiento'),
                $request->input('direccion'),
                $request->input('celular'),
                $request->input('tipo_identificacion'),
                $request->input('jerarquia'),
                $request->input('parroquia'),
                $request->input('fec_inicio'),
                $request->input('fec_final')
            ]);
            return redirect()->route('sacerdotes.index')->with('success', 'Sacerdote designado');
        } catch (\Throwable $th) {
            $mensaje = $th->getMessage();
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
        $jerarquias = Jerarquias::all();
        $parroquias = Parroquias::all();
        return view('modules.sacerdote.CreateSacerdote', compact('id', 'jerarquias', 'parroquias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            db::select(' CALL insertar_sacerdote(?,?,?,?,?)', [
                $id,
                $request->input('jerarquia'),
                $request->input('parroquia'),
                $request->input('fec_inicio'),
                $request->input('fec_final'),
            ]);
            return redirect()->route('sacerdotes.index')->with('success', 'Sacerdote designado');
        } catch (\Throwable $th) {
            $mensaje = $th->getMessage();
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sacerdote = Sacerdotes::find($id);
        $sacerdote->delete();
        return redirect()->route('sacerdotes.index')->with('success', 'Sacerdote eliminado correctamente.');
    }

    // Nuevo metodo 
    public function seleccionarPersona()
{
    $modo = 'sacerdote';
    $datos = Personas::with('tipoidentificacion')->paginate(10);
    return view('modules.persona.InicioPersona', compact('datos', 'modo'));
}
    
    public function edit2($id)
{
    // Buscar al sacerdote con sus relaciones
    $sacerdote = Sacerdotes::findOrFail($id);

    // Obtener jerarquías y parroquias para los selects
    $jerarquias = Jerarquias::all();
    $parroquias = Parroquias::all();

    return view('modules.sacerdote.EditSacerdote', compact('sacerdote', 'jerarquias', 'parroquias'));
}

    public function update2(Request $request, string $id)
{
    try {
        db::select(' CALL actualizar_sacerdote(?,?,?,?,?)', [
            $id,
            $request->input('jerarquia'),
            $request->input('parroquia'),
            $request->input('fec_inicio'),
            $request->input('fec_final'),
        ]);
        return redirect()->route('sacerdotes.index')->with('success', 'Sacerdote actualizado');
    } catch (\Throwable $th) {
        $mensaje = $th->getMessage();
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
}
