@extends('layouts.public.core')

@section('contenido')
    <div class="row ">

        <div id="productocarrito" class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Productos
                </div>
                <div class="card-body p-5 row">
                    <div class="row">
                        <div class="flex-item mb-4 me-3 d-flex" v-for="producto in cart">
                            <div class="col-md-6 d-flex ">
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

                                    <div class="style-principla-words">
                                        <span class="style-words">Eliminar</span>
                                        <span class="style-words">Guardar</span>
                                        <span class="style-words">comprar ahora</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 botton-increm mb-xxl-5">
                                <div class="text-center">
                                    <span onclick="decrementarCantidad()">-</span>
                                    <input class="botton-increm-input" type="text" id="cantidad" value="1"
                                        style="width: 30px; text-align: center; border: none" readonly>
                                    <span onclick="incrementarCantidad()">+</span>
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
        <div class="col-md-4">
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
            created() {
                this.loadCart()
            },
            data: {
                cart: []
            },
            methods: {
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
                },
                addToCart() {
                    this.loadCart();
                    // Agregar producto al carrito
                    const existe = this.cart.findIndex((car) => car.id == this.producto.id)
                    console.log(this.existe)

                    if (existe == -1) {
                        this.cart.push({
                            id: this.producto.id,
                            nombre: this.producto.title,
                            imagen: this.producto.pictures[0].url,
                            cantidad: this.cantidad,
                            precio: this.producto.original_price
                        });
                    } else {
                        this.cart[existe].cantidad = parseInt(this.cart[existe].cantidad) + parseInt(this.cantidad)
                    }
                    this.saveCart();
                },
                saveCart() {
                    // Guardar el carrito en localStorage
                    localStorage.setItem('cart', JSON.stringify(this.cart));
                },
                loadCart() {
                    // Cargar el carrito desde localStorage
                    const savedCart = localStorage.getItem('cart');
                    this.cart = savedCart ? JSON.parse(savedCart) : [];
                },
                removeFromCart(item) {
                    // Quitar producto del carrito
                    this.cart = this.cart.filter(product => product.id !== item.id);
                    // Guardar el carrito en localStorage
                    this.saveCart();
                },
                truncateText(text, maxLength) {
                    if (text.length > maxLength) {
                        return text.substring(0, maxLength) + '...';
                    } else {
                        return text;
                    }
                },
            }
        });
    </script>
@endsection
