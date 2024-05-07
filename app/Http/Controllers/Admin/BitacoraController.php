<?php

namespace App\Http\Controllers\Admin;

//use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller;
use App\Models\Bitacora;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.bitacora.index')->only('index');
        $this->middleware('can:admin.bitacora.edit')->only('edit', 'update');
        $this->middleware('can:admin.bitacora.create')->only('create', 'store');
    }

    public function index(){
        $bitacoras = Bitacora::orderBy('id', 'desc')->paginate(10);
        return view('admin.bitacora.index', compact('bitacoras'));
    }
}
