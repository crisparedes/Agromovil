<?php
require_once 'table.class.php';

class Pedido extends Table {
    public $Id = '';
    public $Estado = '';
    public $FechaPedido = '';
	public $Vendedor_Id = '';
	
    public function __CONSTRUCT() {
		parent::__construct('Pedido');
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

	public function ultimoPedido() {
		return $this->queryEspecial("Select max(Id) as maximo from Pedido");
	}
}
?>
