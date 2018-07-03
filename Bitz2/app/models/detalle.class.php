<?php
class Detalle extends Validator{
    //Declaración de propiedades
	private $id = null;
    private $factura = null;
    private $producto = null;
    private $cantidad = null;
    private $total = null;
	private $existencias = null;
	private $productoId = null;
	private $precio = null;
	private $subtotal = null;

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

    public function setFactura($value){
		if($this->validateId($value)){
			$this->factura = $value;
			return true;
		}else{
			return false;
		}
    }
    public function getFactura(){
		return $this->factura;
    }

    public function setProducto($value){
		if($this->validateId($value)){
			$this->producto = $value;
			return true;
		}else{
			return false;
		}
    }
    public function getProducto(){
		return $this->producto;
    }

    public function setCantidad($value){
		if($this->validateId($value)){
			$this->cantidad = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getCantidad(){
		return $this->cantidad;
    }

    public function setTotal($value){
		if($this->validateMoney($value)){
			$this->total = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getTotal(){
		return $this->total;
    }

		
		public function setProductoId($value){
			if($this->validateId($value)){
				$this->productoId = $value;
				return true;
			}else{
				return false;
			}
			}
			public function getProductoId(){
			return $this->productoId;
			}

			public function setPrecio($value){
				if($this->validateMoney($value)){
					$this->precio = $value;
					return true;
				}else{
					return false;
				}
				}
				public function getPrecio(){
				return $this->precio;
				}

				public function setSubtotal($value){
					if($this->validateMoney($value)){
						$this->subtotal = $value;
						return true;
					}else{
						return false;
					}
					}
					public function getSubtotal(){
					return $this->subtotal;
					}
	


    //Metodos para manejar el CRUD
    public function createDetalle(){
		$sql = "INSERT INTO detalle_venta(id_factura, id_producto, cantidad_producto) VALUES (?, ?, ?)";
		$params = array($this->factura, $this->producto, $this->cantidad);
		return Database::executeRow($sql, $params);
    }

    public function getCarrito(){
		$sql = "SELECT dv.id_detalle,p.nombre_prod, p.precio_prod, dv.cantidad_producto,p.cantidad_prod, (p.precio_prod * dv.cantidad_producto) as subtotal FROM detalle_venta dv, factura f, usuario u, producto p WHERE f.id_usuario = ? AND f.id_factura = dv.id_factura AND p.id_producto = dv.id_producto AND f.id_usuario = u.id_usuario AND f.id_estado = 3 ORDER BY p.nombre_prod";
		$params = array($_SESSION['id_usuario']);
		return Database::getRows($sql, $params);
    }

    public function updateCantidadLlevar(){
		$sql = "UPDATE detalle_venta SET cantidad_producto = ? WHERE id_detalle = ?";
		$params = array($this->cantidad, $this->id);
		return Database::executeRow($sql, $params);
    }

    public function deleteDetalle(){
		$sql = "DELETE FROM detalle_venta WHERE id_detalle = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
		}

		public function getPrecios(){
			$sql = "SELECT precio_prod FROM producto WHERE id_producto = ?";
			$params = array($this->productoId);
			return Database::getRow($sql, $params);
			}

		public function getTotalF(){
			$sql = "SELECT f.id_factura, SUM(p.precio_prod * dv.cantidad_producto) AS total FROM factura f, producto p, detalle_venta dv WHERE dv.id_factura = f.id_factura and dv.id_producto = p.id_producto and f.id_factura = ?";
			$params = array($this->factura);
			return Database::getRow($sql, $params);
			}
			
	public function getDetalleFactura(){
		$sql = "SELECT id_producto, nombre_prod, precio_prod, cantidad_producto, (precio_prod * cantidad_producto) as subtotal FROM detalle_venta INNER JOIN producto USING(id_producto) WHERE id_factura = ?";
		$params = array($this->id);
		$detalle = Database::getRows($sql, $params);
		if($detalle){
			$this->id = $detalle['id_producto'];
			$this->producto = $detalle['descripcion_prod'];
			$this->precio = $detalle['precio_prod'];
			$this->cantidad = $detalle['cantidad_producto'];
			$this->subtotal = $detalle['subtotal'];
			return true;
		}else{
			return null;
		}
	}
}
?>