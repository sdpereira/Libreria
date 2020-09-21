<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Sistema Libros Laravel Vue Js">
        <meta name="author" content="adsi.com">
        <meta name="keyword" content="Sistema libros Laravel Vue Js">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="img/iconlibro3.png">
        <title>Sistema Libros</title>
        <!-- Icons -->
        <link rel="stylesheet" href="css/plantilla.css">
    </head>
    <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
        <div id="app">
            <header class="app-header navbar">
                <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="nav navbar-nav d-md-down-none">
                    <li class="nav-item px-3">
                        <a class="nav-link" href="#">Escritorio</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="#">Configuraciones</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item d-md-down-none">
                        <a class="nav-link" href="#" data-toggle="dropdown">
                            <i class="icon-bell"></i>
                            <span class="badge badge-pill badge-danger">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header text-center">
                                <strong>Notificaciones</strong>
                            </div>
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-envelope-o"></i> Libros
                                <span class="badge badge-success">3</span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-tasks"></i> New
                                <span class="badge badge-danger">2</span>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="img/iconlibro3.png" class="img-avatar" alt="admin@bootstrapmaster.com">
                            <span class="d-md-down-none">admin </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header text-center">
                                <strong>Cuenta</strong>
                            </div>
                            <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Perfil</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
            </header>
            <div class="app-body">
                <!-- <div class="sidebar">
                    <nav class="sidebar-nav">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="main.html"><i class="icon-speedometer"></i> Escritorio</a>
                            </li>
                            <li class="nav-title">
                                Maestras
                            </li>
                            <li class="nav-item nav-dropdown">
                                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bag"></i> General</a>
                                <ul class="nav-dropdown-items">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="icon-user"></i> Autores</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fas fa-bookmark"></i> Categorías</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fas fa-edit"></i> Editoriales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fas fa-language"></i>Idiomas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="icon-globe"></i> Países</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="main.html"><i class="icon-book-open"></i> Ayuda <span class="badge badge-danger">PDF</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="main.html"><i class="icon-info"></i> Acerca de...<span class="badge badge-info">IT</span></a>
                            </li>
                        </ul>
                    </nav>
                    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
                </div> -->
                <!-- Contenido Principal -->
        @include('plantilla.sidebar')
            @yield('contenido')
            </div>
              
        </div>                                
        <footer class="app-footer">
            <span><a href="http://www.ADSI.com/">SDPA</a> &copy; 2020</span>
            <!-- /Fin del contenido principal -->
            <span class="ml-auto">Desarrollado por <a href="http://www.ADSI.com/">ADSI</a></span>
        </footer>
        <script src="js/app.js"></script>
        <script src="js/plantilla.js"></script>
    </body>
    </html>