@extends('layouts.public.core')

@section('contenido')
    <div class="row ">

        <div id="productos" class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Productos
                </div>
                <div class="card-body">
                    <div class="flex-item mb-4 me-3" v-for="producto in cart">
                        <a :href="'/detalle/' + producto.id">

                            <img style="width: 64px; height: 64px;" :src="producto.imagen" class="card-img-top" alt="...">
                        </a>
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
            el: '#productos',
            created() {
                this.loadCart()
            },
            data: {
                productos: [],
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

                    if (existe == -1) {
                        this.cart.push({
                            id: this.producto.id,
                            nombre: this.producto.title,
                            imagen: this.producto.pictures[0].url,
                            cantidad: this.cantidad
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
            }
        });
    </script>
@endsection
