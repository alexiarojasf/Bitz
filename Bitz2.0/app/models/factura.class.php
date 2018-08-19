<?php
class Factura extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $idProducto = null;
	private $usuario = null;
    private $fecha = null;
	private $total = null;
	private $proveedor = null;

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
	public function setIdProducto($value){
		if($this->validateId($value)){
			$this->idProducto = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getIdProducto(){
		return $this->idProducto;
	}
	public function setIdProv($value){
		if($this->validateId($value)){
			$this->proveedor = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getIdProv(){
		return $this->proveedor;
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
	public function getProductos(){
		$sql = "SELECT p.nombre_prod,p.modelo_prod,p.precio_prod,p.cantidad_prod,pr.nombre_prov FROM producto as p INNER JOIN proveedor as pr ON p.proveedor = pr.id_proveedor";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getCategorias(){
		$sql = "SELECT p.nombre_prod,tp.nombre_tipo_prod,p.precio_prod,p.modelo_prod FROM producto as p INNER JOIN tipo_producto as tp ON p.tipo_prod = tp.id_tipo_producto";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
		public function getProveedor(){
		$sql = "SELECT id_proveedor,nombre_prov,direccion_prov,telefono_prov,correo_prov FROM proveedor";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	//Primera graf
		public function getProductosStat(){
		$sql = "SELECT nombre_prod,cantidad_prod FROM producto WHERE id_estado_prod = 1 AND cantidad_prod > 50  ORDER BY nombre_prod limit 5";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	
		public function getCantidadVentas($value)
		{
			$sql = "SELECT p.nombre_prod,SUM(dt.cantidad_producto)as cantidad_producto FROM detalle_venta as dt INNER JOIN producto as p ON p.id_producto = dt.id_producto WHERE dt.id_producto = ?";
			$params = array($value);
			return Database::getRows($sql, $params);
		}
		public function getIdProductos()
		{
			$sql = "SELECT dt.id_producto FROM detalle_venta as dt INNER JOIN producto as p ON p.id_producto = dt.id_producto  GROUP BY dt.id_producto";
			$params = array(null);
			return Database::getRows($sql, $params);
		}
		//
		//Segunda graf
		public function getCantidadCat($value)
		{
			$sql = "SELECT Count(tipo_prod) as numeros FROM producto WHERE tipo_prod = ?";
			$params = array($value);
			return Database::getRows($sql, $params);
		}
		public function getNombresCat($value)
		{
			$sql = "SELECT DISTINCT(tp.nombre_tipo_prod) FROM producto as p INNER JOIN tipo_producto as tp ON p.tipo_prod = tp.id_tipo_producto WHERE p.tipo_prod = ? AND p.id_estado_prod = 1";
			$params = array($value);
			return Database::getRows($sql, $params);
		}
		public function getIdCategorias()
		{
			$sql = "SELECT DISTINCT(tipo_prod) FROM producto WHERE id_estado_prod = 1";
			$params = array(null);
			return Database::getRows($sql,$params);
		}
		//
		//Tercer Grafico
		public function getIdTipos()
		{
			$sql = "SELECT DISTINCT(tipo_usu) FROM usuario";
			$params = array(null);
			return Database::getRows($sql,$params);
		}
		public function getIdUsuarios()
		{
			$sql = "SELECT id_usuario FROM usuario";
			$params = array(null);
			return Database::getRows($sql,$params);
		}
		public function getUsuarios($value)
		{
			$sql = "SELECT COUNT(id_usuario) as cantidad FROM usuario WHERE tipo_usu = ?";
			$params = array($value);
			return Database::getRows($sql,$params);
		}
		public function getNombresTipo()
		{
			$sql = "SELECT DISTINCT(tu.nombre_tipo_usu),u.tipo_usu FROM usuario as u INNER JOIN tipo_usuario as tu ON u.tipo_usu = tu.id_tipo_usu";
			$params = array(null);
			return Database::getRows($sql, $params);
		}

		//
		//Cuarto graf

		public function getIdProvs()
		{
			$sql = "SELECT DISTINCT(proveedor) FROM producto";
			$params = array(null);
			return Database::getRows($sql,$params);
		}

		public function getProductosProv($value)
		{
			$sql = "SELECT COUNT(id_producto) as cantidad FROM producto WHERE proveedor = ?";
			$params = array($value);
			return Database::getRows($sql,$params);
		}
		public function getNombresProvs()
		{
			$sql = "SELECT DISTINCT(pr.nombre_prov) FROM producto as p INNER JOIN proveedor as pr ON p.proveedor = pr.id_proveedor";
			$params = array(null);
			return Database::getRows($sql, $params);
		}

		//
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