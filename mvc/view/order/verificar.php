<h1 class="page-header">Detalle de pedido</h1>

<div class="well well-sm text-right">
     <h4 style="float: left;">Pedido <?php echo $this->productopedido[0]->Pedido_Id;?></h4>
    <a class="btn btn-primary" id="regresar">Regresar</a>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->productopedido as $r): ?>
        <tr>
            <td><?php 
            $this->producto= new Producto();
            $this->producto->Id= $r->Producto_Id;
            $this->producto=$this->producto->getWhere();
            echo $this->producto[0]->Descripcion; 
            ?></td>
            <td><?php echo $r->Cantidad; ?></td>
    </tr>
        
    <?php endforeach; ?>
    </tbody>
</table>

<script>
$(document).ready(function(){
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {

   $("#regresar").click(function() { show("order","autorizar","#view"); });
  });
});
</script>