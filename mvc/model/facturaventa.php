<?php
require_once 'table.class.php';

class FacturaVenta extends Table {
    public $Id = '';
    public $Numero = '';
    public $Fecha = '';
    public $Total = '';
	public $Cliente_Id = '';
	
    public function __CONSTRUCT() {
		parent::__construct('FacturaVenta');
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
		return $this->queryEspecial("Select * from FacturaVenta where Numero=$Numero");
	}
}
?>
