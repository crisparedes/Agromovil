<?php 
require_once 'controller.class.php';
require_once __DIR__ . '/../model/cliente.php';

class ClientController extends Controller {
  public $cliente;
  public $errLogin = '';
  public $errLogin2 = '';
  
  public function __CONSTRUCT($action='index') {
    parent::__construct('client',$action);
    $this->cliente = new Cliente();
  }

  public function index() {
    $this->view();
  }
  
  public function update() {
    $this->cliente= new Cliente();
    $_SESSION["abcClient"] = "N";
    $this->view();
  }
  
  
  public function eliminar() {
    
    $this->cliente=new Cliente();
    $this->cliente->delete($_REQUEST['IdClient']);
    $this->view('index');
  }
  
  public function editar() {
    $id=$_REQUEST['IdClient'];  
    $this->cliente=new Cliente();
    $this->cliente->Id = $id;
    $this->cliente = $this->cliente->getWhere();
    $_SESSION["abcClient"] = "E";
    
    $this->view('update');
  }
  
  
  public function modificar() {
   
    $id=$_REQUEST['Id'];
    $nit=$_REQUEST['Nit'];
    $nombre=$_REQUEST['Nombre'];
    $telefono=$_REQUEST['Telefono'];
    $direccion=$_REQUEST['Direccion'];
    
    $this->cliente=new Cliente();
    $this->cliente=$this->cliente->verificarNit($id,$nit);
    
     if(count($this->cliente)==0){
    $this->cliente=new Cliente();
    $this->cliente->Id = $id;
    $this->cliente->Nit = $nit;
    $this->cliente->Nombre = $nombre;
    $this->cliente->Telefono = $telefono;
    $this->cliente->Direccion = $direccion;
    $this->cliente=$this->cliente->save();
    
    
    $this->errLogin = 'Modificado correctamente'; 
     }
     else{
       $this->errLogin2 = 'Ya existe el Nit '.$nit;
     }
      
    $this->cliente=new Cliente();
    $this->cliente->Id = $id;
    $this->cliente = $this->cliente->getWhere();
    
    $_SESSION["abcClient"] = "E";
    
    $this->view('update');
  }
  
  public function crear()
  {

    $id=$_REQUEST['Id'];
    $nit=$_REQUEST['Nit'];
    $nombre=$_REQUEST['Nombre'];
    $telefono=$_REQUEST['Telefono'];
    $direccion=$_REQUEST['Direccion'];
    
    $this->cliente=new Cliente();
    $this->cliente=$this->cliente->verificarNitN($nit);
    
     if(count($this->cliente)==0){
        
        $this->cliente=new Cliente();
        $this->cliente->Id = $id;
        $this->cliente->Nit = $nit;
        $this->cliente->Nombre = $nombre;
        $this->cliente->Telefono = $telefono;
        $this->cliente->Direccion = $direccion;
        $this->cliente=$this->cliente->save();
        
        $this->cliente=new Cliente();
        $this->cliente->Nit = $nit;
        $this->cliente=$this->cliente->getWhere();
        
        $id=$this->cliente[0]->Id;
    
    $this->errLogin = 'cliente '.$nombre.' creado correctamente'; 
     }
     else{
       $this->errLogin2 = 'Ya existe el Nit '.$nit;
     }
    $_SESSION["abcClient"] = "N";
    
    $this->view('update');

  }
}
?>
