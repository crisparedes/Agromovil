<h1 class="page-header">Estado de la entrega</h1>


<div class="row">
  <div class="col-md-6 col-md-offset-3">
      
       <?php if ($_SESSION["resultado"]=='C') { ?>
            <div class="alert alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Hecho!</strong> El pedido ha sido entregado al cliente
            </div>
    <?php } ?>
    
    <?php if ($_SESSION["resultado"]=='I') { ?>
            <div class="alert alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Error!</strong> El pedido no ha podido ser entregado <br\>
              porque el número de factura ya existe
            </div>
    <?php } ?>

<br/>
<a class="btn btn-primary" id="regresar">Regresar</a>

<script>
$(document).ready(function(){
    //document.getElementById('fecha').valueAsDate = new Date();
    
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {

     $("#regresar").click(function() { show("order","entregar","#view"); });
    });

});


</script>

    