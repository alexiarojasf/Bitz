<?php
class Usuario extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombres = null;
	private $apellidos = null;
	private $correo = null;
	private $alias = null;
	private $clave = null;
	private $telefono = null;
	private $foto = null;
	private $direccion = null;
	private $fecha = null;
    private $tipousu = null;
    private $estado = null;
    private $factura = null;
	private $fechadehoy = null;
	private $fechacuenta = null;
	private $sesion = null;
	

	public function setFechaHoy($value){
		if($value){
			$this->fechadehoy = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getFechaHoy(){
		return $this->fechadehoy;
	}

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

		public function setIdTipoUsuario($value){
		if($this->validateId($value)){
			$this->tipousu = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getIdTipoUsuario(){
		return $this->tipousu;
	}
	
	public function setNombres($value){
		if($this->validateAlphabetic($value, 1, 50)){
			$this->nombres = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getNombres(){
		return $this->nombres;
	}
	public function setFecha($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->fecha = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getFecha(){
		return $this->fecha;
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

	public function setApellidos($value){
		if($this->validateAlphabetic($value, 1, 50)){
			$this->apellidos = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getApellidos(){
		return $this->apellidos;
	}

	public function setTelefono($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->telefono = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getTelefono(){
		return $this->telefono;
	}
	
	public function setDireccion($value){
		if($this->validateAlphabetic($value, 1, 50)){
			$this->direccion = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getDireccion(){
		return $this->direccion;
	}
	public function setImagen($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->foto = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getImagen(){
		return $this->foto;
	}

	public function setCorreo($value){
		if($this->validateEmail($value)){
			$this->correo = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getCorreo(){
		return $this->correo;
	}

	public function setAlias($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->alias = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getAlias(){
		return $this->alias;
	}

	public function setClave($value){
		if($this->validatePassword($value)){
			$this->clave = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getClave(){
		return $this->clave;
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

		public function getSesion(){
			return $this->sesion;
		}
	//Métodos para manejar la sesión del usuario
	public function checkAlias(){
		$sql = "SELECT id_usuario,correo_usu,foto_usu,fecha_creacion, sesion FROM usuario WHERE usuario = ?";
		$params = array($this->alias);
		$data = Database::getRow($sql, $params);
		if($data){
			$this->id = $data['id_usuario'];
			$this->correo = $data['correo_usu'];
			$this->foto = $data['foto_usu'];
			$this->fechadehoy = $data['fecha_creacion'];
			$this->sesion = $data['sesion'];
			return true;
		}else{
			return false;
		}
	}
	public function checkPassword(){
		$sql = "SELECT contrasena FROM usuario WHERE id_usuario = ?";
		$params = array($this->id);
		$data = Database::getRow($sql, $params);
		if(password_verify($this->clave, $data['contrasena'])){
			return true;
		}else{
			return false;
		}
	}	
	public function changePassword(){
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = "UPDATE usuario SET contrasena = ? WHERE id_usuario = ?";
		$params = array($hash, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function logOut(){
		return session_destroy();
	}

	//Metodos para manejar el CRUD
	public function getUsuarios(){
		$sql = "SELECT u.id_usuario,u.usuario,u.nombre_usu,u.apellido_usu,u.telefono_usu,u.correo_usu,u.direccion_usu,t.nombre_tipo_usu FROM usuario as u INNER JOIN tipo_usuario as t ON u.tipo_usu = t.id_tipo_usu WHERE id_tipo_usu = 1 || id_tipo_usu = 2 || id_tipo_usu = 3";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchUsuario($value){
		$sql = "SELECT u.id_usuario,u.usuario,u.nombre_usu,u.apellido_usu,u.telefono_usu,u.correo_usu,u.direccion_usu,t.nombre_tipo_usu FROM usuario as u INNER JOIN tipo_usuario as t ON u.tipo_usu = t.id_tipo_usu WHERE apellido_usu LIKE ? OR nombre_usu LIKE ? ORDER BY apellido_usu and tipo_usu = 1 || tipo_usu = 2";
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}
	public function createUsuario(){
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = "INSERT INTO usuario(usuario, contrasena,correo_usu, tipo_usu, fecha_creacion) VALUES(?, ?, ?, ?,?)";
		$tipo = 3;
		$fecha1= date("Y-m-d");
		$params = array($this->alias, $hash, $this->correo, $tipo, $fecha1);
		return Database::executeRow($sql, $params);
	}
	public function readUsuario(){
		$sql = "SELECT usuario,nombre_usu, apellido_usu,telefono_usu, contrasena,correo_usu, direccion_usu,foto_usu, tipo_usu FROM usuario WHERE id_usuario = ?";
		$params = array($this->id);
		$usuario = Database::getRow($sql, $params);
		if($usuario){
			$this->nombres = $usuario['nombre_usu'];
			$this->apellidos = $usuario['apellido_usu'];
			$this->correo = $usuario['correo_usu'];
			$this->alias = $usuario['usuario'];
			$this->telefono = $usuario['telefono_usu'];
			$this->direccion = $usuario['direccion_usu'];
			$this->foto = $usuario['foto_usu'];
			$this->tipousu = $usuario['tipo_usu'];
			$this->clave = $usuario['contrasena'];
			return true;
		}else{
			return null;
		}
	}
	public function updateUsuario(){
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = "UPDATE usuario SET usuario = ?,nombre_usu = ?, apellido_usu = ?,telefono_usu = ?, contrasena = ?,correo_usu = ?, direccion_usu = ?,foto_usu = ?, tipo_usu = ? WHERE id_usuario = ?";
		$params = array($this->alias,$this->nombres, $this->apellidos,$this->telefono, $hash, $this->correo, $this->direccion,  $this->foto, $this->tipousu,$this->id);
		return Database::executeRow($sql, $params);
	}
	public function updateUsuarios(){
        $sql = "UPDATE usuario SET usuario = ?,nombre_usu = ?, apellido_usu = ?,telefono_usu = ?, correo_usu = ?, direccion_usu = ?,foto_usu = ? WHERE id_usuario = ?";
		$params = array($this->alias,$this->nombres, $this->apellidos,$this->telefono, $this->correo, $this->direccion,  $this->foto, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteUsuario(){
		$sql = "DELETE FROM usuario WHERE id_usuario = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
    }
    //FACTURA
    public function createFactura(){
        $sql = "INSERT INTO factura(id_usuario, fecha, id_estado) VALUES (?,?,?)";
        $fechas = date('y-m-d');
        $estados= 3; 
        $params = array($this->id,$fechas, $estados);
        return Database::executeRow($sql, $params);    
    }
    public function maxid(){
        $sql ="SELECT id_factura, id_estado FROM factura WHERE id_factura= (SELECT MAX(id_factura) FROM factura) AND id_usuario=?";
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if($data){
            $this->estado = $data['id_factura'];
            $this->factura = $data['id_estado'];
            return true;
        }else{
            return false;
        }
    }
    public function maxCliente(){
        $sql = "SELECT MAX(id_usuario) as usuario FROM usuario";
        $params = array(null);
        $data = Database::getRow($sql, $params);
        if($data){
            $this->id = $data['usuario'];
            return true;
        }else{
            return false;
        }
    }
    public function maxCompra(){
		$sql = "SELECT id_factura FROM factura WHERE id_factura= (SELECT MAX(id_factura) FROM factura) AND id_usuario = ? ";
		$params = array($this->id);
		$data = Database::getRow($sql, $params);
		if($data){
			$this->factura = $data['id_factura'];	
			return true;
		}else{
			return false;
		}
	}
	public function CorreoExistente(){
		$sql = "SELECT * FROM usuario WHERE correo_usu = ?";
		$params = array($this->correo);
		return Database::getRow($sql, $params);
	}
	public function VerificarCorreo(){
		$sql = "SELECT id_usuario, usuario FROM usuario WHERE correo_usu = ?";
		$params = array($this->correo);
		$data = Database::getRow($sql, $params);
		if($data){
			$this->id = $data['id_usuario'];
			$this->alias = $data['usuario'];
			return true;
		}else{
			return false;
		}
	}

	public function RestablecerContra($contra){
		$hash = password_hash($contra, PASSWORD_DEFAULT);
		$sql = "UPDATE usuario SET contrasena = ? WHERE correo_usu = ?";
		$params = array($hash, $this->correo);
		return Database::executeRow($sql, $params);
	}
	public function FechaCreacion(){
		$sql = "UPDATE usuario SET fecha_creacion = ? WHERE id_usuario = ?";
		$fecha1= date("Y-m-d");
		$params = array($fecha1,  $this->id);
		return Database::executeRow($sql, $params);
	}
	public function SesionUnica1(){
		$sql = "UPDATE usuario SET sesion = ? WHERE id_usuario = ?";
		$activo = 1;
		$params = array($activo, $_SESSION['id_usuario']);
		return Database::executeRow($sql, $params);
	}
	public function SesionUnica2(){
		$sql = "UPDATE usuario SET sesion = ? WHERE id_usuario = ?";
		$inactivo = 0;
		$params = array($inactivo, $_SESSION['id_usuario']);
		return Database::executeRow($sql, $params);
	}
}
?>