<h1 class="page-header">Proveedores</h1>


<div class="well well-sm text-right">
     <a style="float: left;" class="btn btn-primary" id="historial">Historial de pedidos</a>
    <a class="btn btn-primary" id="update">Nuevo Proveedor</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nit</th>
            <th>Nombre</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->proveedor->getList() as $r): ?>
        <tr>
            <td><?php echo $r->Id; ?></td>
            <td><?php echo $r->Nit; ?></td>
            <td><?php echo $r->Nombre; ?></td>
            <td><a class="btn btn-primary" id="Edit<?php echo $r->Id; ?>">Editar Proveedor</a></td>
            <td><a class="btn btn-primary" id="Del<?php echo $r->Id; ?>">Eliminar Proveedor</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
$(document).ready(function(){
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {
    $("#update").click(function() { show("provider","update","#view"); });
     $("#historial").click(function() { show("provider","historial","#view"); });
        <?php foreach($this->proveedor->getList() as $r): ?>
             $("#Edit<?php echo $r->Id; ?>").click(function() { 
                show("provider","editar","#view","IdProvider=<?php echo $r->Id; ?>"); 
             });
             $("#Del<?php echo $r->Id; ?>").click(function() { 
                var deseaEliminar = confirm('¿Está seguro de eliminar este proveedor?');
                if (deseaEliminar == true) {
                     show("provider","eliminar","#view","IdProvider=<?php echo $r->Id; ?>");
                }
             });
        <?php endforeach; ?>
  });
});
</script>