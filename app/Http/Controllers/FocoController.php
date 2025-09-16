<?php

namespace App\Http\Controllers;

use App\Models\Foco;
use Illuminate\Http\Request;

class FocoController extends Controller
{
    public function index() {
        $items = Foco::all();
        return view('foco.index', compact('items'));
    }

    public function create() {
        return view('foco.create');
    }

    public function store(Request $request) {
        Foco::create($request->all());
        return redirect()->route('foco.index');
    }

    public function edit($id) {
        $item = Foco::findOrFail($id);
        return view('foco.edit', compact('item'));
    }

    public function update(Request $request, $id) {
        $item = Foco::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('foco.index');
    }

    public function destroy($id) {
        Foco::findOrFail($id)->delete();
        return redirect()->route('foco.index');
    }
}
