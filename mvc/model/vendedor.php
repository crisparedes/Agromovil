<?php
require_once 'table.class.php';

class Vendedor extends Table {
    public $Id = '';
    public $Nombre = '';
    public $Telefono = '';
    public $Direccion = '';
	public $Usuario_Id = '';
	
    public function __CONSTRUCT() {
		parent::__construct('Vendedor');
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
}
?>
