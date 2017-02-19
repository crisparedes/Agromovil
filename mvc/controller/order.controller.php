<?php
require_once 'controller.class.php';
require_once __DIR__ . '/../model/vendedor.php';
require_once __DIR__ . '/../model/producto.php';
require_once __DIR__ . '/../model/pedido.php';
require_once __DIR__ . '/../model/productopedido.php';
require_once __DIR__ . '/../model/cliente.php';
require_once __DIR__ . '/../model/facturaventa.php';



class OrderController extends Controller {
  public $errLogin = '';
  public $errLogin2 = '';
  public $vendedor;
  public $producto;
  public $pedido;
  public $productopedido;
  public $cliente;
  public $facturaventa;
  public $totalFacturaVenta;
  public $pedidoCliente;
  public function __CONSTRUCT($action='index') {
    parent::__construct('order',$action);
    $this->producto= new Producto();
  }

  public function index() {
    

    $this->view();
  }
  
  
  public function pedido() {
    $fecha=$_REQUEST['fecha'];
    
    $this->vendedor=new Vendedor();
    $this->vendedor->Usuario_Id=$_SESSION["idUsuario"];
    $this->vendedor=$this->vendedor->getWhere();
    
    $this->pedido= new Pedido();
    $this->pedido->FechaPedido=$fecha;
    $this->pedido->Estado='0';
    $this->pedido->Vendedor_Id=$this->vendedor[0]->Id;
    $this->pedido=$this->pedido->save();
    
    $this->pedido= new Pedido();
    $idPedido=$this->pedido->ultimoPedido()[0]->maximo;


   foreach($this->producto->getList() as $r):
    
    $cantidad=$_REQUEST['cantidad'.$r->Id];
   
    if ($cantidad > 0) {
    
      $this->productopedido=new ProductoPedido();
      $this->productopedido->Producto_Id=$r->Id;
      $this->productopedido->Pedido_Id= $idPedido;
      $this->productopedido->Cantidad=$cantidad;
      $this->productopedido=$this->productopedido->save();
    }    
    endforeach;
    
    
    $this->errLogin = 'Pedido enviado a bodega para ser preparado';  
    $this->view("index");
   
  }
  


  public function autorizar() {
    $this->pedido= new Pedido();
    $this->view();
  }
  
  
  public function verificar() {
    
      $IdPedido=$_REQUEST['IdPedido']; 
      $this->productopedido= new ProductoPedido();
      $this->productopedido->Pedido_Id=$IdPedido;
      $this->productopedido=$this->productopedido->getWhere();
      
    $this->view();
  }
  
   public function validar() {
    
      $IdPedido=$_REQUEST['IdPedido']; 
      $this->productopedido= new ProductoPedido();
      $this->productopedido->Pedido_Id=$IdPedido;
      $this->productopedido=$this->productopedido->getWhere();
      
      
      $validar=0;
      
      foreach($this->productopedido as $r):
      
      $this->producto= new Producto();
      $this->producto->Id=$r->Producto_Id;
      $this->producto=$this->producto->getWhere();
      
      if((int)$this->producto[0]->Cantidad <= (int)$r->Cantidad ):
        $validar=$validar+1;
      endif;
      
      endforeach; 
  
      if($validar==0)
      {
        
        
      foreach($this->productopedido as $r):
      
      $this->producto= new Producto();
      $this->producto->Id=$r->Producto_Id;
      $this->producto=$this->producto->getWhere();
      
      $cant= $this->producto[0]->Cantidad;
      
      $this->producto= new Producto();
      $this->producto->Id=$r->Producto_Id;
      $this->producto->Cantidad=$cant-$r->Cantidad;
      $this->producto=$this->producto->save();
      
      endforeach;
      
      $this->pedido= new Pedido();
      $this->pedido->Id=$IdPedido;
      $this->pedido->Estado=1;
      $this->pedido=$this->pedido->Save();
      
      
         $_SESSION["resultado"]='C';
      
      }else
      {
          $_SESSION["resultado"]='I';
      }
 
      $this->view('resultado');
      
  }
  

public function entregar()
{
      $this->pedido= new Pedido;
      
    $this->vendedor=new Vendedor();
    $this->vendedor->Usuario_Id=$_SESSION["idUsuario"];
    $this->vendedor=$this->vendedor->getWhere();
      
  $this->view();
}


public function facturar()
{
  
   $IdPedido=$_REQUEST['IdPedido']; 
  
  
    $this->productopedido= new ProductoPedido();
    $this->productopedido->Pedido_Id=$IdPedido;
    $this->productopedido=$this->productopedido->getWhere();
      
    foreach($this->productopedido as $r):
      
    $this->producto= new Producto();
    $this->producto->Id=$r->Producto_Id;
    $this->producto=$this->producto->getWhere();
    
    
    $this->totalFacturaVenta=$this->totalFacturaVenta+($r->Cantidad*$this->producto[0]->PrecioUnitario);  
        
    endforeach;   
  $this->pedidoCliente=$IdPedido;
  $this->cliente= new Cliente();
  $this->view();
}

public function venta()
{
 $factura=$_REQUEST['factura']; 
 $cliente=$_REQUEST['cliente']; 
 $fecha=$_REQUEST['fecha']; 
 $total=$_REQUEST['total']; 
 $pedido=$_REQUEST['pedido']; 
 
 $this->facturaventa=new FacturaVenta();
 $this->facturaventa=$this->facturaventa->VerificarNumero($factura);
    
    if(count($this->facturaventa)==0)
    {
      

      $this->facturaventa=new FacturaVenta();
      $this->facturaventa->Numero=$factura;
      $this->facturaventa->Total=$total;
      $this->facturaventa->Cliente_Id=$cliente;
      $this->facturaventa->Fecha=$fecha;
      $this->facturaventa=$this->facturaventa->Save();
      
      $this->pedido=new Pedido();
      $this->pedido->Id=$pedido;
      $this->pedido->Estado=2;
      $this->pedido=$this->pedido->Save();


      $this->facturaventa=new FacturaVenta();
      $this->facturaventa->Numero=$factura;
      $this->facturaventa=$this->facturaventa->getWhere();
      
      $_SESSION["resultado"]='C';
    }
    else
    {
      
         $_SESSION["resultado"]='I';
    }

   $this->view('venta');
}




}
?>
