<?php

namespace App\Http\Controllers;

use App\Models\HistorialUsoAireacondicionado;
use Illuminate\Http\Request;

class HistorialUsoAireacondicionadoController extends Controller
{
    public function index() {
        $items = HistorialUsoAireacondicionado::all();
        return view('historialusoaireacondicionado.index', compact('items'));
    }

    public function create() {
        return view('historialusoaireacondicionado.create');
    }

    public function store(Request $request) {
        HistorialUsoAireacondicionado::create($request->all());
        return redirect()->route('historialusoaireacondicionado.index');
    }

    public function edit($id) {
        $item = HistorialUsoAireacondicionado::findOrFail($id);
        return view('historialusoaireacondicionado.edit', compact('item'));
    }

    public function update(Request $request, $id) {
        $item = HistorialUsoAireacondicionado::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('historialusoaireacondicionado.index');
    }

    public function destroy($id) {
        HistorialUsoAireacondicionado::findOrFail($id)->delete();
        return redirect()->route('historialusoaireacondicionado.index');
    }
}
