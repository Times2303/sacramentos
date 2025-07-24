<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Support\Facades\DB;
use App\Models\TipoIdentificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PersonasController extends Controller
{
    
    public function index()
    {
        //pagina de inicio
        $datos = Personas::with('tipoidentificacion')->paginate(10); //trae los datos de la tabla tipoidentificacion
        return view('modules/InicioPersona', compact('datos'));

    }

    public function create()
    {
        $tipos = TipoIdentificacion::all(); // Aquí obtienes los tipos
    return view('modules/CreatePersona', compact('tipos')); // Y los pasas a la vista
        
    }

    public function store(Request $request)
    {
        // Sirve para guardar datos en la bd
        try {
            DB::select('CALL insertar_persona(?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->input('numero_identificacion'),
            $request->input('nombres'),
            $request->input('apellido1'),
            $request->input('apellido2'),
            $request->input('email'),
            $request->input('fec_nacimiento'),
            $request->input('direccion'),
            $request->input('celular'),
            $request->input('tipo_identificacion'),
        ]);
            return redirect()->route('personas.index')->with('success', 'Se creó correctamente.');
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

    public function show(Personas $personas)
    {
        
    }

    public function edit(Personas $personas)
    {
        // Este metodo sirve para traer datos de la bd y mostrarlos en un formulario para editar (vista)
    }

    public function update(Request $request, Personas $personas)
    {
        //Actualiza los datos en la BD
    }

    public function destroy(Personas $personas)
    {
        //Elimina un registro de la BD
    }
}
