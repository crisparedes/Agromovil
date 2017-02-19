<?php
require_once 'table.class.php';

class Proveedor extends Table {
    public $Id = '';
    public $Nit = '';
    public $Nombre = '';


    public function __CONSTRUCT() {
		parent::__construct('Proveedor');
	}

	public function clear() {
		$row = get_object_vars($this);

		foreach($row as $key => $value)	{
			$this->$key = '';
		}
	}

	public function save() {
		if ($this->Id == '') {
			$this->createRow(get_object_vars($this));
		} else {
			$this->updateRow(get_object_vars($this));
		}
	}

	public function getWhere() {
		return $this->getRowsWhere(get_object_vars($this));
	}
	
	//funcion especial
	public function verificarNit($Id,$Nit) {
		return $this->queryEspecial("Select * from Proveedor where Id!=$Id and Nit='$Nit'");
	}
	
	public function verificarNitN($Nit) {
		return $this->queryEspecial("Select * from Proveedor where Nit='$Nit'");
	}
}
?>
