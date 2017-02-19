<?php
require_once 'table.class.php';

class Factura extends Table {
    public $Id = '';
    public $Numero = '';
    public $Fecha = '';
    public $Total = '';
	public $Proveedor_Id = '';
	public $Bodeguero_Id = '';
	
    public function __CONSTRUCT() {
		parent::__construct('Factura');
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

	public function verificarNumero($Numero) {
		return $this->queryEspecial("Select * from Factura where Numero=$Numero");
	}
}
?>
