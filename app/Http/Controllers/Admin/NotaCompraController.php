<?php

namespace App\Http\Controllers\Admin;

//use App\Http\Controllers\Controller;

use App\Models\Bitacora;
use App\Models\DetalleCompra;
use App\Models\NotaCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class NotaCompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.nota_compras.index')->only('index');
        $this->middleware('can:admin.nota_compras.show')->only('show');
        $this->middleware('can:admin.nota_compras.create')->only('create', 'store');
    }

    public function index()
    {
        $compras = NotaCompra::orderBy('id', 'desc')->paginate(10);
        return view('admin.nota_compras.index', compact('compras'));
    }


    public function create()
    {
        return view('admin.nota_compras.create');
    }

    public function show(string $id)
    {
        $compras = NotaCompra::findOrFail($id);
        $detalles = DetalleCompra::where('nota_compra_id', $id)->get();
        return view('admin.nota_compras.ver', compact('compras', 'detalles'));
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
