<?php require_once 'db.php';

class sincronizaDB extends PHPUnit_Framework_TestCase {
  public function test() {
    $this->assertTrue(exec('mysql -u '.USR.' -p'.PWD.' Distribuidora < DistribuidoraDB.sql')=='');
  }
}
?>
