@extends('layouts.public.core')

@section('contenido')
    <div id="productos" v-cloak>
        <h1 style="color: #666;
        font-size: 20px;
        font-weight: 400;
        letter-spacing: 1.6px;
        line-height: 1.13;
        margin: 10px 0 10px 8px;
        text-transform: uppercase;">@{{nombreCategoria}}</h1>
        <div class="d-flex flex-wrap" >    
            <div class="flex-item mb-4 me-3" v-for="producto in productos">
                <a :href="'/detalle/'+producto.id">
                    <div class="card" style="max-height: 410px; width:240px">
                        <img style="border-bottom: 1px #ccc solid;" :src="producto.thumbnail" class="card-img-top" alt="...">
                        <div class="card-body pt-2">
                            <p class="card-text mb-2 two-lines">@{{ producto.title }}</p>
                            <del v-if="producto.original_price" :style="{ height: 'auto' }">@{{ formatPrecio(producto.original_price) }}</del>
                            <del v-else style="height: 1px; opacity: 0;">&nbsp;</del>
                            <div class="align-items-center d-flex h-100 justify-content-between">
                                <h3 v-if="producto.original_price">@{{ formatPrecio(calcularDescuento(producto.original_price, 35)) }}</h3>
                                <h3 v-else>@{{ formatPrecio(producto.price) }}</h3>
                                <h6 v-if="producto.original_price" class="text-meli">35% OFF</h6>
                                <del v-else style="height: 1px; opacity: 0;">&nbsp;</del>
                            </div>
                            <h6 v-if="producto.original_price">en 36 X # @{{ formatPrecio(producto.original_price/36) }}</h6>
                            <h6 v-else>en 36 X # @{{ formatPrecio(producto.price/36) }}</h6>
                            <div class="align-items-center d-flex h-100">
                                <span class="me-1 text-meli fw-semibold">Envío gratis</span>
                                <b class="text-meli"><em><i class="bi bi-lightning-fill"></i>FULL</em></b>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>   
@endsection

@section('add-scripts')
    <script>
        var vue_app = new Vue({
            el: '#productos',
            created() {                
                if("{{$categoria}}"){
                    this.productosCategoria("{{$categoria}}")
                    this.nombreCategoria = "{{$nombre}}"
                }else{
                    this.listarProductos("pc")
                }
            },
            data: {
                productos: [],
                nombreCategoria: ""
            },
            methods: {
                listarProductos: function(search) {
                    axios.get(`${url}sites/MCO/search?q=${search}`)
                        .then(res => {
                            let data = res.data
                            let results = data.results
                            this.productos = results
                        })
                        .catch(err => {
                            console.error(err);
                        })
                },
                productosCategoria: function(categoria_id){
                    axios.get(`${url}sites/MCO/search?category=${categoria_id}`)
                    .then(res => {
                        let data = res.data
                        this.productos = data.results
                    })
                    .catch(err => {
                        console.error(err); 
                    })
                },
                formatPrecio: function(precio) {
                    const precioNumerico = parseFloat(precio);

                    if (!isNaN(precioNumerico)) {
                        return Math.round(precioNumerico).toLocaleString('es-CO', {
                            style: 'currency',
                            currency: 'COP',
                            minimumFractionDigits: 0
                        });
                    }

                    return precio;
                },
                calcularDescuento: function(precioOriginal, porcentajeDescuento) {
                    const precioNumerico = parseFloat(precioOriginal);
                    const descuento = precioNumerico * (porcentajeDescuento / 100);
                    const precioDescontado = precioNumerico - descuento;

                    return precioDescontado;
                }
            },
        });
    </script>
@endsection
