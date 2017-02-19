<h1 class="page-header">Ingreso de productos a bodega</h1>


<div class="row">
  <div class="col-md-6 col-md-offset-3">
      
       <?php if ($this->errLogin != '') { ?>
            <div class="alert alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Hecho!</strong> <?php echo $this->errLogin; ?>
            </div>
    <?php } ?>
    
    <?php if ($this->errLogin2 != '') { ?>
            <div class="alert alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Error!</strong> <?php echo $this->errLogin2; ?>
            </div>
    <?php } ?>


    <div id="divEditar" class="panel panel-primary">
      <div class="panel-heading">
        <strong>
          Factura de compra
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
            Proveedor
            <select class="form-control" name="proveedor">
                 <?php foreach($this->proveedor->getList() as $r): ?>
                    <option value="<?php echo $r->Id; ?>"><?php echo $r->Nit; ?></option>
                <?php endforeach; ?>
            </select>
          </div>
    
        <div class="form-group">
            Fecha    
           <input type="date" name="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>"required>
        </div>

    <table id ="tabla" class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->producto->getList() as $r): ?>
        <tr>
            <td><?php echo $r->Id; ?></td>
            <td><?php echo $r->Descripcion; ?></td>
            <td><div class="form-group">
                <input type="number" step="1"
                   name = "cantidad<?php echo $r->Id; ?>"
                   class="form-control"
                   value="0"
                   required/>
                   </div>
            </td>
            <td><div class="form-group">
                <input type="number" step="0.01"
                   name = "precio<?php echo $r->Id; ?>"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   value="0.00"
                   required/>
                   </div>
                   </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
   </table>
   

<button type="submit" class="btn btn-primary btn-block">Ingresar productos</button>

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
        
        var cont=0;
        
        $('#tabla tbody tr').each(function () {
            
            var IdProducto=$(this).find("td").eq(0).html();;
            var Cantidad = $('input[name="cantidad' + IdProducto + '"]').val();
            var Precio = $('input[name="precio' + IdProducto + '"]').val();
            
            if(Cantidad>0 && Precio>0){cont++;}
        });
        
        if(cont>0){show("warehouse","compra","#view",$(this).serialize()); }
        else {alert("Debe ingresar por lo menos 1 producto con su precio");}
   
    });

  });

});


</script>

    