<?php

namespace App\Http\Controllers;

use App\Models\HistorialFoco;
use Illuminate\Http\Request;

class HistorialFocoController extends Controller
{
    public function index() {
        $items = HistorialFoco::all();
        return view('historialfoco.index', compact('items'));
    }

    public function create() {
        return view('historialfoco.create');
    }

    public function store(Request $request) {
        HistorialFoco::create($request->all());
        return redirect()->route('historialfoco.index');
    }

    public function edit($id) {
        $item = HistorialFoco::findOrFail($id);
        return view('historialfoco.edit', compact('item'));
    }

    public function update(Request $request, $id) {
        $item = HistorialFoco::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('historialfoco.index');
    }

    public function destroy($id) {
        HistorialFoco::findOrFail($id)->delete();
        return redirect()->route('historialfoco.index');
    }
}
