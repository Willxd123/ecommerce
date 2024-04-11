<?php

namespace App\Livewire\Admin\Productos;

use App\Models\Categoria;
use App\Models\Familia;
use App\Models\Producto;
use App\Models\Subcategoria;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductoCreate extends Component
{
    use WithFileUploads;
    public $image;
    public $familias;
    public $familia_id = '';
    public $categoria_id = '';
    public $subcategoria_id = '';

    public $producto = [
        'familia_id' => '',
        'categoria_id' => '',
        'subcategoria_id' => '',
        'nombre' => '',
        'stock' => '',
        'descripcion' => '',
        'precio' => '',
        'imagen' => '',
    ];


    public function mount()
    {
        $this->familias = Familia::all();
    }
    public function updatedProductoFamiliaId()
    {
        $this->categoria_id = '';
        $this->producto['subcategoria_id']= ''; // Cambiado a subcategoria_id en lugar de producto['subcategoria_id']
    }

    public function updatedProductoCategoriaId()
    {
        $this->producto['subcategoria_id'] = ''; // Cambiado a subcategoria_id en lugar de producto['subcategoria_id']
    }


    public function store()
    {
        $this->validate([
            'producto.subcategoria_id' => 'required|exists:subcategorias,id',
            'producto.categoria_id' => 'required|exists:categorias,id',
            'producto.familia_id' => 'required|exists:familias,id',
            'producto.nombre' => 'required|max:255',
            'producto.stock' => 'required|numeric|min:0',
            'producto.descripcion' => 'nullable',
            'producto.precio' => 'required|numeric|min:0',


            'image' => 'image|max:1024', // Validación para la imagen
        ], [], [
            'producto.subcategoria_id' => 'subcategoria',
            'producto.categoria_id' => 'categoria',
            'producto.familia_id' => 'familia',
            'producto.nombre' => 'nombre',
            'producto.stock' => 'stock',
            'producto.descripcion' => 'descripcion',
            'producto.precio' => 'precio',
        ]);
        $producto = Producto::create($this->producto);

        // Guardar la imagen en el almacenamiento y asignarla al producto
        $producto->imagen = $this->image->store('productos');
        $producto->save();
        
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien Hecho',
            'text' => 'Producto creado correctamente.'
        ]);

        return redirect()->route('admin.productos.index');
    }


    #[Computed()]
    public function categorias()
    {
        if ($this->producto['familia_id']) {
            return Categoria::where('familia_id', $this->producto['familia_id'])->get();
        } else {
            return collect(); // Retorna una colección vacía si no se ha seleccionado una familia
        }
    }

    #[Computed()]
    public function subcategorias()
    {
        if ($this->producto['categoria_id']) {
            return Subcategoria::where('categoria_id', $this->producto['categoria_id'])->get();
        } else {
            return collect(); // Retorna una colección vacía si no se ha seleccionado una categoría
        }
    }

    public function render()
    {
        return view('livewire.admin.productos.producto-create');
    }
}