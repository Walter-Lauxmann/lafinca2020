<?php
require_once RUTA_MODELO."conexion.php";
class Edificio extends Conexion{
    private $edificio = array();
    private $lista = array();
    private $sql;
    
    public function __construct(){
        parent::__construct();
        $this->edificio['id'] = null;
        $this->edificio['tipo'] = null;
        $this->edificio['calle'] = null;
        $this->edificio['numero'] = null;
        $this->edificio['piso'] = null;
        $this->edificio['departamento'] = null;
        $this->edificio['cp'] = null;
        $this->edificio['localidad'] = null;
        $this->edificio['descripcion'] = null;
        $this->edificio['precio_venta'] = null;
        $this->edificio['precio_alquiler'] = null;
        $this->edificio['imagen'] = null;
        $this->edificio['idPropietario'] = null;
        $this->edificio['idInquilino'] = null;
    }

    public function __get($propiedad){
        if(!array_key_exists($propiedad,$this->edificio)){
            throw new Exception("Esta propiedad no existe $propiedad");
        }
        return $this->edificio[$propiedad];
    }

    public function __set($propiedad,$valor){
        if(!array_key_exists($propiedad,$this->edificio)){
            throw new Exception("Esta propiedad no existe $propiedad");
        }
        $this->edificio[$propiedad] = $valor;
    }

    public function __toString(){
        return "Edificio: $this->calle, $this->numero";
    }

    /**
     * Selecciona los edificios en la Base de Datos
     * @param criterio
     */
    public function seleccionar($criterio = null){
        $this->sql = "SELECT * FROM edificios";
        
        if(!is_null($criterio)) {
            $this->sql .= " WHERE $criterio";
        }
        
        // echo $this->sql;
        $resultado = $this->_db->query($this->sql); // Ejecutamos la consulta la guardamos en $resultado
        $this->lista = $resultado->fetch_all(MYSQLI_ASSOC); // Guardamos los datos resultantes en un array asociativo
        //print_r($this->lista);
        return $this->lista;
    }

    public function insertar(){
        $this->sql = "INSERT INTO edificios(
                                            tipo,
                                            calle,
                                            numero,
                                            piso,
                                            departamento,
                                            cp,
                                            localidad,
                                            descripcion,
                                            precio_venta,
                                            precio_alquiler,
                                            imagen,
                                            idPropietario,
                                            idInquilino
                                            ) 
                            VALUES(
                                '$this->tipo',
                                '$this->calle',
                                '$this->numero',
                                '$this->piso',
                                '$this->departamento',
                                '$this->cp',
                                '$this->localidad',
                                '$this->descripcion',
                                '$this->precio_venta',
                                '$this->precio_alquiler',
                                '$this->imagen',
                                '$this->idPropietario',
                                '$this->idInquilino'
                            )";
        echo $this->sql; 
        $this->_db->query($this->sql);
    }

    public function modificar($id){
        $this->sql = "UPDATE edificios SET 
                        tipo='$this->tipo',
                        calle='$this->calle',
                        numero='$this->numero',
                        piso='$this->piso',
                        departamento='$this->departamento',
                        cp='$this->cp',
                        localidad='$this->localidad',
                        descripcion='$this->descripcion',
                        precio_venta='$this->precio_venta',
                        precio_alquiler='$this->precio_alquiler',
                        imagen='$this->imagen',
                        idPropietario='$this->idPropietario',
                        idInquilino='$this->idInquilino'
                        WHERE id='$id'";
        //echo $this->sql;
        $this->_db->query($this->sql);
    }

    public function eliminar($id){
        $this->sql = "DELETE FROM edificios WHERE id='$id'";
        $this->_db->query($this->sql);
    }
}
?>