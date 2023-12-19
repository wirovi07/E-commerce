<header class="app-header">
    <!-- Navbar Right Menu-->
    <ul class="app-nav justify-content-between">
        <!--Categoria-->
        <li class="navbar navbar-light">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown button
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
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
                    <a class="dropdown-item text-white" href="{{ route('carrito') }}"><i class="bi bi-cart"></i></a>
                </li>
            </ul>
        </li>
        <!-- User Menu-->
    </ul>
</header>
