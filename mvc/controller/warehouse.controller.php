<?php
require_once 'controller.class.php';
require_once __DIR__ . '/../model/producto.php';
require_once __DIR__ . '/../model/factura.php';
require_once __DIR__ . '/../model/productofactura.php';
require_once __DIR__ . '/../model/bodeguero.php';
require_once __DIR__ . '/../model/proveedor.php';

class WarehouseController extends Controller {
  public $errLogin = '';
  public $errLogin2 = '';
  public $bodeguero;
  public $proveedor;
  public $producto;
  public $factura;
  public $productofactura;
  public function __CONSTRUCT($action='index') {
    parent::__construct('warehouse',$action);
    $this->proveedor=new Proveedor();
    $this->producto= new Producto();
  }

  public function index() {
    
    $this->bodeguero=new Bodeguero();
    $this->bodeguero->Usuario_Id=$_SESSION["idUsuario"];
    $this->bodeguero=$this->bodeguero->getWhere();
    $this->view();
  }
  
  
  public function compra() {
    $numeroFactura=$_REQUEST['factura'];
    $fecha=$_REQUEST['fecha'];
    $idProveedor=$_REQUEST['proveedor'];
    
    
    $this->bodeguero=new Bodeguero();
    $this->bodeguero->Usuario_Id=$_SESSION["idUsuario"];
    $this->bodeguero=$this->bodeguero->getWhere();
    $idBodeguero=$this->bodeguero[0]->Id;
    
    $this->factura=new Factura();
    $this->factura=$this->factura->VerificarNumero($numeroFactura);
    
    if(count($this->factura)==0){
    $this->factura=new Factura();
    $this->factura->Numero = $numeroFactura;
    $this->factura->Fecha = $fecha;
    $this->factura->Total = '0';
    $this->factura->Bodeguero_Id = $idBodeguero;
    $this->factura->Proveedor_Id=$idProveedor;
    $this->factura=$this->factura->save();
    
    $this->factura=new Factura();
    $this->factura->Numero = $numeroFactura;
    $this->factura=$this->factura->getWhere();
    
    $idFactura=$this->factura[0]->Id;
    
    $total=0;
    foreach($this->producto->getList() as $r):
    
    $cantidad=$_REQUEST['cantidad'.$r->Id];
    $precio=$_REQUEST['precio'.$r->Id];
    
  
    
    if ($cantidad > 0 && $precio>0) {
    
      $this->productofactura=new ProductoFactura();
      $this->productofactura->Producto_Id=$r->Id;
      $this->productofactura->Factura_Id=$idFactura;
      $this->productofactura->Cantidad=$cantidad;
      $this->productofactura->PrecioUnitarioCompra=$precio;
      $this->productofactura=$this->productofactura->save();
    
      
      $disponible=$r->Cantidad+$cantidad;
      
      $producto2=new Producto();
      $producto2->Id=$r->Id;
      $producto2->Cantidad=$disponible;
      $producto2=$producto2->save();
      
      $total=$total+($precio*$cantidad);
    }    
    endforeach;
    
    $this->factura=new Factura();
    $this->factura->Id = $idFactura;
    $this->factura->Total = $total;
    $this->factura=$this->factura->save();

    $this->factura=new Factura();
    $this->factura->Id = $idFactura;
    $this->factura=$this->factura->getWhere();
    $this->view();
      
    }
     else{
       $this->errLogin2 = 'Ya existe el numero de factura '.$numeroFactura;
     $this->view('index');
     }  
    

    
  }
  

}
?>
