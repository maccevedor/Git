<?php 
class clsRespuesta
{ 
 
    private $usuario_id; 
    private $ref_venta; 
    private $valor; 
    private $moneda; 
    private $estado_pol; 


    #--------------------------------------------------------------------------- 
    //conecion a la base de datos 

    //propiedades de la clase 
      
    function setUsuario_id($usuario_id) 
    { 
    $this->usuario_id=$usuario_id; 
      
    } 
    function setRef_venta($ref_venta) 
    { 
    $this->ref_venta=$ref_venta; 
      
    } 
    function setValor($valor) 
    { 
    $this->valor=$valor; 
      
    } 
    function setMoneda($moneda) 
    { 
    $this->moneda=$moneda; 
      
    } 

    function setEstado_pol($estado_pol) 
    { 
    $this->estado_pol=$estado_pol; 
      
    }
    
    function setIdentificacion($identificacion) 
    { 
    $this->identificacion=$identificacion; 
      
    }
    function setDay($day) 
    { 
    $this->day=$day; 
      
    }
    function setInsertId($insertId) 
    { 
    $this->insertId =$insertId ; 
      
    }
    function setActRef_venta($actRef_venta) 
    { 
    $this->actRef_venta =$actRef_venta ; 
      
    }

    function setMensaje($mensaje) 
    { 
    $this->mensaje=$mensaje; 
      
    }

    function guardar($conex) 
    { 
    $sql="insert into pse (usuario_id,ref_venta,valor,moneda,estado_pol,identificacion,fch) values('$this->usuario_id','$this->ref_venta','$this->valor','$this->moneda','$this->estado_pol','$this->identificacion','$this->day')";    
       $sentencia = $conex->prepare($sql);
        //$ejecutar=mysql_query($sql,$con);
        
        try {
        if(!$sentencia->execute()){
       
            print_r($sentencia->errorInfo());
        }
        $resultado = $sentencia->fetchAll();
        $insertId = $conex->lastInsertId();

        //$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
    }
    catch(PDOException $e){
        echo "Error al ejecutar la sentencia: \n";
            print_r($e->getMessage());
    }
    
    return $insertId;

    }

    function actualizar($conex) 
    { 
    $sql="update pse set ref_venta='$this->actRef_venta' where id='$this->insertId'";    
       $sentencia = $conex->prepare($sql);
        //$ejecutar=mysql_query($sql,$con);
        
        try {
        if(!$sentencia->execute()){
       
            print_r($sentencia->errorInfo());
        }
        $resultado = $sentencia->fetchAll();
        $insertId = $conex->lastInsertId();

        //$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
    }
    catch(PDOException $e){
        echo "Error al ejecutar la sentencia: \n";
            print_r($e->getMessage());
    }
    
    return $insertId;

    }


    function respuesta($conex) 
    { 
    $sql="update pse set Pvalor='$this->valor',Pestado_pol='$this->estado_pol',Pfch='$this->day',Pmensaje='$this->mensaje' where ref_venta='$this->ref_venta'";    
       $sentencia = $conex->prepare($sql);
        //$ejecutar=mysql_query($sql,$con);
        
        try {
        if(!$sentencia->execute()){
       
            print_r($sentencia->errorInfo());
        }
        $resultado = $sentencia->fetchAll();
        $insertId = $conex->lastInsertId();

        //$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
    }
    catch(PDOException $e){
        echo "Error al ejecutar la sentencia: \n";
            print_r($e->getMessage());
    }
    
    return $insertId;

    } 
    
} 
?>  