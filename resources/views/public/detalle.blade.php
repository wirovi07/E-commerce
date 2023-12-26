@extends('layouts.public.core')

@section('contenido')
    <div class="m-5">
        <div class="card" id="producto">
            <div class="card-body" v-if="Object.keys(producto).length !== 0 " v-cloak>
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex">
                            <div class="img-product">
                                <div v-for="(imagen, index) in producto.pictures" :key="index" 
                                    class="img-product-1 mb-3" @click="cambiarImagenPrincipal(index)">
                                    <img style="width: 44px; height: 40px; aspect-ratio: auto 44 / 44;" :src="imagen.url" class="card-img-top margin-img"
                                        alt="...">
                                </div>
                            </div>
                            <img style="border-bottom: 1px rgb(204, 204, 204) solid;" :src="producto.pictures[imagenPrincipalIndex].url" class="card-img-top m-auto img-principal style-border" alt="...">
                        </div>
                        <div>
                            <p class="productos-rela mt-4 m-0">Productos Relacionados</p>
                            <span class="promocionado">Promocionado</span>
                        </div>
                        <div class="d-flex" style="max-width: 100%; overflow: auto" id="productos">
                            <div class="flex-item mb-4 me-3" v-for="relacionado in relacionados">
                                <a :href="'/detalle/'+relacionado.id">
                                    <div class="card" style="max-height: 410px; width:240px">
                                        <img style="border-bottom: 1px #ccc solid;" :src="relacionado.thumbnail" class="card-img-top" alt="...">
                                        <div class="card-body pt-2">
                                            <p class="card-text mb-2 two-lines">@{{ relacionado.title }}</p>
                                            <del v-if="relacionado.original_price" :style="{ height: 'auto' }">@{{ formatPrecio(relacionado.original_price) }}</del>
                                            <del v-else style="height: 1px; opacity: 0;">&nbsp;</del>
                                            <div class="align-items-center d-flex h-100 justify-content-between">
                                                <h3 v-if="relacionado.original_price">@{{ formatPrecio(calcularDescuento(relacionado.original_price, 35)) }}</h3>
                                                <h3 v-else>@{{ formatPrecio(relacionado.price) }}</h3>
                                                <h6 v-if="relacionado.original_price" class="text-meli">35% OFF</h6>
                                                <del v-else style="height: 1px; opacity: 0;">&nbsp;</del>
                                            </div>
                                            <h6 v-if="relacionado.original_price">en 36 X # @{{ formatPrecio(relacionado.original_price/36) }}</h6>
                                            <h6 v-else>en 36 X # @{{ formatPrecio(relacionado.price/36) }}</h6>
                                            <div class="align-items-center d-flex h-100">
                                                <span class="me-1 text-meli fw-semibold">Envío gratis</span>
                                                <b class="text-meli"><em><i class="bi bi-lightning-fill"></i>FULL</em></b>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div>
                            <p style="white-space: pre-line;" v-html="descripcion" class="fs-5 text-body-secondary"></p>
                        </div>
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
                                    <span class="color-span">(@{{ producto.initial_quantity }})</span>
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
                                <del class="price_product" v-if="producto.original_price"
                                    :style="{ height: 'auto' }">@{{ formatPrecio(producto.original_price) }}</del>
                                <del v-else style="height: 1px; opacity: 0;">&nbsp;</del>
                                <div class="align-items-center d-flex h-100">
                                    <h3 class="price_product_with_porcentage"v-if="producto.original_price">
                                        @{{ formatPrecio(calcularDescuento(producto.original_price, 25)) }}</h3>
                                    <h3 v-else>@{{ formatPrecio(producto.price) }}</h3>
                                    <h6 v-if="producto.original_price" class="text-meli-detalle">25% OFF</h6>
                                    <del v-else style="height: 1px; opacity: 0;">&nbsp;</del>
                                </div>
                                <h6 class="info-cuotas m-0">Hasta 48 cuotas</h6>
                                <h6>en 36 X # @{{ formatPrecio(producto.price / 36) }}</h6>
                                <div class="align-items-center d-flex h-100">
                                    <span class="me-1 text-meli fw-semibold image-visa"><img
                                            src="https://1000marcas.net/wp-content/uploads/2019/12/VISA-Logo.png"
                                            alt=""></span>
                                    <b class="text-meli image-mastercard"><img
                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/200px-Mastercard-logo.svg.png"
                                            alt=""></b>
                                </div>
                                <div class="info-payment">
                                    <p class="info-payment-p mb-10">Más información</p>
                                </div>
                                <div class="info-general">
                                    <div class="mt-20">
                                        <p class="m-0 parrafo-1-info-general"><span>Envío gratis</span> a todo el país</p>
                                        <p class="m-0 parrafo-2-info-general">Conoce los tiempos y las formas de envío</p>
                                        <p class="m-0 parrafo-3-info-general">Calcular cuándo llega</p>
                                    </div>
                                </div>
                                <div class="info-stock mt-4">
                                    <p class="info-stock-p">Stock disponible</p>
                                </div>
                                <div class="cantidad-option">
                                    <div class="align-items-center d-flex h-100">
                                        <p class="cantidad">Cantidad:</p>
                                        <select class="select-unidad mb-3" v-model="cantidad">
                                            <option value="1">1 Unidad</option>
                                            <option value="2">2 Unidades</option>
                                            <option value="3">3 Unidades</option>
                                            <option value="4">4 Unidades</option>
                                            <option value="5">5 Unidades</option>
                                        </select>
                                        <p class="unidad">(5 disponibles)</p>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <a href="/carrito" ><button type="button" class="style-button-compra w-100">Comprar ahora</button></a>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="button" class="style-button-carrito w-100" @click="addToCart">Agregar al carrito</button>
                                </div>
                                <div class="info-vend">
                                    <div class="mt-3">
                                        <div class="d-flex">
                                            <span>Vendido por </span>
                                            <span class="info-general-vendedor"> WG Baruch</span>
                                        </div>
                                        <div class="d-flex">
                                            <span>MercadoLíder</span>
                                            <span class="subtitle-vendedor"> | +10mil vendidos</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-cliente">
                                    <div class="mt-3 info-cliente-1">
                                        <i class="bi bi-arrow-return-left"></i>
                                        <span class="info-cliente-1-span">Devolución gratis. </span>
                                        <span class="info-general-cliente"> Tienes 30 dias desde que lo recibes.</span>
                                    </div>
                                    <div>
                                        <div class="mt-3 info-cliente-1">
                                            <i class="bi bi-shield-check"></i>
                                            <span class="info-cliente-1-span">Compra Protegida </span>
                                            <span class="info-general-cliente mt-3">, recibe el producto que esperabas o te
                                                devolvemos el dinero.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                cargando ... 
            </div>
        </div>
    </div>
