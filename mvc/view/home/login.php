<div class="row">
  <div class="col-md-4 col-sm-3 col-xs-2"></div>
  <div class="col-md-4 col-sm-6 col-xs-8">
    <?php if ($this->errLogin != '') { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Error!</strong> <?php echo $this->errLogin; ?>
            </div>
    <?php } ?>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <strong>
          Login
          <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
        </strong>
      </div>
      <div class="panel-body">
        <form id="form" action="javascript:void(0);" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text"
                   name = "Email"
                   class="form-control"
                   placeholder="Ingresa tu email"
                   data-validacion-tipo="requerido|email" />
          </div>
          <div class="form-group">
            <input type="password"
                   name = "Password"
                   class="form-control"
                   placeholder="Ingresa tu password"
                   data-validacion-tipo="requerido" />
          </div>
          <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-3 col-xs-2"></div>
</div>

<script>
$(document).ready(function(){
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {
    $("#form").submit(function(event) {
      show("home","login","body",$(this).serialize());
    });
  });
});
</script>
