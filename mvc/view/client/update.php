<?php if ($_SESSION["abcClient"] == "N"): ?>
<h1 class="page-header">Nuevo Cliente</h1>
<?php else: ?>
<h1 class="page-header">Editar Cliente</h1>
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
    
<?php if ($_SESSION["abcClient"] == "E"): ?>

    <div id="divEditar" class="panel panel-primary">
      <div class="panel-heading">
        <strong>
          Cliente
          <?php echo " ".$this->cliente[0]->Id;?>
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        </strong>
      </div>
      <div class="panel-body">
        <form id="form" action="javascript:void(0);" enctype="multipart/form-data">
          
          <div class="form-group" style="display:none;">
            
            <input type="text"
                   name = "Id"
                   class="form-control"
                   value="<?php echo $this->cliente[0]->Id; ?>"
                   data-validacion-tipo="requerido|email" 
                   />
          </div>
          
          <div class="form-group">
            Nit
            <input type="text"
                   name = "Nit"
                   class="form-control"
                   value="<?php echo $this->cliente[0]->Nit;?>"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            Nombre
            <input type="text"
                   name = "Nombre"
                   class="form-control"
                   value="<?php echo $this->cliente[0]->Nombre;?>"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            Teléfono
            <input type="number" step="1"
                   name = "Telefono"
                   class="form-control"
                   value="<?php echo $this->cliente[0]->Telefono;?>"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            Dirección
            <input type="text"
                   name = "Direccion"
                   class="form-control"
                   value="<?php echo $this->cliente[0]->Direccion;?>"
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
          Cliente Nuevo
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        </strong>
      </div>
      <div class="panel-body">
        <form id="form" action="javascript:void(0);" enctype="multipart/form-data">
          <div class="form-group">
            Nit
            <input type="text"
                   name = "Nit"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            Nombre
            <input type="text"
                   name = "Nombre"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            Teléfono
            <input type="number" step="1"
                   name = "Telefono"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            Dirección
            <input type="text"
                   name = "Direccion"
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
      
        <?php if ($_SESSION["abcClient"] == "E"): ?>
         show("client","modificar","#view",$(this).serialize());
        <?php elseif ($_SESSION["abcClient"] == "N"): ?>
          show("client","crear","#view",$(this).serialize());
        <?php endif; ?>
    });
    
    $("#regresar").click(function() { show("client","index","#view"); });
  
  });
  
});
</script>

    