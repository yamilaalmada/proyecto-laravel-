<?php

namespace App\Http\Controllers;

use App\Models\Materia; // ← CORREGIDO: Models en lugar de Model
use Illuminate\Http\Request;

class MateriaController extends Controller // ← CORREGIDO: MateriaController
{
    public function index()
    {
        $materias = Materia::all();
        return view('materia.index', compact('materias'));
    }

    public function create()
    {
        return view('materia.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string'
        ]);

        Materia::create($request->all());

        return redirect()->route('materias.index')
                         ->with('success', 'Materia creada exitosamente');
    }

    public function edit($id)
    {
        $materia = Materia::findOrFail($id);
        return view('materia.edit', compact('materia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string'
        ]);

        $materia = Materia::findOrFail($id);
        $materia->update($request->all());

        return redirect()->route('materias.index')
                         ->with('success', 'Materia actualizada exitosamente');
    }

    public function destroy($id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();
        
        return redirect()->route('materias.index')
                         ->with('success', 'Materia eliminada exitosamente');
    }
}