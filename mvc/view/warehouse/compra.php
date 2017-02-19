<h1 class="page-header">Resumen de factura</h1>


<div class="row">
  <div class="col-md-6 col-md-offset-3">
<H2>Factura No: <?php echo $this->factura[0]->Numero?></H2>


<table class="table table-striped">
    <thead>
        <tr>
            <th>Id Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Subtotal</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $this->productofactura=new ProductoFactura();
    $this->productofactura->Factura_Id= $this->factura[0]->Id;
    $this->productofactura=$this->productofactura->getWhere();
    
    foreach($this->productofactura as $r): 
    ?>
        <tr>
            <td><?php echo $r->Producto_Id; ?></td>
            <td><?php echo $r->Cantidad; ?></td>
            <td><?php echo $r->PrecioUnitarioCompra; ?></td>
            <td><?php echo $r->PrecioUnitarioCompra*$r->Cantidad; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<H2>Total: <?php echo $this->factura[0]->Total?></H2>
<a class="btn btn-primary" id="regresar">Regresar</a>
</div>
</div>
<script>
$(document).ready(function(){
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {
  $("#regresar").click(function() { show("warehouse","index","#view"); });
    
  });
});
</script>



</script>

    