<!-- php del sidebar, declaracion para botones-->
@php
    $links = [
        [
            
            'icon' => 'fa-solid fa-gauge',
            'name' => 'Dashboard',
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard')
        ]
];
@endphp

<!--funcionalidad y estilo de sidebar -->
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-[100vh] pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{
        'translate-x-0 ease-out': sidebarOpen,
        '-translate-x-full ease-in': !sidebarOpen
    }"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
           <!-- declaracion de foreachs--> 
           @foreach ($links as $link)
            <!-- gregar botones y estilos-->

            <!--boton inicio-->
           <li>
            <a href="{{$link['route']}}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{$link['active']? 'bg-gray-100' : ''}}">
                
                <!-- estilo de icono-->
                <span class="inline-flex w-6 h6 justify-center items-center">
                    <i class="{{$link['icon']}} text-gray-500"></i>
                </span>
                <!-- nombre del boton-->
                <span class="ms-2">
                    {{$link['name']}}
                </span>
            </a>
        </li>

           @endforeach

        </ul>
    </div>
</aside>
