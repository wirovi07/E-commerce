@extends('layouts.public.core')

@section('contenido')
    <div class="row ">

        <div id="productocarrito" class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Productos
                </div>
                <div class="card-body p-5 row" v-cloak>
                    <div class="row">
                        <div class="flex-item justify-content-between mb-4 me-3 d-flex" v-for="producto in cart">
                            <div class="col-md-6 d-flex ">
                                <a :href="'/detalle/' + producto.id">
                                    <img style="width: 64px; height: 64px;" :src="producto.imagen" class="card-img-top"
                                        alt="...">
                                </a>
                                <div>
                                    <span
                                        style="font-size: 16px; font-weight: 600; width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"
                                        class="m-4 one-line">
                                        @{{ truncateText(producto.nombre, 70) }}
                                    </span>

                                    <div class="style-principla-words cursor-pointer">
                                        <span class="style-words" @click="removeFromCart(producto)">Eliminar</span>
                                        <span class="style-words">Guardar</span>
                                        <span class="style-words">comprar ahora</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 botton-increm text-center"
                                style="width: 100px; height: 32px; display: flex; align-items: center; justify-content: center; cursor: pointer">
                                <span style="font-size: 26px; font-weight: 400; color: rgba(0, 0, 0, .55);"
                                    @click="decrementarCantidad(producto)">-</span>
                                <input class="botton-increm-input" type="text" v-model="producto.cantidad"
                                    style="width: 30px; text-align: center; border: none; font-size: 18px" readonly>
                                <span style="font-size: 22px; color: #3483fa; font-weight: 500"
                                    @click="incrementarCantidad(producto)">+</span>
                            </div>
                            <div class="col-md-2">
                                <div class="align-items-center">
                                    <div class="d-flex">
                                        <h6 v-if="producto.precio" class="text-meli-carrito mr-2 fs-6">-25%</h6>
                                        <del class="fs-8 text-body-tertiary px-2" style="margin-top: -3px"  v-if="producto.precio">@{{ formatPrecio(producto.precio) }}</del>
                                        <del v-else style="height: 1px; opacity: 0;">&nbsp;</del>
                                    </div>
                                    <div class="ml-2">
                                        <h3 class="fs-5 fw-medium" style="margin-top: -5px; margin: -5px 0px 0px 25px"  v-if="producto.precio">
                                            @{{ formatPrecio(calcularDescuento(producto.precio, 25)) }}</h3>
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
        <div class="col-md-3">
            <div class="card">
                <div class="">
                    hola
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
                calcularDescuento: function(precioOriginal, porcentajeDescuento) {
                    const precioNumerico = parseFloat(precioOriginal);
                    const descuento = precioNumerico * (porcentajeDescuento / 100);
                    const precioDescontado = precioNumerico - descuento;

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
                },
                incrementarCantidad(producto) {
                    producto.cantidad++;
                },
            }
        });
    </script>
@endsection
