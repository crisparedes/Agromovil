<h1 class="page-header">Clientes</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" id="update">Nuevo Cliente</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nit</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->cliente->getList() as $r): ?>
        <tr>
            <td><?php echo $r->Id; ?></td>
            <td><?php echo $r->Nit; ?></td>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Telefono; ?></td>
            <td><?php echo $r->Direccion; ?></td>
            <td><a class="btn btn-primary" id="Edit<?php echo $r->Id; ?>">Editar Cliente</a></td>
            <td><a class="btn btn-primary" id="Del<?php echo $r->Id; ?>">Eliminar Cliente</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
$(document).ready(function(){
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {
    $("#update").click(function() { show("client","update","#view"); });
    
        <?php foreach($this->cliente->getList() as $r): ?>
             $("#Edit<?php echo $r->Id; ?>").click(function() { 
                show("client","editar","#view","IdClient=<?php echo $r->Id; ?>"); 
             });
             $("#Del<?php echo $r->Id; ?>").click(function() { 
                var deseaEliminar = confirm('¿Está seguro de eliminar este Cliente?');
                if (deseaEliminar == true) {
                     show("client","eliminar","#view","IdClient=<?php echo $r->Id; ?>");
                }
             });
        <?php endforeach; ?>
  });
});
</script>