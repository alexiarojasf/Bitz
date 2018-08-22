<!--Proveedores-->
<main>
    <div class="row">
        <div class="col s12 m12 offset-l3 l9">
            <div class="card ">
                <div class="card-content">
                    <span class="card-title pad-top-conv">Gestión de proveedores</span>
                    <div class="divider"></div>
                    <div class="row">
                        <form method="post" class="col s12 m12 l12">
                            <div class="row">
                                <div class="input-field col s12 m3 l3">
                                    <input name="busqueda" id="first_name" autocomplete = 'off' type="text" class="validate">
                                    <label for="first_name">Buscar proveedor
                                        <span>
                                            <i class="material-icons small right">search</i>
                                        </span>
                                    </label>
                                </div> 
                                <div class="col s12 m4 l4 right">
                                    <button type="submit" name="buscar" id="button-margin" class="waves-effect waves-light btn but-blue-green"><i class="material-icons white-text">search</i></button>
                                    <a id="button-margin" class="waves-effect waves-light btn but-blue-green" href="create.php"><i class="material-icons white-text">add</i></a>
                                </div>
                            </form>
                                
                                    
                              
                                <div class="col s12 m12 l12">
                                    <table class="striped" id="tablaScroll" class="striped display" data-order='[[ 1, "asc" ]]' data-page-length='10'>
                                        <thead>
                                            <tr>
                                                <th>Proveedor</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        foreach($data as $row){
                                            print("
                                            <tr>
                                                <td>$row[nombre_prov]</td>
                                                <td>
                                                    <a href='update.php?id=$row[id_proveedor]' class='blue-text'><img src='../../web/img/edit.png'></a>
                                                    <a href='delete.php?id=$row[id_proveedor]' class='red-text'><img src='../../web/img/eraser.png'></a>
                                                </td>
                                            </tr>
                                            ");
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    <div class="divider"></div>
                                    <div class="row">
                                        <div class="col s12 m6 l6">
                                        <h6 class="green-text">Exportar</h6>
                                        <a href="../dashboard/proveedor_report.php?" target="_blank"><i class="material-icons tooltipped red-text" data-position="right" data-delay="50" data-tooltip="Exportar PDF" data-tooltip-id="3d4c624a-d5e0-bd05-a2b9-1ac4333ea8e2">picture_as_pdf</i></a>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <span class="card-title pad-top-conv">Datos estadisticos</span>
                                    <div class="divider"></div>
                                    <div class="col s12 offset-l3 m12 l6 ">
                                        <canvas id="provs"></canvas>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>