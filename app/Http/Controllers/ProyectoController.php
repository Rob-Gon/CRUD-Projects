<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        $listaProyectos = Proyecto::paginate(10);
        return view('proyectos.index', ['listaProyectos' => $listaProyectos]);
    }

    public function create()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.create', ['proyectos' => $proyectos]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required',
            'precio' => 'required',
            'estado' => 'required',
        ]);

        $proyecto = new Proyecto();

        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->categoria = $request->categoria;
        $proyecto->precio = $request->precio;
        $proyecto->estado = $request->estado;

        $proyecto->save();

        return redirect()->route('proyectos.index');
    }

    public function show(Proyecto $proyecto)
    {
        $proyecto = Proyecto::find($proyecto->id);
        return view('proyectos.show', ['proyecto' => $proyecto]);
    }

    public function edit(Proyecto $proyecto)
    {
        $proyecto = Proyecto::find($proyecto->id);
        return view('proyectos.edit', ['proyecto' => $proyecto]);
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required',
            'precio' => 'required',
            'estado' => 'required',
        ]);

        $proyecto = Proyecto::find($proyecto->id);

        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->categoria = $request->categoria;
        $proyecto->precio = $request->precio;
        $proyecto->estado = $request->estado;

        $proyecto->save();

        return redirect()->route('proyectos.index');
    }

    public function destroy(Proyecto $proyecto)
    {
        $proyecto = Proyecto::find($proyecto->id);
        $proyecto->delete();

        return redirect()->route('proyectos.index');
    }
}
