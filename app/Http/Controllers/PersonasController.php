<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Support\Facades\DB;
use App\Models\TipoIdentificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PersonasController extends Controller
{
    
    public function index(Request $request)
    {
    // Obtener el texto a buscar desde el input 'buscar'
    $busqueda = $request->input('buscar');

    // Consulta con relación a tipoidentificacion
    $query = Personas::with('tipoidentificacion');
    

    // Si hay búsqueda, se aplica el filtro
    if (!empty($busqueda)) {
        $query->where(function ($q) use ($busqueda) {
            $q  ->where('nombres', 'LIKE', "%$busqueda%")
                ->orWhere('apellido1', 'LIKE', "%$busqueda%")
                ->orWhere('apellido2', 'LIKE', "%$busqueda%")
                ->orWhere('numero_identificacion', 'LIKE', "%$busqueda%");
        });
    }

    // Obtener los resultados paginados y mantener el filtro en la URL
    $datos = $query->paginate(10)->appends(['buscar' => $busqueda]);

    // Retornar la vista con los datos y el texto buscado
    return view('modules.persona.InicioPersona', compact('datos', 'busqueda'));
    }

    public function create()
    {
        $tipos = TipoIdentificacion::all(); // Aquí obtienes los tipos
    return view('modules.persona.CreatePersona', compact('tipos')); // Y los pasas a la vista
        
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
        $personas->load('tipoidentificacion'); // Trae los datos de la persona a editar
        $tipos = TipoIdentificacion::all();
        return view('modules.persona.EditPersona', compact('personas', 'tipos'));
    }

    public function update(Request $request, Personas $personas)
    {
        //Actualiza los datos en la BD
        try {
            db::select('CALL actualizar_persona(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
                $personas->idPersonas,
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
            return redirect()->route('personas.index')->with('success', 'Persona actualizada correctamente.');
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

    public function destroy(Personas $personas)
    {
        $persona = Personas::find($personas->idPersonas);
        $persona->delete();
        return redirect()->route('personas.index')->with('success', 'Persona eliminada correctamente.');
    }
}
