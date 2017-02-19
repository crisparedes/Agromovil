<?php
require_once 'table.class.php';

class ProductoPedido extends Table {
    public $Producto_Id = '';
    public $Pedido_Id = '';
    public $FacturaVenta_Id = '';
    public $Cantidad = '';

    public function __CONSTRUCT() {
		parent::__construct('ProductoPedido');
	}

	public function clear() {
		$row = get_object_vars($this);

		foreach($row as $key => $value)	{
			$this->$key = '';
		}
	}

	public function save() {
		//if ($this->Id == '') {
			$this->createRow(get_object_vars($this));
		//} else {
		//	$this->updateRow(get_object_vars($this));
		//}
	}

	public function getWhere() {
		return $this->getRowsWhere(get_object_vars($this));
	}
	
	public function actualizarFactura($pedido,$factura) {
		return $this->queryEspecial("update ProductoPedido set FacturaVenta_Id=$factura 
		where Pedido_Id=$pedido");
	}
	
}
?>
