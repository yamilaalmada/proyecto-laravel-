<?php

namespace App\Http\Controllers;

use App\Models\Aireacondicionado;
use Illuminate\Http\Request;

class AireacondicionadoController extends Controller
{
    public function index() {
        $items = Aireacondicionado::all();
        return view('aireacondicionado.index', compact('items'));
    }

    public function create() {
        return view('aireacondicionado.create');
    }

    public function store(Request $request) {
        Aireacondicionado::create($request->all());
        return redirect()->route('aireacondicionado.index');
    }

    public function edit($id) {
        $item = Aireacondicionado::findOrFail($id);
        return view('aireacondicionado.edit', compact('item'));
    }

    public function update(Request $request, $id) {
        $item = Aireacondicionado::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('aireacondicionado.index');
    }

    public function destroy($id) {
        Aireacondicionado::findOrFail($id)->delete();
        return redirect()->route('aireacondicionado.index');
    }
}
