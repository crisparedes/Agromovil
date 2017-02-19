<h1 class="page-header">Producto</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" id="update">Nuevo Producto</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->producto->getList() as $r): ?>
        <tr>
            <td><?php echo $r->Id; ?></td>
            <td><?php echo $r->Descripcion; ?></td>
            <td><?php echo $r->Cantidad; ?></td>
            <td><?php echo $r->PrecioUnitario; ?></td>
            <td><a class="btn btn-primary" id="Edit<?php echo $r->Id; ?>">Editar Producto</a></td>
            <td><a class="btn btn-primary" id="Del<?php echo $r->Id; ?>">Eliminar Producto</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
$(document).ready(function(){
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {
    $("#update").click(function() { show("product","update","#view"); });
    
        <?php foreach($this->producto->getList() as $r): ?>
             $("#Edit<?php echo $r->Id; ?>").click(function() { 
                show("product","editar","#view","IdProducto=<?php echo $r->Id; ?>"); 
             });
             $("#Del<?php echo $r->Id; ?>").click(function() { 
                var deseaEliminar = confirm('¿Está seguro de eliminar este producto?');
                if (deseaEliminar == true) {
                     show("product","eliminar","#view","IdProducto=<?php echo $r->Id; ?>");
                }
             });
        <?php endforeach; ?>
  });
});
</script>