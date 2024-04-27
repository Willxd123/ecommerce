<?php

namespace App\Livewire\Admin\Productos;

use App\Models\Categoria;
use App\Models\Familia;
use App\Models\Producto;
use App\Models\Subcategoria;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductoEdit extends Component
{

    use WithFileUploads;
    public $categorias;
    public $subcategorias;
    public $familias;
    public $familia_id = '';
    public $categoria_id = '';
    public $subcategoria_id = '';
    public $producto;
    public $productoEdit;
    public $image;


    public function mount($producto)
    {

        $this->productoEdit = $producto->only('nombre','descripcion','stock','precio','imagen');

       
        $this->familias = Familia::all();
        $this->categorias = Categoria::all();
        $this->subcategorias = Subcategoria::all();
    }
    public function updatedProductoFamiliaId()
    {
        $this->categoria_id = '';
        $this->productoEdit['subcategoria_id'] = ''; // Cambiado a subcategoria_id en lugar de producto['subcategoria_id']
    }

    public function updatedProductoCategoriaId()
    {
        $this->productoEdit['subcategoria_id'] = ''; // Cambiado a subcategoria_id en lugar de producto['subcategoria_id']
    }


    public function store()
    {
        $this->validate([
            'productoEdit.subcategoria_id' => 'required|exists:subcategorias,id',
            'productoEdit.categoria_id' => 'required|exists:categorias,id',
            'productoEdit.familia_id' => 'required|exists:familias,id',
            'productoEdit.nombre' => 'required|max:255',
            'productoEdit.stock' => 'required|numeric|min:0',
            'productoEdit.descripcion' => 'nullable',
            'productoEdit.precio' => 'required|numeric|min:0',


            'image' => 'nullable|image|max:1024', // Validación para la imagen
        ], [], [
            'productoEdit.subcategoria_id' => 'subcategoria',
            'productoEdit.categoria_id' => 'categoria',
            'productoEdit.familia_id' => 'familia',
            'productoEdit.nombre' => 'nombre',
            'productoEdit.stock' => 'stock',
            'productoEdit.descripcion' => 'descripcion',
            'productoEdit.precio' => 'precio',
        ]);
        $producto = Producto::create($this->producto);

        // Guardar la imagen en el almacenamiento y asignarla al producto
        $producto->imagen = $this->image->store('productos');
        $producto->save();

        // Actualizar la variable productoEdit['imagen']
        $this->productoEdit['imagen'] = $producto->imagen;

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien Hecho',
            'text' => 'Producto actualizado correctamente.'
        ]);

        return redirect()->route('admin.productos.index');
    }

    //propiedades computadas
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
        return view('livewire.admin.productos.producto-edit');
    }
}
