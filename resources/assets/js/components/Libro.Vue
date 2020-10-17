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
                                    <option value="nombre">Nombre</option>
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
                                <th>Nombre</th>
                                <th>Codigo</th>
                                <th>Cantida</th>
                                <th>Año publicación</th>
                                <th>Numero páginas</th>
                                <th>Ubicación</th>
                                <th>Edición</th>
                                <th>Categoria</th>
                                <th>Idioma</th>
                                <th>Autor</th>
                                <th>Editorial</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="objeto in arrayDatos" :key="objeto.id">
                                <td v-text="objeto.nombre"></td>
                                 <td v-text="objeto.codigo"></td>
                                  <td v-text="objeto.cant"></td>
                                   <td v-text="objeto.año_publi"></td>
                                    <td v-text="objeto.num_pag"></td>
                                     <td v-text="objeto.ubicacion"></td>
                                      <td v-text="objeto.edicion"></td>
                                       <td v-text="objeto.nomCat"></td>
                                        <td v-text="objeto.nomEdi"></td>
                                         <td v-text="objeto.nomIdi"></td>
                                          <td v-text="objeto.nomAut"></td>
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
               <!-- <nav>
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
                    </nav> -->
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
                                <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control"
                                        placeholder="Nombre de categoría" />
                                    <span class="help-block">(*) Ingrese el nombre de la categoría</span>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control"
                                        placeholder="Nombre de categoría" />
                                    <span class="help-block">(*) Ingrese el nombre de la categoría</span>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control"
                                        placeholder="Nombre de categoría" />
                                    <span class="help-block">(*) Ingrese el nombre de la categoría</span>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control"
                                        placeholder="Nombre de categoría" />
                                    <span class="help-block">(*) Ingrese el nombre de la categoría</span>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control"
                                        placeholder="Nombre de categoría" />
                                    <span class="help-block">(*) Ingrese el nombre de la categoría</span>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control"
                                        placeholder="Nombre de categoría" />
                                    <span class="help-block">(*) Ingrese el nombre de la categoría</span>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control"
                                        placeholder="Nombre de categoría" />
                                    <span class="help-block">(*) Ingrese el nombre de la categoría</span>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control"
                                        placeholder="Nombre de categoría" />
                                    <span class="help-block">(*) Ingrese el nombre de la categoría</span>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control"
                                        placeholder="Nombre de categoría" />
                                    <span class="help-block">(*) Ingrese el nombre de la categoría</span>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control"
                                        placeholder="Nombre de categoría" />
                                    <span class="help-block">(*) Ingrese el nombre de la categoría</span>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control"
                                        placeholder="Nombre de categoría" />
                                    <span class="help-block">(*) Ingrese el nombre de la categoría</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" @click="cerrarModal" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button v-show="accion == 0" type="button" @click="RegistrarLibro" class="btn btn-primary">Guardar </button>
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
                nombre: "",
                idLibro: 0,
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
                criterio: 'nombre',
            }
        },
        methods: {
            cambiarPagina(page, buscar, criterio) {
                let me = this;
                //Va a la pagina actual
                me.pagination.current_page = page;
                //metodo para traer los datos
                me.ListarLibro(page, criterio, buscar);
            },

            ListarLibro: function(page, criterio, buscar) {
                let me = this;
                var url = "/libro?page=" + page + '&criterio=' + criterio + '&buscar=' + buscar;
                axios
                    .get(url)
                    .then(function(response) {
                        var respuesta = response.data;
                        me.arrayDatos = respuesta.libro.data;
                        me.pagination = respuesta.pagination;
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            },
                    getCategoria() {
            let me = this
            var url = '/selectCategoria'
            axios
                .get(url)
                .then(function (response) {
                    var respuesta = response.data
                    me.arrayPais = respuesta.categoria
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
                getEditorial() {
            let me = this
            var url = '/selectEditorial'
            axios
                .get(url)
                .then(function (response) {
                    var respuesta = response.data
                    me.arrayEditoriales = respuesta.editorials
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
                getAutores() {
            let me = this
            var url = '/selectAutores'
            axios
                .get(url)
                .then(function (response) {
                    var respuesta = response.data
                    me.arrayAutores= respuesta.autores
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
                getPais() {
            let me = this
            var url = '/selectPais'
            axios
                .get(url)
                .then(function (response) {
                    var respuesta = response.data
                    me.arrayPais = respuesta.pais
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
            RegistrarLibro() {
                let me = this;
                var url = "/libro/registrar";
                axios
                    .post(url, {
                        nombre: this.nombre
                    })
                    .then(function(response) {
                        me.ListarLibro();
                        me.mensaje("¡Se guardó correctamente!");
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            },
            ActualizarLibro() {
                let me = this;
                var url = "/libro/actualizar";
                axios
                    .put(url, {
                        id: this.idLibro,
                        nombre: this.nombre
                    })
                    .then(function(response) {
                        me.ListarLibro();
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
                        var url = "/libro/eliminar";
                        axios
                            .post(url, {
                                id: data["id"]
                            })
                            .then(function(response) {
                                me.ListarLibro();
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
                        this.titulo = "Registrar Categoria";
                        this.accion = 0;
                        this.limpiar();

                        break;

                    case "editar":
                        this.titulo = "Editar Categoria";
                        this.accion = 1;
                        this.idLibro = data["id"];
                        this.nombre = data["nombre"];
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
                this.nombre = "";
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
            
            this.ListarLibro(1, this.criterio, this.buscar);
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
