<?php
require_once 'controller.class.php';
require_once __DIR__ . '/../model/usuario.php';

class HomeController extends Controller {
  public $errLogin = '';
  public $tipoUsuario = '';
  public $idUsuario = '';

  public function __CONSTRUCT($action='index') {
    parent::__construct('home',$action);
  }

  public function index() {
    $this->view();
  }
  
  public function login() {
    $view = '';

    if (isset($_REQUEST['Email'])) {
      $usr = $_REQUEST['Email'];
      $pwd = isset($_REQUEST['Password']) ? $_REQUEST['Password'] : '';

      if ($this->validaUsuario($usr,$pwd)) {
        $_SESSION["Email"] = $usr;
        $view = 'index';
      } else {
        $this->errLogin = 'Usuario incorrecto.';
      }
    }

    $this->view($view);
  }

  public function validaUsuario($usr,$pwd) {
    if (trim($usr) == '' || trim($pwd) == '') {
      return false;
    }

    $usuario = new Usuario();
    $usuario->Email = $usr;
    $usuario->Password = $pwd;
    $usuario = $usuario->getWhere();
    
    $_SESSION["tipoUsuario"] = $usuario[0]->Tipo;
    $_SESSION["idUsuario"] = $usuario[0]->Id;

    return count($usuario)==1;    
  }

  public function logout() {
    session_destroy();
    $this->view('login');
  }
}
?>
