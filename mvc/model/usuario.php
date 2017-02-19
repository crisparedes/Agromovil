<?php
require_once 'table.class.php';

class Usuario extends Table {
    public $Id = '';
    public $Email = '';
    public $Password = '';
    public $Tipo = '';

    public function __CONSTRUCT() {
		parent::__construct('Usuario');
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
	public function verificarCorreo($Id,$Correo) {
		return $this->queryEspecial("Select * from Usuario where Id!=$Id and Email='$Correo'");
	}
	
	public function verificarCorreoN($Correo) {
		return $this->queryEspecial("Select * from Usuario where Email='$Correo'");
	}
}
?>
