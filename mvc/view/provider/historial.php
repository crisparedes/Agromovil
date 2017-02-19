<h1 class="page-header">Historial de pedidos a proveedores</h1>


<div class="well well-sm text-right">
  <select style="float: left; width: 30%;" id="comboBox" class="form-control">
    <?php foreach($this->proveedor->getList() as $r): ?>
                <option><?php echo $r->Nit; ?></option>
    <?php endforeach; ?>
    </select>
 <a class="btn btn-primary" id="regresar">Regresar</a>
</div>

<div id="history">
</div>

<script>
$(document).ready(function(){
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {
      
        $("#comboBox").change(function() {
            var nit=$("#comboBox option:selected").text();
            show("provider","reporte","#history","Nit="+nit);
        });
        
           $("#regresar").click(function() { show("provider","index","#view"); });
  });
  
});
</script>