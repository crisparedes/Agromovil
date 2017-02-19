<?php 
require_once 'controller.class.php';
require_once __DIR__ . '/../model/producto.php';

class ProductController extends Controller {
  public $producto;
  public $errLogin = '';
  public $errLogin2 = '';
  
  public function __CONSTRUCT($action='index') {
    parent::__construct('product',$action);
    $this->producto = new Producto();
  }

  public function index() {
    $this->view();
  }
  
  public function update() {
    $this->producto= new Producto();
    $_SESSION["abcProduct"] = "N";
    $this->view();
  }
  
  
  public function eliminar() {
    
    $this->producto=new Producto();
    $this->producto->delete($_REQUEST['IdProducto']);
    $this->view('index');
  }
  
  public function editar() {
    $id=$_REQUEST['IdProducto'];  
    $this->producto=new Producto();
    $this->producto->Id = $id;
    $this->producto = $this->producto->getWhere();
    $_SESSION["abcProduct"] = "E";
    
    $this->view('update');
  }
  
  
  public function modificar() {
   
    $id=$_REQUEST['Id'];
    $descripcion=$_REQUEST['Descripcion'];
    $cantidad=$_REQUEST['Cantidad'];
    $precioUnitario=$_REQUEST['PrecioUnitario'];
    
    $this->producto=new Producto();
    $this->producto->Id = $id;
    $this->producto = $this->producto->verificarNombre($id,$descripcion);
    
    if(count($this->producto)==0) {
      $this->producto=new Producto();
      $this->producto->Descripcion = $descripcion;
      $this->producto->Cantidad = $cantidad;
      $this->producto->PrecioUnitario=$precioUnitario;
      $this->producto->save();
      
      $this->errLogin = 'Producto modificado';
     }
     else{
       $this->errLogin2 = 'Ya existe la Descripcion del producto '.$descripcion;
     }
    
    $this->producto=new Producto();
    $this->producto->Id = $id;
    $this->producto = $this->producto->getWhere();
     
    $_SESSION["abcProduct"] = "E";
    
    $this->view('update');
  }
  
  public function crear()
  {

    $descripcion=$_REQUEST['Descripcion'];
    $cantidad=$_REQUEST['Cantidad'];
    $precioUnitario=$_REQUEST['PrecioUnitario'];
    
    $this->producto=new Producto();
    $this->producto=$this->producto->verificarNombreN($descripcion);
    
     if(count($this->producto)==0){
        $this->producto=new Producto();
        $this->producto->Descripcion = $descripcion;
        $this->producto->Cantidad = $cantidad;
        $this->producto->PrecioUnitario=$precioUnitario;
        $this->producto=$this->producto->save();
        
        $this->producto=new Producto();
        $this->producto->Descripcion = $descripcion;
        $this->producto=$this->producto->getWhere();
        
        $id=$this->producto[0]->Id;
    
    $this->errLogin = 'Producto '.$descripcion.' creado correctamente'; 
     }
     else{
       $this->errLogin2 = 'Ya existe la descripcion de producto '.$descripcion;
     }
    $_SESSION["abcProduct"] = "N";
    
    $this->view('update');

  }
}
?>
