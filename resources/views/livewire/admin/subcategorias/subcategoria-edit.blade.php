
<div>
    <form wire:submit="save">
        <div class="card">
            <div >
                <x-validation-errors class="mb-4"/>
                    <!-- select familia -->
                    <div class="mb-4">
                        <x-label class="mb-3">
                            Familia
                        </x-label>

                        <x-select class="w-full" wire:model.live="subcategoriaEdit.familia_id"
                        wire:loading.attr="disabled" wire:target="subcategoriaEdit.familia_id">
                            <option value="" disabled>Seleccione una familia</option>
                            @foreach ($familias as $familia)
                                <option value="{{ $familia->id }}">{{ $familia->nombre }}</option>
                            @endforeach
                        </x-select>
                        <x-label class="mb-3">
                            categoria
                        </x-label>
                        <x-select class="w-full" wire:model.live="subcategoriaEdit.categoria_id">
                            <option value="" disabled {{ is_null($subcategoriaEdit['categoria_id']) ? 'selected' : '' }}>
                                Seleccione una subcategoría</option>
                            @foreach ($this->categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </x-select>
                        
                    </div>

                    <!-- select categoria -->

                    <div>
                        <x-label class="mb-3">Nombre</x-label>
                        <x-input class="w-full" placeholder="Ingrese el nombre de la subcategoriaEdit" name="nombre"
                            wire:model="subcategoriaEdit.nombre"/>
                    </div>
                </div>
                <div class="flex justify-end">
                    <x-danger-button onclick="confirmDelete()">
                        Eliminar
                    </x-danger-button>
                    <x-button>Actualizar</x-button>
                </div>

            </div>

    </form>

<form action="{{route('admin.subcategorias.destroy',$subcategoria)}}" method="POST" id="delete-from">
    @csrf
    @method('DELETE')

</form>

@push('js')
    <script>
        function confirmDelete(){
            Swal.fire({
                title:"estas seguro?",
                text: "no podras revertir",
                icon: "warning",
                showCancelButton:true,
                confirButtonColor: "#3085d6",
                CancelButtonColor: "#d33",
                confirButtonText: "si, borrar",
                CancelButtonText: "cancelar"
            }).then((result))=>{
                if(result.isConfirmed){
                    document.getElementById('delete-from').submit()
                }
            }
        }
    </script>
@endpush

</div>
