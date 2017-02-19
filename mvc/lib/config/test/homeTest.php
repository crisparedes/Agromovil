<?php require_once __DIR__ . '/../../../controller/home.controller.php';

class homeTest extends PHPUnit_Framework_TestCase {
  public function testLogin() {
    $controller = new HomeController();
    $this->assertTrue($controller->ValidaUsuario('test@mail.com','12345'));
  }
}
?>
