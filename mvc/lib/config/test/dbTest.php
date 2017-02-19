<?php require_once __DIR__ . '/../../../model/table.class.php';

class dbTest extends PHPUnit_Framework_TestCase {
  public function test() {
    $usurio = new Table('Usuarios');
    $this->assertTrue($usurio->count()>=0);
  }
}
?>
