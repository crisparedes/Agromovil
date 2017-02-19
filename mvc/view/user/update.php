<?php if ($_SESSION["abcUser"] == "N"): ?>
<h1 class="page-header">Nuevo Usuario</h1>
<?php else: ?>
<h1 class="page-header">Editar Usuario</h1>
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
    
<?php if ($_SESSION["abcUser"] == "E"): ?>

    <div id="divEditar" class="panel panel-primary">
      <div class="panel-heading">
        <strong>
          Usuario
          <?php echo " ".$this->usuario[0]->Id;?>
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        </strong>
      </div>
      <div class="panel-body">
        <form id="form" action="javascript:void(0);" enctype="multipart/form-data">
          
          <div class="form-group" style="display:none;">
            
            <input type="text"
                   name = "Id"
                   class="form-control"
                   value="<?php echo $this->usuario[0]->Id; ?>"
                   data-validacion-tipo="requerido|email" 
                   />
          </div>
          
          <div class="form-group">
            Email
            <input type="text"
                   name = "Email"
                   class="form-control"
                   value="<?php echo $this->usuario[0]->Email;?>"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            Password
            <input type="text"
                   name = "Password"
                   class="form-control"
                   value="<?php echo $this->usuario[0]->Password;?>"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            
          <?php if( $this->usuario[0]->Tipo=="A"): ?>  
            <input type="radio"  name="tipoUsuario"  value="A" <?php echo ($this->usuario[0]->Tipo=="A" ? 'checked' : '')?>> Administrador<br>
          <?php elseif( $this->usuario[0]->Tipo=="V"): ?>
            <input type="radio"  name="tipoUsuario"  value="V" <?php echo ($this->usuario[0]->Tipo=="V" ? 'checked' : '')?>> Vendedor<br>
          <?php elseif( $this->usuario[0]->Tipo=="B"): ?>
            <input type="radio"  name="tipoUsuario"  value="B" <?php echo ($this->usuario[0]->Tipo=="B" ? 'checked' : '')?>> Bodeguero 
          <?php endif; ?>
      
          </div>
          
          <?php if( $this->usuario[0]->Tipo=="V" || $this->usuario[0]->Tipo=="B"): ?>
            <div id="infoUsuario" class="desc">
          <?php else: ?>
            <div id="infoUsuario" class="desc" style="display:none;">
          <?php endif; ?>

          
          <?php if ($this->usuario[0]->Tipo=="V"): ?>

          
          <div class="form-group">
            Nombre
            <input type="text"
                   name = "Nombre"
                   class="form-control"
                   value="<?php echo $this->vendedor[0]->Nombre; ?>"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            Telefono
            <input type="number" step="1"
                   name = "Telefono"
                   class="form-control"
                   value="<?php echo $this->vendedor[0]->Telefono; ?>"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            Dirección
            <input type="text"
                   name = "Direccion"
                   class="form-control"
                   value="<?php echo $this->vendedor[0]->Direccion; ?>"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          
          <?php elseif ($this->usuario[0]->Tipo=="B"): ?>
          
          <div class="form-group">
            Nombre
            <input type="text"
                   name = "Nombre"
                   class="form-control"
                   value="<?php echo $this->bodeguero[0]->Nombre; ?>"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            Telefono
            <input type="number" step="1"
                   name = "Telefono"
                   class="form-control"
                   value="<?php echo $this->bodeguero[0]->Telefono; ?>"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            Dirección
            <input type="text"
                   name = "Direccion"
                   class="form-control"
                   value="<?php echo $this->bodeguero[0]->Direccion; ?>"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          
          
          <?php elseif ($this->usuario[0]->Tipo=="A"): ?>
          
          <div class="form-group">
            Nombre
            <input type="text"
                   name = "Nombre"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   />
          </div>
          <div class="form-group">
            Telefono
            <input type="number" step="1"
                   name = "Telefono"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   />
          </div>
          <div class="form-group">
            Dirección
            <input type="text"
                   name = "Direccion"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   />
          </div>
          
          
          <?php endif; ?>
          
          
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
          Usuario Nuevo
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        </strong>
      </div>
      <div class="panel-body">
        <form id="form" action="javascript:void(0);" enctype="multipart/form-data">
          <div class="form-group">
            Email
            <input type="text"
                   name = "Email"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            Password
            <input type="text"
                   name = "Password"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   required/>
          </div>
          <div class="form-group">
            <input type="radio"  name="tipoUsuario"  value="A" checked> Administrador<br>
            <input type="radio"  name="tipoUsuario"  value="V"> Vendedor<br>
            <input type="radio"  name="tipoUsuario"  value="B"> Bodeguero 
          </div>
          <div id="infoUsuario" class="desc" style="display:none;">
          <div class="form-group">
            Nombre
            <input type="text"
                   name = "Nombre"
                   id="N"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   />
          </div>
          <div class="form-group">
            Telefono
            <input type="number" step="1"
                   name = "Telefono"
                   id="T"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   />
          </div>
          <div class="form-group">
            Dirección
            <input type="text"
                    id="D"
                   name = "Direccion"
                   class="form-control"
                   data-validacion-tipo="requerido|email" 
                   />
          </div>
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
      
        <?php if ($_SESSION["abcUser"] == "E"): ?>
          show("user","modificar","#view",$(this).serialize());
        <?php elseif ($_SESSION["abcUser"] == "N"): ?>
          show("user","crear","#view",$(this).serialize());
        <?php endif; ?>
    });
    
    $("#regresar").click(function() { show("user","index","#view"); });
  
  });
  
    $('input[type="radio"]').click(function() {
       if($(this).attr('name') == 'tipoUsuario') {
            if($(this).attr('value') == 'V') {
                  
                $('#N').attr('required',true);
                $('#D').attr('required',true);
                $('#T').attr('required',true);
                $('#infoUsuario').show("slow");  
            }else if($(this).attr('value') == 'B') {
                $('#N').attr('required',true);
                $('#D').attr('required',true);
                $('#T').attr('required',true);
                $('#infoUsuario').show("slow");
            }else
            {
                $('#N').attr('required',false);
                $('#D').attr('required',false);
                $('#T').attr('required',false);
                $('#infoUsuario').hide("slow");
            }
       }
   });   

});
</script>

    