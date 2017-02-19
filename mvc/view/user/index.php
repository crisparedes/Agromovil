<h1 class="page-header">Usuarios</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" id="update">Nuevo Usuario</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Tipo</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->usuario->getList() as $r): ?>
        <tr>
            <td><?php echo $r->Id; ?></td>
            <td><?php echo $r->Email; ?></td>
            <td><?php echo $r->Tipo; ?></td>
            <td><a class="btn btn-primary" id="Edit<?php echo $r->Id; ?>">Editar Usuario</a></td>
            <td><a class="btn btn-primary" id="Del<?php echo $r->Id; ?>">Eliminar Usuario</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
$(document).ready(function(){
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {
    $("#update").click(function() { show("user","update","#view"); });
    
        <?php foreach($this->usuario->getList() as $r): ?>
             $("#Edit<?php echo $r->Id; ?>").click(function() { 
                show("user","editar","#view","IdUsuario=<?php echo $r->Id; ?>"); 
             });
             $("#Del<?php echo $r->Id; ?>").click(function() { 
                var deseaEliminar = confirm('¿Está seguro de eliminar este usuario?');
                if (deseaEliminar == true) {
                     show("user","eliminar","#view","IdUsuario=<?php echo $r->Id; ?>");
                }
             });
        <?php endforeach; ?>
  });
});
</script>