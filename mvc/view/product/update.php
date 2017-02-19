<?php if ($_SESSION["abcProduct"] == "N"): ?>
<h1 class="page-header">Nuevo Producto</h1>
<?php else: ?>
<h1 class="page-header">Editar Producto</h1>
<?php endif; ?>


<div class="row">
  <div class="col-md-4 col-sm-3 col-xs-2"></div>
  <div class="col-md-4 col-sm-6 col-xs-8">
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
    
<?php if ($_SESSION["abcProduct"] == "E"): ?>

    <div id="divEditar" class="panel panel-primary">
      <div class="panel-heading">
        <strong>
          Producto
          <?php echo " ".$this->producto[0]->Id;?>
          <span class="glyphicon glyphicon-barcode" aria-hidden="true"></span>
        </strong>
      </div>
      <div class="panel-body">
        <form id="form" action="javascript:void(0);" enctype="multipart/form-data">
          
          <div class="form-group" style="display:none;">
            
            <input type="text"
                   name = "Id"
                   class="form-control"
                   value="<?php echo $this->producto[0]->Id; ?>"
                   data-validacion-tipo="requerido|email" 
                   />
          </div>
          
          <div class="form-group">
            Descripción
            <input type="text"
                   name = "Descripcion"
                   class="form-control"
                   value="<?php echo $this->producto[0]->Descripcion;?>"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            Cantidad
            <input type="number" step="1"
                   name = "Cantidad"
                   class="form-control"
                   value="<?php echo $this->producto[0]->Cantidad;?>"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          
            <div class="form-group">
            Precio Unitario
            <input type="number" step="0.01"
                   name = "PrecioUnitario"
                   class="form-control"
                   value="<?php echo $this->producto[0]->PrecioUnitario;?>"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
         
          <button type="submit" class="btn btn-primary btn-block">Modificar</button>
          <a class="btn btn-primary btn-block" id="regresar">Regresar</a>
             </form>
      </div>
    </div>
    
    
<?php else: ?>

    <div id="divEditar" class="panel panel-primary">
      <div class="panel-heading">
        <strong>
          Producto Nuevo
          <span class="glyphicon glyphicon-barcode" aria-hidden="true"></span>
        </strong>
      </div>
      <div class="panel-body">
        <form id="form" action="javascript:void(0);" enctype="multipart/form-data">
         <div class="form-group">
            Descripción
            <input type="text"
                   name = "Descripcion"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            Cantidad
            <input type="number" step="1"
                   name = "Cantidad"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          
            <div class="form-group">
            Precio Unitario
            <input type="number" step="0.01"
                   name = "PrecioUnitario"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
        
          <button type="submit" class="btn btn-primary btn-block">Crear</button>
          <a class="btn btn-primary btn-block" id="regresar">Regresar</a>
        </form>
      </div>
    </div>

<?php endif; ?>

  </div>
  <div class="col-md-4 col-sm-3 col-xs-2"></div>
</div>

<script>
$(document).ready(function(){
    
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {

    $("#form").submit(function(event) {
      
        <?php if ($_SESSION["abcProduct"] == "E"): ?>
         show("product","modificar","#view",$(this).serialize());
        <?php elseif ($_SESSION["abcProduct"] == "N"): ?>
          show("product","crear","#view",$(this).serialize());
        <?php endif; ?>
    });
    
    $("#regresar").click(function() { show("product","index","#view"); });
  
  });
  
});
</script>

    
