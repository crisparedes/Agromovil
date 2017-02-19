<h1 class="page-header">Realiar Pedido</h1>


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
          Pedido a realizar
          <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
        </strong>
      </div>
      <div class="panel-body">
        <form id="form" action="javascript:void(0);" enctype="multipart/form-data">

        <div class="form-group">
            Fecha    
           <input type="date" name="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>"required>
        </div>

    <table id ="tabla" class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Descripcion</th>
            <th>Disponible</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->producto->getList() as $r): ?>
        <tr>
            <td><?php echo $r->Id; ?></td>
            <td><?php echo $r->Descripcion; ?></td>
            <td><?php echo $r->Cantidad; ?></td>
            <td><div class="form-group">
                <input type="number" step="1"
                   name = "cantidad<?php echo $r->Id; ?>"
                   class="form-control"
                   value="0"
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
        var cont2=0;
        var cont3=0;
        
        $('#tabla tbody tr').each(function () {
            
            var IdProducto = $(this).find("td").eq(0).html();
            
            var D = $(this).find("td").eq(2).html();
            
            var C = $('input[name="cantidad' + IdProducto + '"]').val();

            if(parseInt(D) < parseInt(C)){
                cont++;
            }
            
            if(C == 0)
            {
                cont2++;
                
            }
            
            cont3++;
            
        });
        
        if(cont == 0){
            
            if(cont2 != cont3)
            {
             show("order","pedido","#view", $(this).serialize());
            }else
            {
                alert("Debe realizar el pedido de por lo menos un producto");
            }
            
        }else
        {
            alert("Debe ingresar cantidades menores o iguales a la disponibilidad de productos");
        }
   
    });

  });

});


</script>

    