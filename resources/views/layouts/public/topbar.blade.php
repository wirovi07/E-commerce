<style>
    .scroll-hidden {
        max-height: 500px; /* Ajusta la altura máxima según tus necesidades */
        overflow-y: scroll;
        scrollbar-width: thin;
        scrollbar-color: transparent transparent;
    }

    .scroll-hidden::-webkit-scrollbar {
        width: 5px;
    }

    .scroll-hidden::-webkit-scrollbar-thumb {
        background-color: transparent;
    }
</style>

<header class="app-header">
    <!-- Navbar Right Menu-->
    <ul class="app-nav justify-content-between">
        <!--Categoria-->
        <li class="navbar navbar-light" id="categoriasapp">
            <button class="btn btn-secondary dropdown-toggle m-2" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                Categorias
            </button>
            <ul class="dropdown-menu holver-dropdown-menu overflow-auto bg-black p-1 m-2 scroll-hidden" aria-labelledby="dropdownMenuButton1">
                <li v-for="categoria in categorias" :key="categoria.id">
                    <a class="dropdown-item fs-6 fw-medium" style="color: white" :href="'/?categoria='+categoria.id + '&nombre='+categoria.name">@{{ categoria.name }}</a>
                </li>
            </ul>                      
        </li>

        <!--Buscador-->
        <li class="navbar navbar-light w-50">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        </li>
        <li class="navbar navbar-light">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a class="dropdown-item text-white" href=""><i class="bi bi-gear me-2 fs-5"></i> Crear tu
                        cuenta</a>
                </li>
                <li class="list-inline-item">
                    <a class="dropdown-item text-white" href=""><i class="bi bi-box-arrow-right me-2 fs-5"></i>
                        Ingresar</a>
                </li>
                <li class="list-inline-item">
                    <a class="dropdown-item text-white" href="{{ route('carrito') }}"><i
                            class="bi bi-cart fs-4"></i></a>
                </li>
            </ul>
        </li>
        <!-- User Menu-->
    </ul>
</header>
