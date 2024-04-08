<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Estudiante',
        'route' => route('admin.estudiantes.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

    <div class="card">
        <form action="{{route('admin.estudiantes.store') }}" method="POST" >
            @csrf
            
   
          
            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- select grado -->
                <div class="mb-4">
                    <x-label for="grado_id" class="mb-3">Grado</x-label>
                    <select name="grado_id" id="grado_id" class="w-full">
                        <option disabled selected>Seleccione un Grado</option>
                        @foreach ($grados as $grado)
                            <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- select tutor -->
                <div class="mb-4">
                    <x-label for="tutor_id" class="mb-3">Padre/Madre</x-label>
                    <select name="tutor_id" id="tutor_id" class="w-full">
                        <option value="" disabled selected>Seleccione un Padre/Madre</option>
                        @foreach ($tutores as $tutor)
                            <option value="{{ $tutor->id }}">{{ $tutor->nombre }}</option>
                        @endforeach
                    </select>
                </div>


                <div>
                    <x-label for="nombre" class="mb-3">Nombre</x-label>
                    <x-input id="nombre" placeholder="Ingrese el nombre" name="nombre"
                        value="{{ old('nombre') }}" />
                </div>
                <div>
                    <x-label for="sexo" class="mb-3">Sexo</x-label>
                    <x-input id="sexo" class="w-full" placeholder="Ingrese el sexo" name="sexo"
                        value="{{ old('sexo') }}" />
                </div>
                <div>
                    <x-label for="apellido" class="mb-3">apellido</x-label>
                    <x-input id="apellido" class="w-full" placeholder="Ingrese la fecha de apellido" name="apellido"
                        value="{{ old('apellido') }}" />
                </div>
            </div>
            <div class="flex justify-end">
                <x-button>Guardar</x-button>
            </div>
        </form>
    </div>
</x-admin-layout>
