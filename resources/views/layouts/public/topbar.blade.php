<header class="app-header">
    <!-- Navbar Right Menu-->
    <ul class="app-nav justify-content-between">
        <!--Categoria-->
        <li class="navbar navbar-light" id="categorias">
            <button class="btn btn-secondary dropdown-toggle m-2" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                Categorias
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li v-for="categoria in categorias" :key="categoria.id">
                    <a class="dropdown-item" href="#">@{{ categoria.id }}</a>
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

@section('add-scripts')
    <script>
        const url = "https://api.mercadolibre.com/sites/MCO";
        var vue_app = new Vue({
            el: '#categorias',
            created() {
                this.categoriaProductos();
            },
            data: {
                categorias: []
            },
            methods: {
                categoriaProductos: function(id) {
                    axios.get(`${url}/categories`)
                        .then(res => {
                            let data = res.data;
                            let results = data.results
                            this.categorias = results;
                            // Imprimir por consola la respuesta de la API
                            console.log('Respuesta de la API:', results);
                        })
                        .catch(err => {
                            console.error(err);
                        });
                },
            },
        });
    </script>
@endsection
