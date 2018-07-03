<?php
class Producto extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $descripcion = null;
	private $cantidad = null;
	private $precio = null;
	private $imagen = null;
	private $categoria = null;
	private $estado = null;
	private $proveedor = null;
	private $modelo = null;

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
	public function setModelo($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->modelo = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getModelo(){
		return $this->modelo;
	}

	public function setDescripcion($value){
		if($this->validateAlphanumeric($value, 1, 200)){
			$this->descripcion = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getDescripcion(){
		return $this->descripcion;
	}
	public function setCantidad($value){
		if($this->validateAlphanumeric($value, 1, 200)){
			$this->cantidad = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getCantidad(){
		return $this->cantidad;
	}

	public function setPrecio($value){
		if($this->validateAlphanumeric($value,1,50)){
			$this->precio = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getPrecio(){
		return $this->precio;
	}

	public function setImagen($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->imagen = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getImagen(){
		return $this->imagen;
	}
	public function unsetImagen(){
		if(unlink("../../web/img/productos/".$this->imagen)){
			$this->imagen = null;
			return true;
		}else{
			return false;
		}
	}

	public function setCategoria($value){
		if($this->validateId($value)){
			$this->categoria = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getCategoria(){
		return $this->categoria;
	}
	public function setProveedor($value){
		if($this->validateId($value)){
			$this->proveedor = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getProveedor(){
		return $this->proveedor;
	}

	public function setEstado($value){
		if($value == "1" || $value == "2"){
			$this->estado = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getEstado(){
		return $this->estado;
	}

	//Metodos para el manejo del CRUD
	public function getCategoriaProductos(){
		$sql = "SELECT tp.nombre_tipo_prod, p.foto_prod,p.id_producto, p.nombre_prod, p.descripcion_prod, p.precio_prod FROM producto as p INNER JOIN estado_prod as ep ON p.id_estado_prod = ep.id_estado_prod INNER JOIN tipo_producto as tp ON p.tipo_prod = tp.id_tipo_producto WHERE tp.id_tipo_producto = ? AND ep.id_estado_prod = 1";
		$params = array($this->categoria);
		return Database::getRows($sql, $params);
	}
	public function getProductos(){
		$sql = "SELECT p.id_producto,p.nombre_prod,p.descripcion_prod,p.cantidad_prod,p.precio_prod,t.nombre_tipo_prod,prov.nombre_prov , p.modelo_prod ,e.estado FROM producto as p INNER JOIN tipo_producto as t ON p.tipo_prod = t.id_tipo_producto INNER JOIN proveedor as prov ON p.proveedor = prov.id_proveedor INNER JOIN estado_prod as e ON p.id_estado_prod = e.id_estado_prod";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getProductos2(){
		$sql = "SELECT p.id_producto,p.nombre_prod,p.foto_prod,p.descripcion_prod,p.cantidad_prod,p.precio_prod,t.nombre_tipo_prod,prov.nombre_prov , p.modelo_prod ,e.estado FROM producto as p INNER JOIN tipo_producto as t ON p.tipo_prod = t.id_tipo_producto INNER JOIN proveedor as prov ON p.proveedor = prov.id_proveedor INNER JOIN estado_prod as e ON p.id_estado_prod = e.id_estado_prod";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchProducto($value){
		$sql = "SELECT p.id_producto,p.nombre_prod,p.descripcion_prod,p.cantidad_prod,p.precio_prod,t.nombre_tipo_prod,prov.nombre_prov , p.modelo_prod ,e.estado FROM producto as p INNER JOIN tipo_producto as t ON p.tipo_prod = t.id_tipo_producto INNER JOIN proveedor as prov ON p.proveedor = prov.id_proveedor INNER JOIN estado_prod as e ON p.id_estado_prod = e.id_estado_prod WHERE nombre_prod LIKE ? OR descripcion_prod LIKE ? ORDER BY nombre_prod";
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}
	public function getCategorias(){
		$sql = "SELECT id_tipo_producto, nombre_tipo_prod FROM tipo_producto";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getProveedores(){
		$sql = "SELECT id_proveedor, nombre_prov FROM proveedor";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getEstados(){
		$sql = "SELECT id_estado_prod, estado FROM estado_prod";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function createProducto(){
		$sql = "INSERT INTO producto(nombre_prod, descripcion_prod, cantidad_prod, precio_prod, tipo_prod, proveedor, modelo_prod, foto_prod, id_estado_prod) VALUES (?,?,?,?,?,?,?,?,?)";
		$params = array($this->nombre, $this->descripcion,$this->cantidad, $this->precio,$this->categoria,$this->proveedor,$this->modelo, $this->imagen, $this->estado);
		return Database::executeRow($sql, $params);
	}
	public function readProducto(){
		$sql = "SELECT p.id_producto,p.nombre_prod,p.descripcion_prod,p.cantidad_prod,p.precio_prod,t.nombre_tipo_prod,prov.nombre_prov , p.modelo_prod, p.foto_prod,e.estado FROM producto as p INNER JOIN tipo_producto as t ON p.tipo_prod = t.id_tipo_producto INNER JOIN proveedor as prov ON p.proveedor = prov.id_proveedor INNER JOIN estado_prod as e ON p.id_estado_prod = e.id_estado_prod WHERE id_producto = ?";
		$params = array($this->id);
		$producto = Database::getRow($sql, $params);
		if($producto){
			$this->nombre = $producto['nombre_prod'];
			$this->descripcion = $producto['descripcion_prod'];
			$this->precio = $producto['precio_prod'];
			$this->categoria = $producto['nombre_tipo_prod'];
			$this->estado = $producto['estado'];
			$this->cantidad = $producto['cantidad_prod'];
			$this->modelo = $producto['modelo_prod'];
			$this->proveedor = $producto['nombre_prov'];
			$this->imagen = $producto['foto_prod'];
			return true;
		}else{
			return null;
		}
	}
	public function updateProducto(){
		$sql = "UPDATE producto SET nombre_prod=?,descripcion_prod=?,cantidad_prod=?,precio_prod=?,tipo_prod=?,proveedor=?, modelo_prod=?,foto_prod=?,id_estado_prod=? WHERE id_producto = ?";
		$params = array($this->nombre, $this->descripcion,$this->cantidad, $this->precio,$this->categoria,$this->proveedor ,$this->modelo,$this->imagen,$this->estado, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteProducto(){
		$sql = "DELETE FROM producto WHERE id_producto = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
	#CARRITO ALV#
	public function updateExistencias(){
		$sql = "UPDATE producto SET cantidad_prod = ? WHERE id_producto = ?";
		$params = array($this->cantidad, $this->id);
		return Database::executeRow($sql, $params);
		}

		public function readProducto2(){
			$sql = "SELECT * FROM producto WHERE id_producto = ?";
			$params = array($this->id);
			$producto = Database::getRow($sql, $params);
			if($producto){
				$this->nombre = $producto['nombre_prod'];
				$this->descripcion = $producto['descripcion_prod'];
				$this->precio = $producto['precio_prod'];
				$this->cantidad = $producto['cantidad_prod'];
				$this->modelo = $producto['modelo_prod'];
				$this->imagen = $producto['foto_prod'];
				return true;
			}else{
				return null;
			}
		}
}
?>