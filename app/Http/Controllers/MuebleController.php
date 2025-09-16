<?php

namespace App\Http\Controllers;

use App\Models\Mueble;
use Illuminate\Http\Request;

class MuebleController extends Controller
{
    public function index()
    {
        $muebles = Mueble::all();
        return view('mueble.index', compact('muebles'));
    }

    public function create()
    {
        return view('mueble.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'tipo' => 'required|string|max:50',
            'estado' => 'required|string|max:20',
            'ubicacion' => 'nullable|string|max:100'
        ]);

        Mueble::create($request->all());

        return redirect()->route('muebles.index')
                         ->with('success', 'Mueble creado exitosamente');
    }

    public function destroy($id)
    {
        $mueble = Mueble::findOrFail($id);
        $mueble->delete();
        
        return redirect()->route('muebles.index')
                         ->with('success', 'Mueble eliminado exitosamente');
    }
}