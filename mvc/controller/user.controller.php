<?php 
require_once 'controller.class.php';
require_once __DIR__ . '/../model/usuario.php';
require_once __DIR__ . '/../model/vendedor.php';
require_once __DIR__ . '/../model/bodeguero.php';

class UserController extends Controller {
  public $usuario;
  public $vendedor;
  public $bodeguero;
  public $errLogin = '';
  public $errLogin2 = '';
  
  public function __CONSTRUCT($action='index') {
    parent::__construct('user',$action);
    $this->usuario = new Usuario();
    $this->bodeguero = new Bodeguero();
    $this->vendedor = new Vendedor();
  }

  public function index() {
    $this->view();
  }
  
  public function update() {
    $this->usuario= new Usuario();
    $_SESSION["abcUser"] = "N";
    $this->view();
  }
  
  
  public function eliminar() {
    
    $usr=new Usuario();
    $usr->delete($_REQUEST['IdUsuario']);
    $this->view('index');
  }
  
  public function editar() {
    $id=$_REQUEST['IdUsuario'];  
    $usr=new Usuario();
    $this->usuario->Id = $id;
    $this->usuario = $this->usuario->getWhere();
    $_SESSION["abcUser"] = "E";
    
    if($this->usuario[0]->Tipo == "V"){
      
      $this->vendedor->Usuario_Id = $id;
      $this->vendedor = $this->vendedor->getWhere();

    }else if($this->usuario[0]->Tipo == "B"){
      
      $this->bodeguero->Usuario_Id = $id;
      $this->bodeguero = $this->bodeguero->getWhere();
    }
    
    $this->view('update');
  }
  
  
  public function modificar() {
    $id=$_REQUEST['Id'];
    $email=$_REQUEST['Email'];
    $tipo=$_REQUEST['tipoUsuario'];
    
    $this->usuario=new Usuario();
    $this->usuario=$this->usuario->verificarCorreo($id,$email);
    
     if(count($this->usuario)==0){
    $this->usuario=new Usuario();
    $this->usuario->Id = $id;
    $this->usuario->Email = $email;
    $this->usuario->Password = $_REQUEST['Password'];
    $this->usuario->Tipo = $tipo;
    $this->usuario=$this->usuario->save();
    
    if($tipo=="V")
    {
      
    $this->vendedor=new Vendedor();
    $this->vendedor->Usuario_Id=$id;
    $this->vendedor = $this->vendedor->getWhere();
    
    $idVendedor=$this->vendedor[0]->Id;
    
    $this->vendedor=new Vendedor();
    $this->vendedor->Id=$idVendedor;
    $this->vendedor->Direccion=$_REQUEST['Direccion'];
    $this->vendedor->Telefono=$_REQUEST['Telefono'];
    $this->vendedor->Nombre=$_REQUEST['Nombre'];
    $this->vendedor->Usuario_Id=$id;
    $this->vendedor=$this->vendedor->save();
    
    }elseif ($tipo=="B")
    {
     
    $this->bodeguero=new Bodeguero();
    $this->bodeguero->Usuario_Id=$id;
    $this->bodeguero = $this->bodeguero->getWhere();
    
    $idBodeguero=$this->bodeguero[0]->Id;
    
    $this->bodeguero=new Bodeguero();
    $this->bodeguero->Id=$idBodeguero;
    $this->bodeguero->Direccion=$_REQUEST['Direccion'];
    $this->bodeguero->Telefono=$_REQUEST['Telefono'];
    $this->bodeguero->Nombre=$_REQUEST['Nombre'];
    $this->bodeguero->Usuario_Id=$id;
    $this->bodeguero=$this->bodeguero->save();
      
    }
    $this->errLogin = 'Modificado correctamente'; 
     }
     else{
       $this->errLogin2 = 'Ya existe el correo '.$email;
     }
      
    $this->usuario=new Usuario();
    $this->usuario->Id = $id;
    $this->usuario = $this->usuario->getWhere();
    
    $_SESSION["abcUser"] = "E";
    
    if($this->usuario[0]->Tipo == "V"){
      
      $this->vendedor=new Vendedor();
      $this->vendedor->Usuario_Id = $this->usuario->Id;
      $this->vendedor = $this->vendedor->getWhere();

    }else if($this->usuario[0]->Tipo == "B"){
      
      $this->bodeguero=new Bodeguero();
      $this->bodeguero->Usuario_Id = $this->usuario->Id;
      $this->bodeguero = $this->bodeguero->getWhere();
    }
      
    $this->view('update');
    
  }
  
  public function crear()
  {

    $email=$_REQUEST['Email'];
    $tipo=$_REQUEST['tipoUsuario'];
    
    $this->usuario=new Usuario();
    $this->usuario=$this->usuario->verificarCorreoN($email);
    
     if(count($this->usuario)==0){
        $this->usuario=new Usuario();
        $this->usuario->Email = $email;
        $this->usuario->Password = $_REQUEST['Password'];
        $this->usuario->Tipo = $tipo;
        $this->usuario=$this->usuario->save();
        
        $this->usuario=new Usuario();
        $this->usuario->Email = $email;
        $this->usuario=$this->usuario->getWhere();
        
        $id=$this->usuario[0]->Id;
    
    if($tipo=="V")
    {
    $this->vendedor=new Vendedor();
    $this->vendedor->Direccion=$_REQUEST['Direccion'];
    $this->vendedor->Telefono=$_REQUEST['Telefono'];
    $this->vendedor->Nombre=$_REQUEST['Nombre'];
    $this->vendedor->Usuario_Id=$id;
    $this->vendedor=$this->vendedor->save();
    
    }elseif ($tipo=="B")
    {

    $this->bodeguero=new Bodeguero();
    $this->bodeguero->Direccion=$_REQUEST['Direccion'];
    $this->bodeguero->Telefono=$_REQUEST['Telefono'];
    $this->bodeguero->Nombre=$_REQUEST['Nombre'];
    $this->bodeguero->Usuario_Id=$id;
    $this->bodeguero=$this->bodeguero->save();
      
    }
    $this->errLogin = 'Usuario '.$email.' creado correctamente'; 
     }
     else{
       $this->errLogin2 = 'Ya existe el correo '.$email;
     }
    $_SESSION["abcUser"] = "N";
    
    $this->view('update');









  }
}
?>
