<?php 
class clsConfirmar
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
    function setDay($day) 
    { 
    $this->day=$day; 
      
    }
    function setMensaje($mensaje_respuesta_pol) 
    { 
    $this->mensaje_respuesta_pol=$mensaje_respuesta_pol; 
      
    }
      
    function setTransaccion_id($transaccion_id) 
    { 
    $this->transaccion_id=$transaccion_id; 
      
    }
      
    function setBanco_id($banco_id) 
    { 
    $this->banco_id=$banco_id; 
      
    }
    function setMedio_pago_id($medio_pago_id) 
    { 
    $this->medio_pago_id=$medio_pago_id; 
      
    }

     function setTransaccion_banco_id($transaccion_banco_id) 
    { 
    $this->transaccion_banco_id=$transaccion_banco_id; 
      
    }
      function setCodigo_autorizacion($codigo_autorizacion) 
    { 
    $this->codigo_autorizacion=$codigo_autorizacion; 
      
    }
     function setEmail_comprador($email_comprador) 
    { 
    $this->email_comprador=$email_comprador; 
      
    }
     

    

     function setIntentos($intentos) 
    { 
    $this->intentos=$intentos; 
      
    }
     function setRef_pol($ref_pol) 
    { 
    $this->ref_pol=$ref_pol; 
      
    }
     function setFirma($firma) 
    { 
    $this->firma=$firma; 
      
    }
     function setMedio_pago($medio_pago) 
    { 
    $this->medio_pago=$medio_pago; 
      
    }
     function setIp($ip) 
    { 
    $this->ip=$ip; 
      
    }   



      function setTarjeta_habiente($tarjeta_habiente) 
    { 
    $this->tarjeta_habiente=$tarjeta_habiente; 
      
    } 
      function setFranquicia($franquicia) 
    { 
    $this->franquicia=$franquicia; 
      
    } 
      function setDireccionCobro($direccionCobro) 
    { 
    $this->direccionCobro=$direccionCobro; 
      
    } 
      function setTelefono($telefono) 
    { 
    $this->telefono=$telefono; 
      
    } 





    function actualizar($conex) 
    { 
    $sql="update pse set Cvalor='$this->valor',Cestado_pol='$this->estado_pol',Cfch='$this->day',Cmensaje='$this->mensaje_respuesta_pol',transaccion_id='$this->transaccion_id',banco_id='$this->banco_id',medio_pago_id='$this->medio_pago_id',transaccion_banco_id='$this->transaccion_banco_id',codigo_autorizacion='$this->codigo_autorizacion',email_comprador='$this->email_comprador',intentos='$this->intentos',ref_pol='$this->ref_pol',firma='$this->firma',medio_pago='$this->medio_pago',ip='$this->ip',tarjeta_habiente='$this->tarjeta_habiente',franquicia='$this->franquicia',direccionCobro='$this->direccionCobro',telefono='$this->telefono' where ref_venta='$this->ref_venta'";    
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
