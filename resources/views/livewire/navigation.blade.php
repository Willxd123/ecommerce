<div>
    <header class="bg-blue-800">
        <div class="px-4 py-3 ">
            <x-container>
                <div class="flex items-center space-x-8">
                    <button id="menu-toggle" class="text-5x1">
                        <i class="fas fa-bars text-white"></i>
                    </button>
                    <h1 class="text-white">
                        <a href="/" class="flex flex-col">
                            <span class="text-3xl font-semibold">
                                Ecommerce
                            </span>
                            <span class="text-x5">
                                Tienda online
                            </span>
                        </a>
                    </h1>
                    <div class="flex-1">
                        <x-input class="w-full" placeholder="Buscar producto" />
                    </div>
                    <div class="space-x-8">
                        <button class="text-3x1">
                            <i class="fas fa-shopping-cart text-white"></i>
                        </button>
                        <button class="text-3x1">
                            <i class="fas fa-user text-white "></i>
                        </button>
                    </div>
                </div>
            </x-container>
        </div>
    </header>

    <div class="fixed top-0 left-0 inset-0 bg-black bg-opacity-25 z-10 hidden" id="menu-overlay">
        <div class="fixed top-0 left-0 z-20">
            <div class="flex">
                <div class="w-80 h-screen bg-white">
                    <div class="bg-blue-600 px-4 py-6 text-white font-semibold">
                        <div class="flex justify-between items-center">
                            <span class="text-lg">
                                jolas
                            </span>
                            <button id="close-menu">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="h-[calc(100vh-52px)] overflow-auto">
                        <ul>
                            @foreach ($familias as $familia)
                                <a href="" class=" flex items-center justify-between px-4 py-4 text-gray-700 hover:bg-blue-200">
                                    {{$familia->nombre}}
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menuOverlay = document.getElementById('menu-overlay');
    const closeMenuButton = document.getElementById('close-menu');
    const menuContainer = document.querySelector('.w-80');

    menuToggle.addEventListener('click', function(event) {
        event.stopPropagation(); // Evita que el evento de clic se propague al contenedor del menú
        menuOverlay.classList.toggle('hidden');
    });

    closeMenuButton.addEventListener('click', function(event) {
        event.stopPropagation(); // Evita que el evento de clic se propague al contenedor del menú
        menuOverlay.classList.add('hidden');
    });

    menuContainer.addEventListener('click', function(event) {
        event.stopPropagation(); // Evita que el evento de clic en el contenedor se propague al menú
    });

    document.addEventListener('click', function(event) {
        const isClickInsideMenu = menuContainer.contains(event.target);
        const isClickInsideToggle = menuToggle.contains(event.target);

        if (!isClickInsideMenu && !isClickInsideToggle) {
            menuOverlay.classList.add('hidden');
        }
    });
</script>

