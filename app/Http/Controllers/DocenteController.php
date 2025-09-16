<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Intentar obtener datos de la base de datos
            $docentes = Docente::all();
            
            // Si no hay datos en BD, usar datos de prueba
            if ($docentes->count() === 0) {
                $docentes = $this->getDatosPrueba();
            }
            
            return view('docentes.index', compact('docentes'));
            
        } catch (\Exception $e) {
            Log::error('Error al obtener docentes: ' . $e->getMessage());
            
            // En caso de error, usar datos de prueba
            $docentes = $this->getDatosPrueba();
            return view('docentes.index', compact('docentes'))
                ->with('error', 'Error de conexión a la base de datos. Mostrando datos de prueba.');
        }
    }

    /**
     * Datos de prueba para desarrollo
     */
    private function getDatosPrueba()
    {
        return collect([
            (object)[
                'id' => 1,
                'nombre' => 'Juan Pérez',
                'materia' => 'Matemáticas',
                'hora_clase' => '08:00:00',
                'curso' => '5to A',
                'estado' => 'activo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            (object)[
                'id' => 2,
                'nombre' => 'María García',
                'materia' => 'Ciencias Naturales',
                'hora_clase' => '10:30:00',
                'curso' => '4to B',
                'estado' => 'inactivo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            (object)[
                'id' => 3,
                'nombre' => 'Carlos Rodríguez',
                'materia' => 'Historia',
                'hora_clase' => '14:00:00',
                'curso' => '6to C',
                'estado' => 'activo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            (object)[
                'id' => 4,
                'nombre' => 'Ana Martínez',
                'materia' => 'Literatura',
                'hora_clase' => '09:45:00',
                'curso' => '3ro A',
                'estado' => 'activo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            (object)[
                'id' => 5,
                'nombre' => 'Pedro López',
                'materia' => 'Educación Física',
                'hora_clase' => '11:15:00',
                'curso' => '5to B',
                'estado' => 'inactivo',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('docentes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'materia' => 'required|string|max:255',
                'hora_clase' => 'required|date_format:H:i',
                'curso' => 'required|string|max:50',
                'estado' => 'required|in:activo,inactivo'
            ]);

            Docente::create($request->all());

            return redirect()->route('docentes.index')
                ->with('success', 'Docente creado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al crear docente: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error al crear el docente. Por favor, intente nuevamente.');
        }
    }

    /**
     * Iniciar clase para un docente.
     */
    public function iniciarClase($id)
    {
        try {
            $docente = Docente::findOrFail($id);
            $docente->estado = 'activo';
            $docente->save();

            return redirect()->route('docentes.index')
                ->with('success', 'Clase iniciada exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al iniciar clase: ' . $e->getMessage());
            return redirect()->route('docentes.index')
                ->with('error', 'Error al iniciar la clase.');
        }
    }

    /**
     * Finalizar clase para un docente.
     */
    public function finalizarClase($id)
    {
        try {
            $docente = Docente::findOrFail($id);
            $docente->estado = 'inactivo';
            $docente->save();

            return redirect()->route('docentes.index')
                ->with('success', 'Clase finalizada exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al finalizar clase: ' . $e->getMessage());
            return redirect()->route('docentes.index')
                ->with('error', 'Error al finalizar la clase.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $docente = Docente::findOrFail($id);
            return view('docentes.show', compact('docente'));
        } catch (\Exception $e) {
            Log::error('Error al mostrar docente: ' . $e->getMessage());
            return redirect()->route('docentes.index')
                ->with('error', 'Docente no encontrado.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $docente = Docente::findOrFail($id);
            return view('docentes.edit', compact('docente'));
        } catch (\Exception $e) {
            Log::error('Error al editar docente: ' . $e->getMessage());
            return redirect()->route('docentes.index')
                ->with('error', 'Docente no encontrado.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'materia' => 'required|string|max:255',
                'hora_clase' => 'required|date_format:H:i',
                'curso' => 'required|string|max:50',
                'estado' => 'required|in:activo,inactivo'
            ]);

            $docente = Docente::findOrFail($id);
            $docente->update($request->all());

            return redirect()->route('docentes.index')
                ->with('success', 'Docente actualizado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar docente: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error al actualizar el docente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $docente = Docente::findOrFail($id);
            $docente->delete();

            return redirect()->route('docentes.index')
                ->with('success', 'Docente eliminado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar docente: ' . $e->getMessage());
            return redirect()->route('docentes.index')
                ->with('error', 'Error al eliminar el docente.');
        }
    }

    /**
     * Ruta para poblar la base de datos con datos de prueba
     */
    public function poblarDatosPrueba()
    {
        try {
            $datosPrueba = [
                [
                    'nombre' => 'Juan Pérez',
                    'materia' => 'Matemáticas',
                    'hora_clase' => '08:00',
                    'curso' => '5to A',
                    'estado' => 'activo'
                ],
                [
                    'nombre' => 'María García',
                    'materia' => 'Ciencias Naturales',
                    'hora_clase' => '10:30',
                    'curso' => '4to B',
                    'estado' => 'inactivo'
                ],
                [
                    'nombre' => 'Carlos Rodríguez',
                    'materia' => 'Historia',
                    'hora_clase' => '14:00',
                    'curso' => '6to C',
                    'estado' => 'activo'
                ],
                [
                    'nombre' => 'Ana Martínez',
                    'materia' => 'Literatura',
                    'hora_clase' => '09:45',
                    'curso' => '3ro A',
                    'estado' => 'activo'
                ],
                [
                    'nombre' => 'Pedro López',
                    'materia' => 'Educación Física',
                    'hora_clase' => '11:15',
                    'curso' => '5to B',
                    'estado' => 'inactivo'
                ]
            ];

            foreach ($datosPrueba as $dato) {
                Docente::create($dato);
            }

            return redirect()->route('docentes.index')
                ->with('success', 'Datos de prueba creados exitosamente!');

        } catch (\Exception $e) {
            return redirect()->route('docentes.index')
                ->with('error', 'Error al crear datos de prueba: ' . $e->getMessage());
        }
    }
}