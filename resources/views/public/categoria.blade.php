@extends('layouts.public.core')

@section('contenido')
    <div class="row" id="lista_categorias">
        <h1
            style="color: #666; font-size: 20px; font-weight: 400; letter-spacing: 1.6px; line-height: 1.13; margin: 10px 0 10px 8px; text-transform: uppercase;">
            Categorias para comprar y vender
        </h1>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-5 row" v-cloak>
                    <div v-for="categoria in categorias">
                        <h4>@{{ categoria.name }}</h4>
                        <div class="row">
                            <template v-for="children in categoria.children">
                                <div class="col-3">
                                    <a class="nombre-item text-muted" style="font-size: 14px; font-weight: 400; color: rgba(0,0,0,.45);" :href="'/?categoria='+children.id + '&nombre='+children.name">@{{ children.name }}</a> <br>
                                </div>
                            </template>
                        </div>
                        <hr style="color: rgba(0,0,0,.45);">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('add-scripts')
    <script>
        var vue_app = new Vue({
            el: '#lista_categorias',
            mounted() {
                this.loadCategoria();
            },
            data: {
                categorias: []
            },
            methods: {
                loadCategoria: async function() {
                    try {
                        let res = await axios.get(`${url}sites/MCO/categories`);
                        let data = res.data;
                        let categorias = data;

                        // Utiliza Promise.all para esperar todas las llamadas a childrenCategorias
                        await Promise.all(categorias.map(async (categoria, index) => {
                            categorias[index].children = await this.childrenCategorias(
                                categoria.id);
                        }));

                        this.categorias = categorias
                    } catch (err) {
                        console.error(err);
                    }
                },
                childrenCategorias: async function(id) {
                    try {
                        let res = await axios.get(`${url}/categories/${id}`);
                        return res.data.children_categories ?? [];
                    } catch (err) {
                        console.error(err);
                        return [];
                    }
                },

            },
            computed: {

            }
        });
    </script>
@endsection
