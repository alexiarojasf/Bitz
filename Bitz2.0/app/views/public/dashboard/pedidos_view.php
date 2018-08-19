<div class="row">
<h4 class="white-text col offset-l5">Compras</h4>
</div>
</div>
<div class="row">
<div class="compras col l10 offset-l1 white">
<form action="detalle_view.php" method="POST">
<table class="responsive-table striped">
        <thead>
          <tr>
              <th>N° Tickect</th>
              <th>Estado</th>
              <th>Fecha</th>
              <th>Detalle</th>
          </tr>
        </thead>

        <tbody>
          <?php
        if($data){
            foreach($data as $row){
                print("
                <tr>
                    <td>$row[id_factura]</td>
                    <td>$row[nombre_estado_envio]</td>
                    <td>$row[fecha]</td>
                    <td>
                    <a  href='detalle_factura.php?id=$row[id_factura]' target='_blank'><i class='material-icons tooltipped ver-detalle' data-position='right' data-delay='50' data-tooltip='Detalles'>shopping_cart</i></a>
                    </td>
                </tr>
                ");
            }
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
      </form>
</div></div>