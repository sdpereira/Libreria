<template>
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="container-fluid">
            <!-- Ejemplo de tabla Listado -->
            <div class="card">
                <div class="card-header">
                    <i class="fa fas fa-bookmark"></i> Solicitud de prestamo de libros
                </div>
                    <div class="card-body">
                         <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group row">
                                <label class="col-md-1 form-control-label" for="text-input">Persona</label>
                                <div class="col-md-5">
                                    <select class="form-control" v-model="id_persona" id="exampleFormControlSelect1">
                                        <option v-for="objeto in arrayPersona" :key="objeto.id" :value="objeto.id" v-text="objeto.nombrecompleto"></option>
                                    </select>
                                </div>
                                    <label class="col-md-1 form-control-label" for="text-input">Entrega</label>
                                    <div class="col-md-5">
                                        <input type="date" v-model="fec_entrega" id="fec_entrega" name="fec_entrega" class="form-control"
                                            placeholder="Código" />
                                    </div>
                        </div> 
                     <div class="form-group row">
                                  <label class="col-md-1 form-control-label" for="text-input">Libros</label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <input type="text" id="texto" name="texto" v-model="buscar" class="form-control"
                                    placeholder="Texto a buscar" />
                                        <button type="button" class="btn btn-secondary btn-dark" data-toggle="modal" @click="abrirModal('guardar')">
                                        <i class="fa fa-search"></i></button> 
                            </div>
                        </div>
                    </div>
                   
                        </form>
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Autor</th>
                                <th>Editorial</th>
                                <th>Opción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="objeto in arrayDatos" :key="objeto.id">
                                     <td v-text="objeto.codigo"></td>
                                            <td v-text="objeto.nombre"></td>
                                        <td v-text="objeto.autor"></td>
                                            <td v-text="objeto.edit"></td>
                              <td>
                                
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal">
                                        <i class="icon-trash"></i>
                                    </button> &nbsp;
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    
                                                   <div class="float-right">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> <i class="fa fa-save"></i>
                       &nbsp; Guardar
                    </button>

                    

                </div>
                 
                </div>
                 <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item" v-if="pagination.current_page > 1">
                                <a class="page-link" href="#"
                                    @click.prevent="cambiarPagina1(pagination.current_page - 1,buscar,criterio)">Ant</a>
                            </li>
                            <li class="page-item" v-for="page in pagesNumber" :key="page"
                                :class="[page == isActived ? 'active' : '']">
                                <a class="page-link" href="#" @click.prevent="cambiarPagina1(page,buscar,criterio)"
                                    v-text="page"></a>
                            </li>
                            <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                <a class="page-link" href="#"
                                    @click.prevent="cambiarPagina1(pagination.current_page + 1,buscar,criterio)">Sig</a>
                            </li>
                        </ul>

                    </nav>
            </div>
            <!-- Fin ejemplo de tabla Listado -->
           </div>
                  
        <!--Inicio del modal agregar/actualizar-->
         <div class="modal fade" id="modalNuevo" :class="{ mostrar: modal }" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" >Listado de libros</h4>
                        <button type="button" class="close" @click="cerrarModal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                                  <div class="card-body">
                      <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" id="texto" name="texto" v-model="buscar" class="form-control"
                                    placeholder="Lib a buscar" @keypress="ListarLibro(1,buscar)"/>
                                <button type="button" @click ="ListarLibro(1,buscar)"  class="btn btn-primary">
                                     <i class="fa fa-search"></i> Buscar
                                </button>
                            </div>
                            
                        </div>

                           </div>
        
                
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                    <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Autor</th>
                                        <th>Editorial</th>
                                        <th>Selecionar</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <tr v-for="objeto in arrayLibros" :key="objeto.id">
                                         <td v-text="objeto.codigo"></td>
                                            <td v-text="objeto.nombre"></td>
                                            <td v-text="objeto.nomAut"></td>
                                        <td v-text="objeto.nomEdi"></td>
                                            <td>
                                                 <button type="button" class="btn btn-success btn-sm" @click="AgregarItem(objeto)">
                                                     <i class="fa fa-mouse-pointer"></i> </button>
                                            </td>
                                         
                                              <tr/>
                                    </tbody>
                            </table>
                                           <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item" v-if="pagination.current_page > 1">
                                <a class="page-link" href="#"
                                    @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                            </li>
                            <li class="page-item" v-for="page in pagesNumber" :key="page"
                                :class="[page == isActived ? 'active' : '']">
                                <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)"
                                    v-text="page"></a>
                            </li>
                            <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                <a class="page-link" href="#"
                                    @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                            </li>
                        </ul>

                    </nav>
                    
                            <div class="modal-footer">
                        <button type="button" @click="cerrarModal" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div> 
                         </div> 
                         </div> 
                           
               
                    
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        
        <!--Fin del modal-->
        <!-- Inicio del modal Eliminar -->
        <!-- Fin del modal Eliminar -->
    </main>
</template>

<script>
    export default {
        data() {
            return {
                arrayDatos: [],
                arrayLibros: [],
                arrayPersona:[],
                fec_entrega:"",
                modal: 0,
                titulo:"",
                id_persona:"",
                buscar:"",
                 pagination: {
                    total: 0,
                    current_page: 0,
                    per_page: 0,
                    last_page: 0,
                    from: 0,
                    to: 0,
                 },
            offset: 3,
            criterio:""
               
        }
    },
        methods: {
             cambiarPagina(page, buscar) {
                let me = this;
                //Va a la pagina actual
                me.pagination.current_page = page;
                //metodo para traer los datos
                me.ListarLibro(page, buscar);
            },
                 cambiarPagina1(page, buscar) {
                let me = this;
                //Va a la pagina actual
                me.pagination.current_page = page;
                //metodo para traer los datos
                me.ListarLibro(page, buscar);
            },
            

             AgregarItem: function(data=[]) {
                this.arrayDatos.push({codigo:data['codigo'],
                                    nombre:data['nombre'],
                                    autor:data['nomAut'],
                                    edit:data['nomEdi']});
                this.arrayLibros.splice(0,1);

            },
            
            ListarLibro: function(page, buscar) {
                let me = this;
                var url = "/libro?page=" + page + '&buscar=' + buscar;
                axios
                    .get(url)
                    .then(function(response) {
                        var respuesta = response.data;
                        me.arrayLibros = respuesta.libros.data;

                        me.pagination = respuesta.pagination;
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            },
            
                    getPersona() {
            let me = this
            var url = '/selectPersona'
            axios
                .get(url)
                .then(function (response) {
                    var respuesta = response.data;
                    me.arrayPersona = respuesta.persona;
                })
                .catch(function (error) {
                    console.log(error)
                })
        },

            abrirModal:function () {
                this.modal=1;
                this.titulo="Seleccione un libro";
            
            },
            cerrarModal() {
                this.modal = 0;
                this.titulo="";
            },
            limpiar() {
                this.fec_entrega = "";
            },

        
            },
                    computed: {
            isActived: function() {
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if (!this.pagination.to) {
                    return [];
                }

                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }

                var to = from + this.offset * 2;
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }

                var pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
            mounted() {
        console.log('Component mounted.')
        this.getPersona();
        this.ListarLibro(1, this.buscar);
        // this.ListarAutores(1, this.criterio, this.buscar)
    },
    }

</script> 

<style>
    .modal-content {
        width: 100% !important;
        position: absolute;
    }

    .mostrar {
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #bbb4b47a;
    }

</style>
