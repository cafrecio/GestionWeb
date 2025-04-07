<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;

class ProvinciaController extends Controller
{
    public function index()
    {
        $provincias = Provincia::all();
        return view('provincias.index', compact('provincias'));
    }

    public function create()
    {
        return view('provincias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Provincia::create($request->all());

        return redirect()->route('configuracion.provincias.index')->with('success', 'Provincia creada correctamente.');
    }

    public function edit(Provincia $provincia)
    {
        return view('configuracion.provincias.edit', compact('provincia'));
    }

    public function update(Request $request, Provincia $provincia)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $provincia->update($request->all());

        return redirect()->route('configuracion.provincias.index')->with('success', 'Provincia actualizada correctamente.');
    }

    public function destroy(Provincia $provincia)
    {
        $provincia->delete();

        return redirect()->route('configuracion.provincias.index')->with('success', 'Provincia eliminada correctamente.');
    }
}

