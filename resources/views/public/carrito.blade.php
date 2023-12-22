@extends('layouts.public.core')

@section('contenido')
    <div class="row" id="productocarrito">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Productos
                </div>
                <div class="card-body p-5 row" v-cloak>
                    <div class="row">
                        <div class="flex-item justify-content-between mb-4 d-flex " v-for="producto in cart">
                            <div class="col-md-4 d-flex ">
                                <a :href="'/detalle/' + producto.id">
                                    <img style="width: 64px; height: 64px;" :src="producto.imagen" class="card-img-top"
                                        alt="...">
                                </a>
                                <div>
                                    <span
                                        style="font-size: 16px; font-weight: 600; width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"
                                        class="m-4 one-line">
                                        @{{ truncateText(producto.nombre, 50) }}
                                    </span>

                                    <div class="style-principla-words cursor-pointer">
                                        <span class="style-words" @click="removeFromCart(producto)">Eliminar</span>
                                        <span class="style-words">Guardar</span>
                                        <span class="style-words">comprar ahora</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" style="margin: 0px -69px 0px 116px" >
                                <div class="botton-increm" style="width: 100px; height: 32px; display: flex; align-items: center; justify-content: center; cursor: pointer">
                                    <span style="font-size: 26px; font-weight: 400; color: rgba(0, 0, 0, .55);"
                                        @click="decrementarCantidad(producto)">-</span>
                                    <input class="botton-increm-input" type="text" v-model="producto.cantidad"
                                        style="width: 30px; text-align: center; border: none; font-size: 18px" readonly>
                                    <span style="font-size: 22px; color: #3483fa; font-weight: 500"
                                        @click="incrementarCantidad(producto)">+</span>
                                </div>
                                <div class="d-grid m-2">
                                    <span class="text-black-50 fst-normal" style="margin-top: 0px">43 disponibles</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="align-items-center">
                                    <div class="d-flex" style="margin: 1px 0px 0px 25px">
                                        <h6 v-if="producto.precio" class="text-meli-carrito mr-2 fs-6">-25%</h6>
                                        <del class="fs-8 text-body-tertiary px-2" style="margin-top: -3px"
                                            v-if="producto.precio">@{{ formatPrecio(producto.precio) }}</del>
                                        <del v-else style="height: 1px; opacity: 0;">&nbsp;</del>
                                    </div>
                                    <div class="ml-2">
                                        <h3 class="fs-5 fw-medium" style="margin-top: -5px; margin: -5px 0px 0px 25px"
                                            v-if="producto.precio">
                                            @{{ formatPrecio(calcularDescuento(producto.precio, 25, producto.cantidad)) }}</h3>
                                        <h3 v-else>@{{ formatPrecio(producto.precio) }}</h3>
                                        <del v-else style="height: 1px; opacity: 0;">&nbsp;</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    Envío
                </div>
            </div>
        </div>
        <div class="col-md-3" v-cloak>
            <div class="card">
                <div class="card-header">
                    Resumen de compra
                </div>
                <div class="p-3">
                    <div>
                        <div class="d-flex mt-1 justify-content-between">
                            <span class="text-black-50 fst-normal">Productos(@{{getTotalProducts()}})</span>
                            <span class="text-black fst-normal">@{{ formatPrecio(sumaPrecios) }}</span>
                        </div>
                        <div class="d-flex mt-1 justify-content-between">
                            <span>Envíos</span>
                            <span v-if="sumaPrecios >= 100000" class="fs-6 text-meli" style="font-weight: 400">Gratis</span>
                            <span v-else-if="sumaPrecios > 0" style="margin-left: 185px">$ 8.800</span>
                            <span v-else style="margin-left: 185px">$ 0</span>

                        </div>
                        <div class="d-flex mt-1 justify-content-between">
                            <span class="fw-bold fs-5">Total</span>
                            <span v-if="sumaPrecios >= 100000" class="fw-bold fs-5">@{{ formatPrecio(sumaPrecios) }}</span>
                            <span v-else-if="sumaPrecios == 0" class="fw-bold fs-5">$ 0</span>
                            <span v-else class="fw-bold fs-5">@{{ formatPrecio(sumaPrecios + 8800) }}</span>

                        </div>
                    </div>
                    <div class="d-grid mx-auto mt-4">
                        <a href="/"><button class="style-button-compra w-100 m-0">Comprar ahora</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('add-scripts')
    <script>
        var vue_app = new Vue({
            el: '#productocarrito',
            mounted() {
                this.loadCart();
            },
            data: {
                cart: []
            },
            methods: {
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
                calcularDescuento: function(precioOriginal, porcentajeDescuento, cantidad) {
                    const precioNumerico = parseFloat(precioOriginal);
                    const descuento = precioNumerico * (porcentajeDescuento / 100);
                    const precioDescontado = (precioNumerico - descuento) * cantidad;

                    return precioDescontado;
                },
                addToCart() {
                    this.loadCart();
                    const existe = this.cart.findIndex((car) => car.id == this.producto.id)
                    console.log(this.existe)

                    if (existe == -1) {
                        this.cart.push({
                            id: this.producto.id,
                            nombre: this.producto.title,
                            imagen: this.producto.pictures[0].url,
                            cantidad: this.cantidad,
                            precio: this.producto.original_price,
                            disponible: this.producto.available_quantity
                        });
                    } else {
                        this.cart[existe].cantidad = parseInt(this.cart[existe].cantidad) + parseInt(this.cantidad)
                    }
                    this.saveCart();
                },
                saveCart() {
                    localStorage.setItem('cart', JSON.stringify(this.cart));
                },
                loadCart() {
                    const savedCart = localStorage.getItem('cart');
                    this.cart = savedCart ? JSON.parse(savedCart) : [];
                },
                removeFromCart(producto) {
                    this.cart = this.cart.filter(product => product.id !== producto.id);
                    console.log(this.cart)
                    this.saveCart();
                },
                truncateText(text, maxLength) {
                    if (text.length > maxLength) {
                        return text.substring(0, maxLength) + '...';
                    } else {
                        return text;
                    }
                },
                decrementarCantidad(producto) {
                    if (producto.cantidad > 1) {
                        producto.cantidad--;
                    }
                    this.saveCart()
                },
                incrementarCantidad(producto) {
                    producto.cantidad++;

                    this.saveCart()
                },
                getTotalProducts() {
                    return this.cart.reduce((total, item) => total + parseInt(item.cantidad), 0);
                },
            },
            computed: {
                sumaPrecios: function() {
                    let precio = 0
                    this.cart.forEach(element => {
                        precio += this.calcularDescuento(element.precio, 25, element.cantidad)
                    });
                    return precio
                }
            }
        });
    </script>
@endsection
