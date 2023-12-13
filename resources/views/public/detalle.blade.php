@extends('layouts.public.core')

@section('contenido')
    <div class="m-5">
        <div class="card" id="producto">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <img style="border-bottom: 1px #ccc solid;" :src="producto.pictures[0].url" class="card-img-top"
                            alt="...">
                    </div>
                    <div class="col-md-4">
                        <div class="container-detalle mr-2">
                            <div class="container-p mt-1 mb-2">
                                <div class="header-p">
                                    <div class="header-subtitle">
                                        <span class="subtitle">Nuevo | +10mil vendidos</span>
                                    </div>
                                </div>
                            </div>
                            <div class="container-p2 d-flex">
                                <h1 class="title">@{{ producto.title }}</h1>
                                <span class="button-heart"><i class="bi bi-heart"></i></span>
                            </div>
                            <div class="start d-flex mb-2">
                                <a href="">
                                    <span class="color-span">4.8</span>
                                    <span class="star-calif">
                                        <i class="bi bi-star-fill fs-5"></i>
                                        <i class="bi bi-star-fill fs-5"></i>
                                        <i class="bi bi-star-fill fs-5"></i>
                                        <i class="bi bi-star-fill fs-5"></i>
                                        <i class="bi bi-star-half fs-5"></i>
                                    </span>
                                    <span class="color-span">(74)</span>
                                </a>
                            </div>
                            <div class="container-more-sale d-flex mr-2">
                                <div class="more-sale">
                                    <div class="more-sale-vin">
                                        <a href="">MÁS VENDIDO</a>
                                    </div>
                                </div>
                                <div class="position">
                                    <div class="position-more-sale">
                                        <a href="" class="m-2">6° en Portátiles</a>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <del class="price_product" v-if="producto.original_price" :style="{ height: 'auto' }">@{{ formatPrecio(producto.original_price) }}</del>
                                <del v-else style="height: 1px; opacity: 0;">&nbsp;</del>
                                <div class="align-items-center d-flex h-100">
                                    <h3 class="price_product_with_porcentage"v-if="producto.original_price">@{{ formatPrecio(calcularDescuento(producto.original_price, 25)) }}</h3>
                                    <h3 v-else>@{{ formatPrecio(producto.price) }}</h3>
                                    <h6 v-if="producto.original_price" class="text-meli-detalle">25% OFF</h6>
                                    <del v-else style="height: 1px; opacity: 0;">&nbsp;</del>
                                </div>
                                <h6 class="info-cuotas m-0">Hasta 48 cuotas</h6>
                                <h6 v-else>en 36 X # @{{ formatPrecio(producto.price/36) }}</h6>
                                <div class="align-items-center d-flex h-100">
                                    <span class="me-1 text-meli fw-semibold">Envío gratis</span>
                                    <b class="text-meli"><em><i class="bi bi-lightning-fill"></i>FULL</em></b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('add-scripts')
    <script>
        const url = "https://api.mercadolibre.com/items/";
        var vue_app = new Vue({
            el: '#producto',
            created() {
                this.detalleProductos("{{ $id }}")
            },
            data: {
                producto: {}
            },
            methods: {
                detalleProductos: function(id) {
                    axios.get(`${url}${id}`)
                        .then(res => {
                            let data = res.data
                            this.producto = data
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
                        return Math.round(precioNumerico).toLocaleString('es-CO', {
                            style: 'currency',
                            currency: 'COP',
                            minimumFractionDigits: 0
                        });
                    }

                    // Si no es un número válido, mostrar el valor original sin formato
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
