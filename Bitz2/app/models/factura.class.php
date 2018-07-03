<?php
class Factura extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $usuario = null;
    private $fecha = null;
    private $total = null;

	//Métodos para sobrecarga de propiedades
	public function setId($value){
		if($this->validateId($value)){
			$this->id = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getId(){
		return $this->id;
	}
		public function setUsuario($value){
		if($this->validateId($value)){
			$this->usuario = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getUsuario(){
		return $this->usuario;
    }
    public function setEstado($value){
		if($this->validateId($value)){
			$this->estado = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getEstado(){
		return $this->estado;
    }
    public function setFecha($value){
			$this->fecha = $value;
			return true;
		}
	
	public function getFecha(){
		return $this->fecha;
    }
    public function setTotal($value){
		if($this->validateId($value)){
			$this->total = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getTotal(){
		return $this->total;
    }



	//Metodos para el manejo del CRUD
	public function createFactura(){
		$sql = "SELECT id_factura FROM factura WHERE id_estado = 3 AND id_usuario = ?";
		$params = array($this->usuario);
		$factura = Database::getRow($sql, $params);
		if($factura){
			$_SESSION['id_factura'] = $factura['id_factura'];
			return true;
		}else{
			$sql = "INSERT INTO factura(id_usuario, fecha, id_estado) VALUES (?, ?, 3)";
			$fechas = date("Y-m-d");
			$params = array($this->usuario, $fechas);
			if(Database::executeRow($sql, $params)){
				$_SESSION['id_factura'] = Database::getLastRowId();
				return true;
			}else{
				return false;
			}
		}
    }
	public function updateFactura(){
		$sql = "UPDATE factura SET fecha = ?, id_estado = 1 WHERE id_factura = ?";
		$fechaactual = date("Y-m-d");
		$params = array($fechaactual, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function getMaxFactura(){
		$sql = "SELECT MAX(id_factura) as ultimo FROM factura";
		$params = array(null);
		$factura = Database::getRow($sql, $params);
		return $factura['ultimo'];
		}

	public function getMisFacturas(){
		$sql = "SELECT id_factura, fecha, nombre_estado_envio FROM factura INNER JOIN usuario ON usuario.id_usuario = factura.id_usuario INNER JOIN estado_envio ON estado_envio.id_estado_envio = factura.id_estado WHERE usuario.id_usuario = ?";
		$params = array($_SESSION['id_usuario']);
		return Database::getRows($sql, $params);
	}

	public function getDetalleFactura(){
		$sql = "SELECT id_factura, concat_ws(',', nombre_usu, apellido_usu) as cliente, nombre_prod, precio_prod, cantidad_producto,(precio_prod * cantidad_producto) as subtotal FROM detalle_venta INNER JOIN factura USING(id_factura)INNER JOIN producto USING(id_producto) INNER JOIN usuario USING(id_usuario)WHERE factura.id_factura = ?";
		$params = array($this->id);
		return Database::getRows($sql, $params);
	}
	public function readUsuario(){
		$sql = "SELECT id_factura, concat_ws(',', nombre_usu, apellido_usu) as cliente FROM factura INNER JOIN usuario USING(id_usuario) WHERE id_factura = ?";
		$params = array($this->id);
		$usuario = Database::getRow($sql, $params);
		if($usuario){
			$this->usuario = $usuario['cliente'];
			return true;
		}else{
			return null;
		}
	}
}
?>