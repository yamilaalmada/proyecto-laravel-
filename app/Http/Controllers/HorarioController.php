<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::all();
        return view('horario.index', compact('horarios'));
    }

    public function create()
    {
        return view('horario.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dia_semana' => 'required|string|max:15',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
            'actividad' => 'required|string|max:100',
            'responsable' => 'nullable|string|max:100',
            'aula_salon' => 'nullable|string|max:100'
        ]);

        Horario::create($request->all());

        return redirect()->route('horarios.index')
                         ->with('success', 'Horario creado exitosamente');
    }

    public function show($id)
    {
        $horario = Horario::findOrFail($id);
        return view('horario.show', compact('horario'));
    }

    public function edit($id)
    {
        $horario = Horario::findOrFail($id);
        return view('horario.edit', compact('horario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dia_semana' => 'required|string|max:15',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
            'actividad' => 'required|string|max:100',
            'responsable' => 'nullable|string|max:100',
            'aula_salon' => 'nullable|string|max:100'
        ]);

        $horario = Horario::findOrFail($id);
        $horario->update($request->all());

        return redirect()->route('horarios.index')
                         ->with('success', 'Horario actualizado exitosamente');
    }

    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();
        
        return redirect()->route('horarios.index')
                         ->with('success', 'Horario eliminado exitosamente');
    }
}