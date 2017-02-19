<h1 class="page-header">Autorizar pedidos</h1>



<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Fecha</th>
            <th>Vendedor</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->pedido->getList() as $r): 
    if($r->Estado=='0'):
    ?>
        <tr>
            <td><?php echo $r->Id; ?></td>
            <td><?php echo $r->FechaPedido; ?></td>
            <td><?php 
            $this->vendedor=new Vendedor;
            $this->vendedor->Id=$r->Vendedor_Id;
            $this->vendedor=$this->vendedor->getWhere();
            echo $this->vendedor[0]->Nombre; 
            ?></td>
            <td><a class="btn btn-primary" id="Verificar<?php echo $r->Id; ?>">Verificar pedido</a></td>
            <td><a class="btn btn-primary" id="Autorizar<?php echo $r->Id; ?>">Autorizar Pedido</a></td>
        </tr>
        
    <?php 
    endif;
    endforeach; ?>
    </tbody>
</table>

<script>
$(document).ready(function(){
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {
    $("#update").click(function() { show("client","update","#view"); });
    
        <?php foreach($this->pedido->getList() as $r): 
         if($r->Estado=='0'):?>
             $("#Verificar<?php echo $r->Id; ?>").click(function() { 
                show("order","verificar","#view","IdPedido=<?php echo $r->Id; ?>"); 
             });
             $("#Autorizar<?php echo $r->Id; ?>").click(function() { 
                show("order","validar","#view","IdPedido=<?php echo $r->Id; ?>"); 
             });
        <?php 
        endif;
        endforeach; ?>
  });
});
</script>