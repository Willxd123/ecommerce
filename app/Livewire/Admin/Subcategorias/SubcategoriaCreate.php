<?php

namespace App\Livewire\Admin\Subcategorias;

use App\Models\Categoria;
use App\Models\Familia;
use App\Models\Subcategoria;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SubcategoriaCreate extends Component
{
    public $familias;
    public $subcategoria = [
        'familia_id' => '',
        'categoria_id' => '',
        'nombre' => '',
    ];


    public function mount()
    {
        $this->familias = Familia::all();
    }
    public function updatedSubcategoriaFamiliaId()
    {
        $this->subcategoria['categoria_id'] = '';
    }
    public function save()
    {
        $this->validate([
            'subcategoria.categoria_id' => 'required|exists:categorias,id',
            'subcategoria.familia_id' => 'required|exists:familias,id',
            'subcategoria.nombre' => 'required',
        ], [], [
            'subcategoria.categoria_id' => 'categoria',
            'subcategoria.familia_id' => 'familia',
            'subcategoria.nombre' => 'nombre',
        ]);
        Subcategoria::create($this->subcategoria);
        return redirect()->route('admin.subcategorias.index');
    }

    #[Computed()]
    public function categorias()
    {
        if ($this->subcategoria['familia_id']) {
            return Categoria::where('familia_id', $this->subcategoria['familia_id'])->get();
        } else {
            return collect(); // Retorna una colección vacía si no se ha seleccionado una familia
        }
    }
    public function render()
    {

        return view('livewire.admin.subcategorias.subcategoria-create');
    }
}
