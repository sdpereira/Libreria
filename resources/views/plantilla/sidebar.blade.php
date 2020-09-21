<div class="sidebar">
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
                                    <li @click="menu=1" class="nav-item">
                                        <a class="nav-link" href="#"><i class="icon-user"></i> Autores</a>
                                    </li>
                                    <li @click="menu=2" class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fas fa-bookmark"></i> Categorías</a>
                                    </li>
                                    <li @click="menu=3" class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fas fa-edit"></i> Editoriales</a>
                                    </li>
                                    <li  @click="menu=4" class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fas fa-language"></i>Idiomas</a>
                                    </li>
                                    <li @click="menu=5" class="nav-item">
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
                </div>