@endsection

@section('add-scripts')
    <script>
        var vue_app = new Vue({
            el: '#producto',
            created() {
                this.detalleProductos("{{ $id }}")
                this.descripcionProducto("{{ $id }}")                
            },
            data: {
                producto: {},
                imagenPrincipalIndex: 0 ,
                relacionados:[],
                descripcion: '',
                cart: [],
                cantidad:1,
            },
            methods: {
                detalleProductos: function(id) {
                    axios.get(`${url}items/${id}`)
                        .then(res => {
                            let data = res.data
                            this.producto = data
                            this.productosRelacionados(this.producto.category_id)
                        })
                        .catch(err => {
                            console.error(err);
                        })
                },
                productosRelacionados: function(categoria_id){
                    axios.get(`${url}sites/MCO/search?category=${categoria_id}`)
                    .then(res => {
                        let data = res.data
                        this.relacionados =data.results
                    })
                    .catch(err => {
                        console.error(err); 
                    })
                },
                descripcionProducto: function(id){
                    axios.get(`${url}items/${id}/description`)
                    .then(res => {
                        let data = res.data
                        this.descripcion  = data.plain_text
                        console.log(res)
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
                },
                cambiarImagenPrincipal: function(index) {
                    this.imagenPrincipalIndex = index;
                },
                addToCart() {
                    this.loadCart();
                    // Agregar producto al carrito
                    const existe = this.cart.findIndex((car) => car.id == this.producto.id)

                    if(existe == -1){
                        this.cart.push({
                            id:this.producto.id,
                            nombre:this.producto.title,
                            imagen:this.producto.pictures[0].url,
                            cantidad: this.cantidad,
                            precio: this.producto.price,
                            disponible: this.producto.available_quantity
                        });
                    }else{
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
            },
        });
    </script>
@endsection
