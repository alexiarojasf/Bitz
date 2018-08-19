<?php
class Categoria extends Validator{
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
	public function getCategorias(){
		$sql = "SELECT * FROM tipo_producto ORDER BY nombre_tipo_prod";
		$params = array(null);
		return Database::getRows($sql, $params);
	}	
	public function getCategoriasID(){
		$sql = "SELECT * FROM tipo_producto WHERE id_tipo_producto = ?";
		$params = array(null);
		return Database::getRows($sql, $params);
	}	
	public function searchCategoria($value){
		$sql = "SELECT * FROM tipo_producto WHERE nombre_tipo_prod  LIKE ?  ORDER BY nombre_tipo_prod";
		$params = array("%$value%");
		return Database::getRows($sql, $params); 
	}
	public function createCategoria(){
		$sql = "INSERT INTO tipo_producto(nombre_tipo_prod) VALUES(?)";
		$params = array($this->nombre);
		return Database::executeRow($sql, $params);
	}
	public function readCategoria(){
		$sql = "SELECT nombre_tipo_prod FROM tipo_producto WHERE id_tipo_producto = ?";
		$params = array($this->id);
		$categoria = Database::getRow($sql, $params);
		if($categoria){
			$this->nombre = $categoria['nombre_tipo_prod'];
			return true;
		}else{
			return null;
		}
	}
	public function updateCategoria(){
		$sql = "UPDATE tipo_producto SET nombre_tipo_prod =? WHERE id_tipo_producto = ?";
		$params = array($this->nombre, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteCategoria(){
		$sql = "DELETE FROM tipo_producto WHERE id_tipo_producto = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>