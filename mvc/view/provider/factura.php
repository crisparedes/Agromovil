<div class="row">
    
  
  <div class="col-md-4">
   <h2>Reporte de pedido</h2>
    <br/>
   </div>
</div>

<div class="well well-sm text-right">
     <h4 style="float: left;">Factura <?php echo $this->factura[0]->Numero;?></h4>
    <a class="btn btn-primary" id="regresar">Regresar</a>
</div>


<br/>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->productofactura as $r): ?>
        <tr>
            
            <?php $this->producto = new Producto(); 
            $this->producto->Id=$r->Producto_Id;
             $this->producto=$this->producto->getWhere();?>
            
            <td><?php echo  $this->producto[0]->Descripcion; ?></td>
            
            <td><?php echo $r->Cantidad; ?></td>
            <td><?php echo $r->PrecioUnitarioCompra; ?></td>
            

            
            </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
$(document).ready(function(){
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {
      
           $("#regresar").click(function() { show("provider","historial","#view"); });
  });
  
});
</script>