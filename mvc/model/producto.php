<?php
require_once 'table.class.php';

class Producto extends Table {
    public $Id = '';
    public $Descripcion = '';
    public $Cantidad = '';
    public $PrecioUnitario = '';

    public function __CONSTRUCT() {
		parent::__construct('Producto');
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
   	public function verificarNombre($Id,$Descripcion) {
		return $this->queryEspecial("Select * from Producto where Id!=$Id and Descripcion='$Descripcion'");
	}
	
	public function verificarNombreN($Descripcion) {
		return $this->queryEspecial("Select * from Producto where Descripcion='$Descripcion'");
	}
}
?>
