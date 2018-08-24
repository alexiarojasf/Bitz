<div class="container">
    <table class='highlight white' id='mi_tabla'>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio($)</th>
                <th>Cantidad</th>
                <th>Subtotal($)</th>
                <th>Subtotal($)</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
        if($data){
            foreach($data as $row){
                print("
                <tr>
                    <td>$row[nombre_prod]</td>
                    <td>$row[precio_prod]</td>
                    <td>$row[cantidad_producto]</td>
                    <td>$row[subtotal]</td>
                    <td>
                    <a href='update_carrito.php?id=$row[id_detalle]' class='blue-text'><img src='../web/img/edit.png'></a>
                    <a href='delete_carrito.php?id=$row[id_detalle]' class='red-text'><img src='../web/img/eraser.png'></a>
                    </td>
                </tr>
                ");
            }
            print("
    <form method='post' enctype='multipart/form-data'>
    <button type='submit' name='comprar' class='btn waves-effect blue tooltipped' data-tooltip='Comprar'>Finalizar Compra</button>
    </form>");
        }else{
            print("
            <tr>
                <td>No hay productos en el carrito<td>
            </tr>
            ");
        }   
        ?>
        </tbody>
    </table>
</div>
