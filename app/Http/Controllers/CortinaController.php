<?php

namespace App\Http\Controllers;

use App\Models\Cortina;
use Illuminate\Http\Request;

class CortinaController extends Controller
{
    public function index() {
        $items = Cortina::all();
        return view('cortina.index', compact('items'));
    }

    public function create() {
        return view('cortina.create');
    }

    public function store(Request $request) {
        Cortina::create($request->all());
        return redirect()->route('cortina.index');
    }

    public function edit($id) {
        $item = Cortina::findOrFail($id);
        return view('cortina.edit', compact('item'));
    }

    public function update(Request $request, $id) {
        $item = Cortina::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('cortina.index');
    }

    public function destroy($id) {
        Cortina::findOrFail($id)->delete();
        return redirect()->route('cortina.index');
    }
}
