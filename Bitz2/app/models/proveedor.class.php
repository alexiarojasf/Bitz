<?php
class Proveedor extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	

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
	
	public function setNombre($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->nombre = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getNombre(){
		return $this->nombre;
	}


	//Metodos para el manejo del CRUD
	public function getProveedores(){
		$sql = "SELECT * FROM proveedor ORDER BY nombre_prov";
		$params = array(null);
		return Database::getRows($sql, $params);
	}	
	public function getProveedorID(){
		$sql = "SELECT * FROM proveedor WHERE id_proveedor = ?";
		$params = array(null);
		return Database::getRows($sql, $params);
	}	
	public function searchProveedores($value){
		$sql = "SELECT * FROM proveedor WHERE nombre_prov  LIKE ?  ORDER BY nombre_prov";
		$params = array("%$value%");
		return Database::getRows($sql, $params); 
	}
	public function createProveedor(){
		$sql = "INSERT INTO proveedor(nombre_prov) VALUES(?)";
		$params = array($this->nombre);
		return Database::executeRow($sql, $params);
	}
	public function readProveedor(){
		$sql = "SELECT nombre_prov FROM proveedor WHERE id_proveedor = ?";
		$params = array($this->id);
		$proveedor = Database::getRow($sql, $params);
		if($proveedor){
			$this->nombre = $proveedor['nombre_prov'];
			return true;
		}else{
			return null;
		}
	}
	public function updateProveedor(){
		$sql = "UPDATE proveedor SET nombre_prov =? WHERE id_proveedor = ?";
		$params = array($this->nombre, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteProveedor(){
		$sql = "DELETE FROM proveedor WHERE id_proveedor = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>