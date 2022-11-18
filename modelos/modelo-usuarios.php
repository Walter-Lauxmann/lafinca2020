<?php
require_once RUTA_MODELO."conexion.php";
class Usuario extends Conexion {
    private $usuario = array();
    private $lista = array();
    private $sql;
    
    public function __construct() {
        parent::__construct();
        $this->usuario["id"] = null;
        $this->usuario["nombre"] = null;
        $this->usuario["user"] = null;
        $this->usuario["password"] = null;
        $this->usuario["rol"] = null;
        $this->usuario["imagen"] = null;
        $this->usuario["dni"] = null;
        $this->usuario["fechaNacimiento"] = null;
        $this->usuario["sexo"] = null;
        $this->usuario["avales"] = null;
    }

    public function __get($propiedad) {
        if(!array_key_exists($propiedad,$this->usuario)){
            throw new Exception("Este propiedad no existe $propiedad");
        }
        return $this->usuario[$propiedad];
    }

    public function __set($propiedad, $valor) {
        if(!array_key_exists($propiedad,$this->usuario)) {
            throw new Exception("Esta propiedad no existe $propiedad");
        }
        $this->usuario[$propiedad] = $valor;
    }

    public function __toString() {
        return "Usuario: $this->usuario, $this->rol";
    }

    public function seleccionar($criterio = null) {
        $this->sql = "SELECT * FROM usuarios";
        if (!is_null($criterio)) {
            $this->sql .= " WHERE $criterio";
        }
        //echo $this->sql;
        $resultado = $this->_db->query($this->sql);
        $this->lista = $resultado->fetch_all(MYSQLI_ASSOC);
        //print_r($this->lista);
        return $this->lista;
    }

    public function insertar() {
        $this->sql = "INSERT INTO usuarios(
                                            nombre,
                                            usuario,
                                            password,
                                            rol,
                                            imagen,
                                            dni,
                                            fechaNacimiento,
                                            sexo,
                                            avales
                                            )
                                VALUES(
                                '$this->nombre',
                                '$this->user',
                                '$this->password',
                                '$this->rol',
                                '$this->imagen',
                                '$this->dni',
                                '$this->fechaNacimiento',
                                '$this->sexo',
                                '$this->avales'
                                )";
        //echo $this->sql;
        $this->_db->query($this->sql);
    }

    public function modificar($id){
        $this->sql = "UPDATE usuarios SET 
                        nombre='$this->nombre',
                        usuario='$this->user',
                        password='$this->password',
                        rol='$this->rol',
                        imagen='$this->imagen',
                        dni='$this->dni',
                        fechaNacimiento='$this->fechaNacimiento',
                        sexo='$this->sexo',
                        avales='$this->avales'
                        WHERE id='$id'";
        //echo $this->sql;
        $this->_db->query($this->sql);
    }

    public function eliminar($id){
        $this->sql = "DELETE FROM usuarios WHERE id='$id'";
        $this->_db->query($this->sql);
    }
}


?>