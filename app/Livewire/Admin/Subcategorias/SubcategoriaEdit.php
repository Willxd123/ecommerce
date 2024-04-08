<?php

namespace App\Livewire\Admin\Subcategorias;

use App\Models\Categoria;
use App\Models\Familia;
use App\Models\Subcategoria;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SubcategoriaEdit extends Component
{
    public $subcategoria;
    public $familias;
    public $subcategoriaEdit ;


    public function mount($subcategoria)
    {
        $this->familias = Familia::all();
        $this->subcategoriaEdit = [
            'familia_id' => $subcategoria->categoria->familia_id,
            'categoria_id' => $subcategoria->categoria_id,
            'nombre' => $subcategoria->name,
        ];
    }
    public function updatedSubcategoriaEditFamiliaId()
    {
        $this->subcategoriaEdit['categoria_id'] = '';
    }

    #[Computed()]
    public function categorias()
    {
        if ($this->subcategoriaEdit['familia_id']) {
            return Categoria::where('familia_id', $this->subcategoriaEdit['familia_id'])->get();
        } else {
            return collect(); // Retorna una colección vacía si no se ha seleccionado una familia
        }
    }
    public function save()
    {
        $this->validate([
            'subcategoriaEdit.categoria_id' => 'required|exists:categorias,id',
            'subcategoriaEdit.familia_id' => 'required|exists:familias,id',
            'subcategoriaEdit.nombre' => 'required',
        ], [], [
            'subcategoriaEdit.categoria_id' => 'categoria',
            'subcategoriaEdit.familia_id' => 'familia',
            'subcategoriaEdit.nombre' => 'nombre',
        ]);
        $this->subcategoria->update($this->subcategoriaEdit);

        return redirect()->route('admin.subcategorias.index');
    }

    public function render()
    {
        return view('livewire.admin.subcategorias.subcategoria-edit');
    }
}
