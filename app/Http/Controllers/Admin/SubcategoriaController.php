<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategorias = Subcategoria::orderBy('id', 'desc')->with('categoria.familia')->paginate(10);
        return view('admin.subcategorias.index', compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('admin.subcategorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required|exists:grados,id',
            'nombre' => 'required',
        ]);

        Subcategoria::create([
            'subcategoria_id' => $request->grado_id,
            'nombre' => $request->nombre,

        ]);
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=>'Bien Hecho',
            'text' => 'Familia creada correctamente.'
        ]);
        return redirect()->route('admin.subcategorias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategoria $subcategoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategoria $subcategoria)
    {
        return view('admin.subcategorias.edit', compact('subcategoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategoria $subcategoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategoria $subcategoria)
    {
        if($subcategoria->productos()->count()>0){
            session()->flash('swal',[
                'icon' => 'error',
                'title' => '¡ups!',
                'text' => 'no se puede eliminar la subcategoria por que tiene productos asocciadios'
            ]);
            return redirect()->route('admin.subcategorias.edit', $subcategoria);
        }
        $subcategoria->delete();
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=>'¡Bien hecho!',
            'text' => 'Subcategoria eliminada correctamente.'
        ]);
        return redirect()->route('admin.subcategorias.index');
    }
}
