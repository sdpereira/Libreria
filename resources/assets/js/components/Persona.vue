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
                    <i class="fa fas fa-bookmark"></i> Usuario
                    <button type="button" class="btn btn-secondary btn-dark" data-toggle="modal"
                        @click="abrirModal('guardar')">
                        <i class="icon-plus"></i>&nbsp;Nuevo
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
                                <th>Documento</th>
                                <th>Número</th>
                                <th>Nombres</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>E-mail</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="objeto in arrayDatos" :key="objeto.id">
                                <td v-text="objeto.documento"></td>
                                <td v-text="objeto.numero"></td>
                                <td v-text="objeto.nombrecompleto"></td>
                                <td v-text="objeto.direccion"></td>
                                <td v-text="objeto.telefono"></td>
                                <td v-text="objeto.email"></td>

                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" @click="abrirModal('editar', objeto)">
                                        <i class="icon-pencil"></i>
                                    </button> &nbsp;
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" @click="EliminarLibro(objeto)">
                                        <i class="icon-trash"></i>
                                    </button>
                                </td>
                            </tr>
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
                </div>
            </div>
            <!-- Fin ejemplo de tabla Listado -->
        </div>
        <!--Inicio del modal agregar/actualizar-->
        <div class="modal fade" id="modalNuevo" :class="{ mostrar: modal }" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-text="titulo"></h4>
                        <button type="button" class="close" @click="cerrarModal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                             <div class="form-group row">
                                <label class="col-md-2 form-control-label" for="text-input">Tipo de documento</label>
                                <div class="col-md-4">
                                    <input type="text" v-model="documento" id="documento" name="documento" class="form-control"
                                        placeholder="Código" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 form-control-label" for="text-input">Número de documento</label>
                                <div class="col-md-10">
                                    <input type="text" v-model="numero" id="numero" name="numero" class="form-control"
                                        placeholder="Nombre del persona" />
                                   
                                </div>
                        
                                <label class="col-md-2 form-control-label" for="text-input">Nombres</label>
                                <div class="col-md-4">
                                    <input type="text" v-model="nombrecompleto" id="nombrecompleto" name="nombrecompleto" class="form-control"
                                        placeholder="Nombres" />
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-md-2 form-control-label" for="text-input">Dirección</label>
                                <div class="col-md-4">
                                    <input type="text" v-model="direccion" id="direccion" name="direccion" class="form-control"
                                        placeholder="Dirección" />
                                </div>
                                <label class="col-md-2 form-control-label" for="text-input">Teléfono</label>
                                <div class="col-md-4">
                                    <input type="text" v-model="telefono" id="telefono" name="telefono" class="form-control"
                                        placeholder="Teléfono" />
                                </div>
                            </div>
                             <div class="form-group row">
                             <label class="col-md-2 form-control-label" for="text-input">E-mail</label>
                                <div class="col-md-4">
                                    <input type="text" v-model="email" id="email" name="email" class="form-control"
                                        placeholder="E-mail" />
                                </div>
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" @click="cerrarModal" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button v-show="accion == 0" type="button" @click="RegistrarPersona" class="btn btn-primary">Guardar </button>
                        <button v-show="accion" type="button" @click="ActualizarLibro" class="btn btn-primary">Actualizar</button>
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
                   
                    <div class="modal-header">
                        <h4 class="modal-title">Eliminar Categoría</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de eliminar la categoría?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" @click="EliminarLibro" class="btn btn-danger">Eliminar</button>
                    </div>
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
                idPersona: 0,
                nombrecompleto: "",
                numero:"",
                apellidos:"",
                direccion:"",
                telefono:"",
                email:"",
                documento:"",
                modal: 0,
                accion: 0,
                titulo: "",
                buscar: "",

                pagination: {
                    total: 0,
                    current_page: 0,
                    per_page: 0,
                    last_page: 0,
                    from: 0,
                    to: 0,
                 },
            offset: 3,
            buscar: '',
            criterio: 'nombrecompleto',
        }
    },
        methods: {
            cambiarPagina(page, buscar, criterio) {
                let me = this;
                //Va a la pagina actual
                me.pagination.current_page = page;
                //metodo para traer los datos
                me.ListarPersona(page, criterio, buscar);
            },

            ListarPersona: function(page, criterio, buscar) {
                let me = this;
                var url = "/persona?page=" + page + '&criterio=' + criterio + '&buscar=' + buscar;
                axios
                    .get(url)
                    .then(function(response) {
                        var respuesta = response.data;
                        me.arrayDatos = respuesta.persona.data;

                        me.pagination = respuesta.pagination;
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            },
            
            RegistrarPersona() {
                let me = this;
                var url = "/persona/registrar";
                axios
                    .post(url, {
                        id:this.idPersona,
                             numero: this.numero,
                        nombrecompleto: this.nombrecompleto,
                        apellidos:this.apellidos,
                        direccion:this.direccion,
                        telefono:this.telefono,
                        email:this.email,
                        documento:this.documento,
                    })
                    .then(function(response) {
                        me.ListarPersona();
                        me.mensaje("¡Se guardó correctamente!");
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            },
            ActualizarLibro() {
                let me = this;
                var url = "/persona/actualizar";
                axios
                    .put(url, {
                        id: this.idPersona,
                           numero: this.numero,
                        nombrecompleto: this.nombrecompleto,
                        apellidos:this.apellidos,
                        direccion:this.direccion,
                        telefono:this.telefono,
                        email:this.email,
                        documento:this.documento,
                    })
                    .then(function(response) {
                        me.ListarPersona();
                        me.mensaje("¡Se actualizó correctamente!");
                        me.cerrarModal();
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            },
            EliminarLibro(data = []) {
                let me = this;
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "¡No, cancélalo!",
                    confirmButtonText: "¡Si, bórralo!"
                }).then(result => {
                    if (result.isConfirmed) {
                        var url = "/persona/eliminar";
                        axios
                            .post(url, {
                                id: data["id"]
                            })
                            .then(function(response) {
                                me.ListarPersona();
                            })
                            .catch(function(error) {
                                console.log(error);
                            });
                        Swal.fire(
                            "¡Eliminado!",
                            "El dato ha sido eliminado.",
                            "success"
                        )
                    }
                })
            },
            abrirModal(accion, data = []) {
                switch (accion) {
                    case "guardar":
                        this.titulo = "Registrar Libro";
                        this.accion = 0;
                        this.limpiar();

                        break;

                    case "editar":
                        this.titulo = "Editar Libro";
                        this.accion = 1;
                        this.idPersona = data["id"];
                          this.numero=data["numero"];
                        this.nombrecompleto = data["nombrecompleto"];
                        this.apellidos = data["apellidos"];
                        this.direccion = data["direccion"];
                        this.telefono = data["telefono"];
                        this.email = data["email"];
                        this.documento = data["documento"];
                        break;

                    default:
                        break;
                }

                this.modal = 1;
            },
            cerrarModal() {
                this.modal = 0;
            },
            limpiar() {
                this.nombrecompleto = "";
            },

            mensaje(msj) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: msj,
                    showConfirmButton: false,
                    timer: 2000
                });
            }
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
            console.log("Component mounted.");
            this.ListarPersona(1, this.criterio, this.buscar);
        }
    };

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
