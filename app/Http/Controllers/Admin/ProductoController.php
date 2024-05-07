<?php

namespace App\Http\Controllers\Admin;

//use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller;
use App\Models\Categoria;
use App\Models\Familia;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.productos.index')->only('index');
        $this->middleware('can:admin.productos.edit')->only('edit', 'update');
        $this->middleware('can:admin.productos.create')->only('create', 'store');
    }

    public function index()
    {
        $productos = Producto::orderBy('id', 'desc')->with('subcategoria.categoria.familia')->paginate(10);
        return view('admin.productos.index', compact('productos'));
    }

    public function create()
    {

        return view('admin.productos.create');

    }

    public function store(Request $request)
    {
       

    }

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
        $producto->delete();
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=>'Excelente!',
            'text' => 'El usuario fue eliminado.'
        ]);

        return redirect()->route('admin.productos.index' );
    }
}
