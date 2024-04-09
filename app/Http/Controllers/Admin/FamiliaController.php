<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Familia;
use Illuminate\Http\Request;

class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //migrasion = modulo (identifica al modulo y la bd para la funcionalidad)
        $familias = Familia::orderBy('id', 'desc')->paginate(10);
        return view('admin.familias.index', compact('familias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.familias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);
        Familia::create($request->all());
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=>'Bien Hecho',
            'text' => 'Familia creada correctamente.'
        ]);
        return redirect()->route('admin.familias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Familia $familia)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Familia $familia)
    {
        return view('admin.familias.edit', compact('familia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Familia $familia)
    {
        $request->validate([
            'nombre' => 'required'
        ]);
        $familia->update($request->all());

        session()->flash('swal',[
            'icon'=> 'success',
            'title'=>'Bien Hecho',
            'text' => 'Familia actualizada correctamente.'
        ]);

        return redirect()->route('admin.familias.index', $familia);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Familia $familia)
    {
        if($familia->categorias->count()>0){
            session()->flash('swal',[
                'icon'=> 'error',
                'title'=>'¡Ups!',
                'text' => 'No se puede eliminar la familia porque tiene categorias asociadas.'
            ]);
            return redirect()->route('admin.familias.edit',$familia);
        }
        $familia->delete();
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=>'¡Bien hecho!',
            'text' => 'Familia eliminada correctamente.'
        ]);
        return redirect()->route('admin.familias.index');
    }
}
