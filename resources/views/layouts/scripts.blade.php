<script src="{{ asset('asset/js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset/js/main.js') }}"></script>
<script src="{{ asset('asset/js/vue.js') }}"></script>
<script src="{{ asset('asset/js/axios.min.js') }}"></script>
<script src="{{ asset('asset/js/plugins/sweetalert2.min.js') }}"></script>
<script src="{{ asset('asset/js/plugins/fullcalendar.min.js') }}"></script>

<script>
    const url = "https://api.mercadolibre.com/";
    var vue_app = new Vue({
        el: '#categoriasapp',
        created() {
            this.categoriaProductos();
        },
        data: {
            categorias: []
        },
        methods: {
            categoriaProductos: function(id) {
                axios.get(`${url}sites/MCO/categories`)
                    .then(res => {
                        let data = res.data;
                        this.categorias = data;
                    })
                    .catch(err => {
                        console.error(err);
                    });
            },
        },
    });
</script>
