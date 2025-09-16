<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MickeyController extends Controller
{
    public function index()
    {
        // Datos simulados de "popularidad" de personajes Disney
        $characters = [
            ['name' => 'Mickey Mouse', 'popularity' => 98],
            ['name' => 'Minnie Mouse', 'popularity' => 92],
            ['name' => 'Donald Duck', 'popularity' => 85],
            ['name' => 'Goofy', 'popularity' => 78],
            ['name' => 'Pluto', 'popularity' => 70],
        ];

        return view('mickey', compact('characters'));
    }
}