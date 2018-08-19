<!--Gestión de Clientes-->
    <div class="row">
        <div class="col s12 m12 offset-l3 l9">
            <div class="card ">
                <div class="card-content">
                    <span class="card-title pad-top-conv">Gestión de Clientes</span>
                    <div class="divider"></div>
                    <div class="row">
                        <form class="col s12 m12 l12" method="post">
                        <!--Buscador-->
                            <div class="row">
                                <div class="input-field col s12 m3 l3">
                                    <input name="busqueda" id="first_name" type="text" class="validate">
                                    <label for="first_name">Buscar usuario
                                        <span>
                                            <i class="material-icons small right">search</i>
                                        </span>
                                    </label>
                                </div>
                                <div class="col s12 m4 l4 right">
                                    <button type="submit" name="buscar" id="button-margin" class="waves-effect waves-light btn but-blue-green"><i class="material-icons white-text">search</i></button>
                                    <a id="button-margin" class="waves-effect waves-light btn but-blue-green" href="create.php"><i class="material-icons white-text">add</i></a>
                                </div>
                                <!--Tabla de clientes-->
                                <div class="row">
                                <div class="col s12 m12 l12">
                                <table class="striped responsive-table" id="tablaScroll" class="striped display" data-order='[[ 1, "asc" ]]' data-page-length='10'>
                                        <thead>
                                            <tr>
                                                <th>Usuario</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                                <th>Direccion</th>
                                                <th>Tipo de usuario</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        foreach($data as $row){
                                            print("
                                            <tr>
                                                <td>$row[usuario]</td>
                                                <td>$row[nombre_usu]</td>
                                                <td>$row[apellido_usu]</td>
                                                <td>$row[telefono_usu]</td>
                                                <td>$row[correo_usu]</td>
                                                <td>$row[direccion_usu]</td>
                                                <td>$row[nombre_tipo_usu]</td>
                                                <td>
                                                    <a href='update.php?id=$row[id_usuario]' class='blue-text'><img src='../../web/img/edit.png'></a>
                                                    <a href='../reportes/venta_clientes.php?id=$row[id_usuario]' class='red-text'><i class='material-icons tooltipped red-text' data-position='right' data-delay='50' data-tooltip='Exportar PDF' data-tooltip-id='a2cf0623-500f-da99-021e-0a367f261ad4'>picture_as_pdf</i></a>
                                                </td>
                                            </tr>
                                            ");
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                <div class="divider"></div>
                                <span class="card-title pad-top-conv">Datos estadisticos</span>
                                <div class="divider"></div>
                                <div class="col s12 offset-l3 m12 l6">
                                    <canvas id="usuarios"></canvas>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>