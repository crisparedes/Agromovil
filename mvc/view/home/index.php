<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button"
              class="navbar-toggle"
              data-toggle="collapse"
              data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        <span class="glyphicon glyphicon-home"></span>
          Distribuidora
      </a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a id="home">Home</a></li>
        <?php if ($_SESSION["tipoUsuario"] == "A") { ?>
        <li><a id="user">Usuarios</a></li>
        <li><a id="provider">Proveedores</a></li>
        <li><a id="product">Productos</a></li>
        <li><a id="client">Clientes</a></li>
        <?php } ?>
        
        <?php if ($_SESSION["tipoUsuario"] == "B") { ?>
        <li><a id="warehouse">Ingreso a bodega</a></li>
        <li><a id="autorizar">Autorizar Pedido</a></li>
        <?php } ?>
        
        <?php if ($_SESSION["tipoUsuario"] == "V") { ?>
        <li><a id="order">Realizar Pedido</a></li>
        <li><a id="entregar">Entregar Pedido</a></li>
        <?php } ?>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo $this->tipoUsuario; ?></a></li>
        <li><a href="#"><?php echo $_SESSION["Email"]; ?></a></li>
        <li>
          <a id="logout">
            Salir <span class="glyphicon glyphicon-log-out"></span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="container body-content">
  <div id="view">
    <div class="jumbotron">
      <h1>Distribuidora</h1>
      <p class="lead">Sistema para la adiministración de una Distribuidora</p>
      <p><a href="#" class="btn btn-primary btn-lg">Leer mas &raquo;</a></p>
    </div>

    <div class="row">
      <div class="col-md-4">
        <h2>Funcionalidad principal 1</h2>
        <p>
          Descripcion sobre la funcionaldiad principal 1
        </p>
        <p><a class="btn btn-default" href="#">Ver funcionalidad 1 &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Funcionalidad principal 2</h2>
        <p>
          Descripcion sobre la funcionalidad principal 2
        </p>
        <p><a class="btn btn-default" href="#">Ver funcionalidad 2 &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Funcionalidad principal 3</h2>
        <p>
          Descripcion sobre la funcionaldiad principal 3
        </p>
        <p><a class="btn btn-default" href="#">Ver funcionalidad 3 &raquo;</a></p>
      </div>
    </div>
  </div>
  <hr>
  <footer>
    <p>
      &copy; <?php echo date("Y") ?> - Distribuidora
    </p>
  </footer>
</div>

<script>
$(document).ready(function(){
  $.getScript("mvc/lib/js/ajaxmvc.js",function() {
    $("#home").click(function() { show("home","index","body",""); });
    $("#logout").click(function() { show("home","logout","body",""); });
    $("#user").click(function() { show("user","index","#view",""); });
    $("#provider").click(function() { show("provider","index","#view",""); });
    $("#product").click(function() { show("product","index","#view",""); });
    $("#client").click(function() { show("client","index","#view",""); });
    $("#warehouse").click(function() { show("warehouse","index","#view",""); });
    $("#order").click(function() { show("order","index","#view",""); });
    $("#autorizar").click(function() { show("order","autorizar","#view",""); });
    $("#entregar").click(function() { show("order","entregar","#view",""); });
  });
});
</script>
