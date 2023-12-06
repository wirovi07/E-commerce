@extends('layouts.public.core')
@section('contenido')
<div class="d-flex flex-wrap" id="productos">
    <div class="flex-item mb-4 me-3" v-for="producto in productos">
        <div class="card" style="max-height: 410px;width:240px">
            {{-- <img style="    border-bottom: 1px #ccc solid; " src="https://http2.mlstatic.com/D_Q_NP_2X_609869-MCO70367220340_072023-AB.webp" class="card-img-top" alt="..."> --}}
            <img style="    border-bottom: 1px #ccc solid;" :src="producto.thumbnail" class="card-img-top" alt="...">
            <div class="card-body pt-2">
                <p class="card-text mb-2 two-lines">@{{producto.title}}</p>
                <del>$200000</del>
                <div class="align-items-center d-flex h-100 justify-content-between">
                    <h3>$174.900</h3>   
                    <h6 class="text-meli">37% OFF</h6>
                </div>
                <h6>en 36 X # 3500</h6>
                <div class="align-items-center d-flex h-100">
                    <span class="me-1 text-meli fw-semibold">Envio gratis</span>
                <b class="text-meli"> <em><i class="bi bi-lightning-fill"></i>FULL</em></b>
                </div>
            </div>
        </div>
    </div>
  

</div>
@endsection

@section('add-scripts')
    <script>
        // https://api.mercadolibre.com/sites/MCO/search?q=pc
        const url = "https://api.mercadolibre.com/sites/MCO/";
          var vue_app = new Vue({
            el: '#productos',
            created(){
                this.listarProductos("pc")
            },
            mounted() {
               
            },
            data: {
                productos: []
            },
            methods: {
               listarProductos:function(search){
                axios.get(`${url}search?q=${search}`,)
                .then(res => {
                    let data = res.data
                    let results = data.results
                    this.productos = results
                })
                .catch(err => {
                    console.error(err); 
                })
               }
            },
            watch: {

            }
        });
    </script>
@endsection
