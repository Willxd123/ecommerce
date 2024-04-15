<div>
    <form wire:submit="save">
        <div class="card">
            <div>
                <x-validation-errors class="mb-4" />

                <div class="mb-4">


                    <div>
                        <x-label class="mb-3">Nombre</x-label>
                        <x-input class="w-full" placeholder="Ingrese el nombre del producto"
                            wire:model="producto.nombre" />
                    </div>
                    <div>
                        <x-label class="mb-3">stock</x-label>
                        <x-input class="w-full" placeholder="Ingrese el stock del producto"
                            wire:model="producto.stock" />
                    </div>
                    <div>
                        <x-label class="mb-3">Descripcion</x-label>
                        <x-textarea class="w-full" placeholder="Ingrese la descripsion del producto"
                            wire:model="producto.descripcion" />
                    </div>
                    <div>
                        <x-label class="mb-3">Precio</x-label>
                        <x-input class="w-full" placeholder="Ingrese el precio del producto"
                            wire:model="producto.precio" />
                    </div>
                    <div>
                        <x-label class="mb-3">Imagen</x-label>
                        <x-input class="w-full" placeholder="Ingrese la imagen del producto"
                            wire:model="producto.imagen" />
                    </div>

                </div>

                <!-- select familia -->
                <x-label class="mb-3">Familia</x-label>
                <x-select class="w-full" wire:model.live="producto.familia_id" wire:loading.attr="disabled"
                    wire:target="updatedProductoFamiliaId">
                    <option value="" disabled>Seleccione una familia</option>
                    @foreach ($familias as $familia)
                        <option value="{{ $familia->id }}">{{ $familia->nombre }}</option>
                    @endforeach
                </x-select>

                <!-- select categoria -->
                <x-label class="mb-3">Categoría</x-label>
                <x-select class="w-full" wire:model.live="producto.categoria_id" wire:loading.attr="disabled"
                    wire:target="updatedProductoCategoriaId">
                    <option value="" disabled {{ is_null($producto['categoria_id']) ? 'selected' : '' }}>
                        Seleccione una categoría</option>
                    @foreach ($this->categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </x-select>

                <!-- select subcategoria -->
                <x-label class="mb-3">Subcategoría</x-label>
                <x-select class="w-full" wire:model.live="producto.subcategoria_id" wire:loading.attr="disabled"
                    wire:target="updatedProductoCategoriaId">
                    <option value="" disabled>Seleccione una subcategoría</option>
                    @foreach ($this->subcategorias as $subcategoria)
                        <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
                    @endforeach
                </x-select>



                <div class="flex justify-end">
                    <x-button>Guardar</x-button>
                </div>

            </div>

    </form>

    {{-- @dump($producto); --}}

</div>
