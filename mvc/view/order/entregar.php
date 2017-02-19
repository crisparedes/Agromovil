<h1 class="page-header">Entregar pedidos</h1>



<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->pedido->getList() as $r): ?>
    
    <?php    if($this->vendedor[0]->Id==$r->Vendedor_Id):?>
        <tr>
            <td><?php echo $r->Id; ?></td>
            <td><?php echo $r->FechaPedido; ?></td>
            <?php    if($r->Estado=='1'):?>
            <td>Autorizado</td>
            <td><a class="btn btn-primary" id="Entregar<?php echo $r->Id; ?>">Entregar pedido</a></td>
            <?php endif;?>
             <?php    if($r->Estado=='0'):?>
            <td>No autorizado</td>
            <td></td>
            <?php endif;?>
            <?php    if($r->Estado=='2'):?>
            <td>Entregado</td>
            <td></td>
            <?php endif;?>
        </tr>
         <?php endif;?>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
$(document).ready(function(){
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {
    $("#update").click(function() { show("client","update","#view"); });
    
        <?php foreach($this->pedido->getList() as $r): 
         if($r->Estado=='1'):?>
         <?php    if($this->vendedor[0]->Id==$r->Vendedor_Id):?>
             $("#Entregar<?php echo $r->Id; ?>").click(function() { 
                show("order","facturar","#view","IdPedido=<?php echo $r->Id; ?>"); 
             });
        <?php 
        endif;?>
        <?php 
        endif;
        endforeach; ?>
  });
});
</script>