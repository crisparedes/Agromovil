<?php 
require_once 'controller.class.php';
require_once __DIR__ . '/../model/proveedor.php';
require_once __DIR__ . '/../model/factura.php';
require_once __DIR__ . '/../model/productofactura.php';
require_once __DIR__ . '/../model/producto.php';

class ProviderController extends Controller {
  public $proveedor;
  public $factura;
  public $productofactura;
  public $producto;
  
  public $errLogin = '';
  public $errLogin2 = '';
  
  public function __CONSTRUCT($action='index') {
    parent::__construct('provider',$action);
    $this->proveedor = new Proveedor();
    $this->factura = new Factura();
    $this->productofactura = new ProductoFactura();
    $this->producto=new Producto();
  }

  public function index() {
    $this->view();
  }
  
  public function update() {
    $this->proveedor= new Proveedor();
    $_SESSION["abcProvider"] = "N";
    $this->view();
  }
   
   public function historial() {
    $this->view();
  }
  
  public function eliminar() {
    
    $this->proveedor=new Proveedor();
    $this->proveedor->delete($_REQUEST['IdProvider']);
    $this->view('index');
  }
  
  public function editar() {
    $id=$_REQUEST['IdProvider'];  
    $this->proveedor=new Proveedor();
    $this->proveedor->Id = $id;
    $this->proveedor = $this->proveedor->getWhere();
    $_SESSION["abcProvider"] = "E";
    
    $this->view('update');
  }
  
  public function modificar() {
   
    $id=$_REQUEST['Id'];
    $nit=$_REQUEST['Nit'];
    $nombre=$_REQUEST['Nombre'];
    
    $this->proveedor=new Proveedor();
    $this->proveedor=$this->proveedor->verificarNit($id,$nit);
    
     if(count($this->proveedor)==0){
    $this->proveedor=new Proveedor();
    $this->proveedor->Id = $id;
    $this->proveedor->Nit = $nit;
    $this->proveedor->Nombre = $nombre;
    $this->proveedor=$this->proveedor->save();
    
    
    $this->errLogin = 'Modificado correctamente'; 
     }
     else{
       $this->errLogin2 = 'Ya existe el Nit '.$nit;
     }
      
    $this->proveedor=new Proveedor();
    $this->proveedor->Id = $id;
    $this->proveedor = $this->proveedor->getWhere();
    
    $_SESSION["abcProvider"] = "E";
    
    $this->view('update');
  }
  
  public function crear()
  {

    $nit=$_REQUEST['Nit'];
    $nombre=$_REQUEST['Nombre'];
    
    $this->proveedor=new Proveedor();
    $this->proveedor=$this->proveedor->verificarNitN($nit);
    
     if(count($this->proveedor)==0){
        $this->proveedor=new Proveedor();
        $this->proveedor->Nit = $nit;
        $this->proveedor->Nombre = $nombre;
        $this->proveedor=$this->proveedor->save();
        
        $this->proveedor=new Proveedor();
        $this->proveedor->Nit = $nit;
        $this->proveedor=$this->proveedor->getWhere();
        
        $id=$this->proveedor[0]->Id;
    
    $this->errLogin = 'Proveedor '.$nombre.' creado correctamente'; 
     }
     else{
       $this->errLogin2 = 'Ya existe el Nit '.$nit;
     }
    $_SESSION["abcProvider"] = "N";
    
    $this->view('update');

  }
  
  
  
  
  
  public function reporte()
  {

    $nit=$_REQUEST['Nit'];
    
    $this->proveedor = new Proveedor();
    $this->proveedor=new Proveedor();
    $this->proveedor->Nit = $nit;
    $this->proveedor=$this->proveedor->getWhere();
    
    $this->factura = new Factura();
    $this->factura->Proveedor_Id=$this->proveedor[0]->Id;
    $this->factura=$this->factura->getWhere();
    
    $this->view();

  }
  
  
  
  public function factura()
  {
    $factura=$_REQUEST['Factura'];
  
    $this->factura = new Factura();
    $this->factura->Id=$factura;
    $this->factura=$this->factura->getWhere();
    
    $this->productofactura = new ProductoFactura();
    $this->productofactura->Factura_Id=$factura;
    $this->productofactura = $this->productofactura->getWhere();

    $this->view();

  }
}
?>
