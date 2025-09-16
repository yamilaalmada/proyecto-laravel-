<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Docente;
use App\Models\Mueble;
use App\Models\Materia;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with(['docente', 'mueble', 'materia'])->get();
        return view('reserva.index', compact('reservas'));
    }

    public function create()
    {
        $docentes = Docente::all();
        $muebles = Mueble::all();
        $materias = Materia::all();
        
        return view('reserva.create', compact('docentes', 'muebles', 'materias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'mueble_id' => 'required|exists:muebles,id',
            'materia_id' => 'required|exists:materias,id',
            'fecha_reserva' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'observaciones' => 'nullable|string'
        ]);

        Reserva::create($request->all());

        return redirect()->route('reservas.index')
                         ->with('success', 'Reserva creada exitosamente');
    }

    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        $docentes = Docente::all();
        $muebles = Mueble::all();
        $materias = Materia::all();
        
        return view('reserva.edit', compact('reserva', 'docentes', 'muebles', 'materias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'mueble_id' => 'required|exists:muebles,id',
            'materia_id' => 'required|exists:materias,id',
            'fecha_reserva' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'estado' => 'required|in:pendiente,confirmada,cancelada',
            'observaciones' => 'nullable|string'
        ]);

        $reserva = Reserva::findOrFail($id);
        $reserva->update($request->all());

        return redirect()->route('reservas.index')
                         ->with('success', 'Reserva actualizada exitosamente');
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();
        
        return redirect()->route('reservas.index')
                         ->with('success', 'Reserva eliminada exitosamente');
    }
}
