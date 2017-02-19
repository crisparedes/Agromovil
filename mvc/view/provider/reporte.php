<table class="table table-striped">
    <thead>
        <tr>
            <th>Factura No.</th>
            <th>Fecha</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->factura as $r): ?>
        <tr>
            <td><?php echo $r->Numero; ?></td>
            <td><?php echo $r->Fecha; ?></td>
            <td><?php echo $r->Total; ?></td>
            <td><a class="btn btn-primary" id="Report<?php echo $r->Id; ?>">Reporte</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
$(document).ready(function(){
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {
     <?php foreach($this->factura as $r): ?>
             $("#Report<?php echo $r->Id; ?>").click(function() { 
                show("provider","factura","#view","Factura=<?php echo $r->Id; ?>"); 
             });
        <?php endforeach; ?>
  });
});
</script>