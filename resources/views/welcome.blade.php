@extends('layouts.public.core')

@section('contenido')
    <div class="d-flex flex-wrap" id="productos">
        <div class="flex-item mb-4 me-3" v-for="producto in productos">
            <div class="card" style="max-height: 410px; width:240px">
                <img style="border-bottom: 1px #ccc solid;" :src="producto.thumbnail" class="card-img-top" alt="...">
                <div class="card-body pt-2">
                    <p class="card-text mb-2 two-lines">@{{ producto.title }}</p>
                    <del>@{{ formatPrecio(producto.original_price) }}</del>
                    <div class="align-items-center d-flex h-100 justify-content-between">
                        <h3>$174.900</h3>
                        <h6 class="text-meli">37% OFF</h6>
                    </div>
                    <h6>en 36 X # 3500</h6>
                    <div class="align-items-center d-flex h-100">
                        <span class="me-1 text-meli fw-semibold">Envío gratis</span>
                        <b class="text-meli"><em><i class="bi bi-lightning-fill"></i>FULL</em></b>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('add-scripts')
    <script>
        const url = "https://api.mercadolibre.com/sites/MCO/";
        var vue_app = new Vue({
            el: '#productos',
            created() {
                this.listarProductos("pc")
            },
            data: {
                productos: []
            },
            methods: {
                listarProductos: function(search) {
                    axios.get(`${url}search?q=${search}`)
                        .then(res => {
                            let data = res.data
                            let results = data.results
                            this.productos = results
                        })
                        .catch(err => {
                            console.error(err);
                        })
                },
                formatPrecio: function(precio) {
                    // Asegurar que el precio sea un número
                    const precioNumerico = parseFloat(precio);

                    // Verificar si es un número válido
                    if (!isNaN(precioNumerico)) {
                        // Formatear como moneda colombiana
                        return precioNumerico.toLocaleString('es-CO', { style: 'currency', currency: 'COP', minimumFractionDigits: 0 });
                    }

                    // Si no es un número válido, mostrar el valor original sin formato
                    return precio;
                }
            },
        });
    </script>
@endsection
