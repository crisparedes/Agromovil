<h1 class="page-header">Ingreso de productos a bodega</h1>


<div class="row">
  <div class="col-md-6 col-md-offset-3">
      


    <div id="divEditar" class="panel panel-primary">
      <div class="panel-heading">
        <strong>
          Factura de venta
          <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
        </strong>
      </div>
      <div class="panel-body">
        <form id="form" action="javascript:void(0);" enctype="multipart/form-data">
         <div class="form-group">
            Factura No
            <input type="number" step="1"
                   name = "factura"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>

          <div class="form-group">
            Cliente
            <select class="form-control" name="cliente">
                 <?php foreach($this->cliente->getList() as $r): ?>
                    <option value="<?php echo $r->Id; ?>"><?php echo $r->Nit; ?></option>
                <?php endforeach; ?>
            </select>
          </div>
    
        <div class="form-group">
            Fecha    
           <input type="date" name="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>"required>
        </div>

      <div class="form-group">
            Total
         <input type="number" name="total" class="form-control" value="<?php echo $this->totalFacturaVenta; ?>" readonly="readonly" >
          </div>
     
     <div class="form-group">
            Pedido
         <input type="number" name="pedido" class="form-control" value="<?php echo $this->pedidoCliente; ?>" readonly="readonly"  >
          </div>
    

<button type="submit" class="btn btn-primary btn-block">Entregar venta</button>

        </form>
      </div>
    </div>
      
  </div>
  </div>


<script>
$(document).ready(function(){
    //document.getElementById('fecha').valueAsDate = new Date();
    
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {

    $("#form").submit(function(event) {
        
        show("order","venta","#view",$(this).serialize());
   
    });

  });

});


</script>

    