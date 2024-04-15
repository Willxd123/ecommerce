<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Familia;
use App\Models\Producto;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::orderBy('id', 'desc')->with('subcategoria.categoria.familia')->paginate(10);
        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.productos.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subcategoria_id' => 'required|exists:subcategoria,id',
            'categoria_id' => 'required|exists:categoria,id',
            'familia_id' => 'required|exists:familia,id',
            'nombre' => 'required',
        ]);

        Producto::create([
            'grado_id' => $request->grado_id,
            'tutor_id' => $request->tutor_id,
            'nombre' => $request->nombre,
            'sexo' => $request->sexo,
            'apellido' => $request->apellido,

        ]);

        return redirect()->route('admin.estudiantes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('admin.productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
