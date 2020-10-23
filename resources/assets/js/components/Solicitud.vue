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
                    <i class="fa fas fa-bookmark"></i> Libros
                
                </div>
                    <div class="card-body">

                         <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group row">
                                
                                <label class="col-md-1 form-control-label" for="text-input">
                                    Persona
                                </label>
                                <div class="col-md-5">
                                    <select class="form-control" v-model="id_persona" id="exampleFormControlSelect1">
                                        <option v-for="objeto in arrayPersona" :key="objeto.id" :value="objeto.id" v-text="objeto.nombrecompleto"></option>
                                    </select>
                                </div>
    
                                    <label class="col-md-1 form-control-label" for="text-input">Entrega</label>
                                    <div class="col-md-4">
                                        <input type="date" v-model="fec_entrega" id="fec_entrega" name="fec_entrega" class="form-control"
                                            placeholder="Código" />
                                    </div>
                        </div> 
                    
                        <div class="form-group row">
                            <label class="col-md-1 form-control-label" for="text-input">
                                Libro
                            </label>
                            <div class="col-md-4">
                                     <button type="button" class="btn btn-secondary btn-dark" data-toggle="modal"
                        @click="abrirModal('guardar')">
                        <i class="fa fa-search"></i>&nbsp;Buscar
                    </button> 
                 </div>      

            </div>
                        </form>
              
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Solicitud</th>
                                <th>Persona</th>
                                <th>Entrega</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="objeto in arrayDatos" :key="objeto.id">
                                 
                                <td>
                                
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal">
                                        <i class="fa fa-blind"></i>
                                    </button> &nbsp;
                                </td>
                            </tr>
                        </tbody>
                    </table>
         
                </div>
            </div>
            <!-- Fin ejemplo de tabla Listado -->
           </div>
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
                                <select class="form-control col-md-3" id="opcion" name="opcion">
                                    <option value="nombrecompleto">Nombre</option>
                                </select>
                                <input type="text" id="texto" name="texto" v-model="buscar" class="form-control"
                                    placeholder="Texto a buscar" />
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i> Buscar
                                </button>
                            </div>
                        </div>
                           </div>
        
                
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Libro</th>
                                        <th>Autor</th>
                                        <th>Editorial</th>
                                        <th>Selecionar</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <tr v-for="objeto in arrayDatos" :key="objeto.id">
                                              <tr/>
                                    </tbody>
                            </table>
                            <div class="modal-footer">
                        <button type="button" @click="cerrarModal" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div> 
                         </div> 
                         </div> 
                            </div>
                    
                </div>
                  </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        
        <!--Fin del modal-->
        <!-- Inicio del modal Eliminar -->
        <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-danger" role="document">
                <div class="modal-content">
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Fin del modal Eliminar -->
    </main>
</template>

<script>
    export default {
        data() {
            return {
                arrayDatos: [],
                idSolicitud: 0,
                fec_entrega:"",
                buscar:"",
                nombrecompleto:"",
                arrayPersona:[],
                id_persona:0,

                modal: 0,
               
        }
    },
        methods: {
            
            ListarLibro: function(page, criterio, buscar) {
                let me = this;
                var url = "/libro?page=" + page + '&criterio=' + criterio + '&buscar=' + buscar;
                axios
                    .get(url)
                    .then(function(response) {
                        var respuesta = response.data;
                        me.arrayDatos = respuesta.libros.data;

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

                
            
            },
            cerrarModal() {
                this.modal = 0;
            },
            limpiar() {
                this.fec_entrega = "";
            },

        
            },
            mounted() {
        console.log('Component mounted.')
        this.getPersona();
        this.ListarLibro();
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
