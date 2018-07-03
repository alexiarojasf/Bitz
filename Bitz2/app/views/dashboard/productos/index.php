<!--PRODUCTOS-->
<main>
    <div class="row">
        <div class="col s12 m12 offset-l3 l9">
            <div class="card ">
                <div class="card-content">
                    <span class="card-title pad-top-conv">Gestion de productos</span>
                    <div class="divider"></div>
                    <div class="row">
                        <form class="col s12 m12 l12" method="post">
                            <div class="row">
                                <div class="input-field col s12 m3 l3">
                                    <input name="busqueda" id="first_name" type="text" class="validate">
                                    <label for="first_name">Buscar productos
                                        <span>
                                            <i class="material-icons small right">search</i>
                                        </span>
                                    </label>
                                </div>
                                <div class="col s12 m4 l4 right">
                                    <button type="submit" name="buscar" id="button-margin" class="waves-effect waves-light btn but-blue-green"><i class="material-icons white-text">search</i></button>
                                    <a id="button-margin" class="waves-effect waves-light btn but-blue-green" href="create.php"><i class="material-icons white-text">add</i></a>
                                </div>
                                <div class="row">
                                <div class="col s12 m12 l12">
                                <table class="striped responsive-table" id="tablaScroll" class="striped display" data-order='[[ 1, "asc" ]]' data-page-length='10'>
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Descripcion</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Categoria</th>
                                                <th>Proveedor</th>
                                                <th>Modelo</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead> 

                                        <tbody>
                                        <?php
                                        foreach($data as $row){
                                            print("
                                            <tr>
                                                <td>$row[nombre_prod]</td>
                                                <td>$row[descripcion_prod]</td>
                                                <td>$row[cantidad_prod]</td>
                                                <td>$row[precio_prod]</td>
                                                <td>$row[nombre_tipo_prod]</td>
                                                <td>$row[nombre_prov]</td>
                                                <td>$row[modelo_prod]</td>
                                                <td>$row[estado]</td>
                                                <td>
                                                    <a href='update.php?id=$row[id_producto]' class='blue-text'><img src='../../web/img/edit.png'></a>
                                                    <a href='delete.php?id=$row[id_producto]' class='red-text'><img src='../../web/img/eraser.png'></a>
                                                </td>
                                            </tr>
                                            ");
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>