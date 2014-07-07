<?php 
class clsPago 
{ 
    private $persona; 
    private $idPersona;
    private $fchPago;
    private $cuenta;
    private $banco;
    private $tipoCuenta;
    private $valor;
    private $tipoPago;
    private $identificacionP;
    private $programaP;
    private $ciudadP;





    #--------------------------------------------------------------------------- 
    //conecion a la base de datos 
/*    private $conex; 
    #---------------------------------------------------------------------------- 
    //constructor 
    function __construct() 
    { 
        include("../modelo/funciones.php"); 
            $conex = conectaBaseDatos();
    } */
    #---------------------------------------------------------------------------- 

    //propiedades de la clase 
      
   


    function setPersona($persona) 
    { 
    $this->persona=$persona; 
      
    }
    function setIdPersona($idPersona) 
    { 
    $this->idPersona=$idPersona; 
      
    }
    function setFchPago($fchPago) 
    { 
    $this->fchPago=$fchPago; 
      
    }
    
    function setCuenta($cuenta) 
    { 
    $this->cuenta=$cuenta; 
      
    }
     function setBanco($banco) 
    { 
    $this->banco=$banco; 
      
    }
    function setTipoCuenta($tipoCuenta) 
    { 
    $this->tipoCuenta=$tipoCuenta; 
      
    }
      function setValor($valor) 
    { 
    $this->valor=$valor; 
      
    }
      function setTipoPago($tipoPago) 
    { 
    $this->tipoPago=$tipoPago; 
      
    }
    function setIdentificacionP($identificacionP) 
    { 
    $this->identificacionP=$identificacionP; 
      
    }
    function setprogramaP($programaP) 
    { 
    $this->programaP=$programaP; 
      
    }
     function setciudadP($ciudadP) 
    { 
    $this->ciudadP=$ciudadP; 
      
    }
    function setId($id) 
    { 
    $this->id=$id; 
      
    }
    
    
 

    function guardar($conex) 
    { 
    $sql="insert into pago(IdPersona,Persona,Expedido,FchPago,Cuenta,TipoCuenta,Banco,Valor,Tipo,Identificacion,idEstudiante) values('$this->idPersona','$this->persona','$this->ciudadP','$this->fchPago','$this->cuenta','$this->tipoCuenta','$this->banco','$this->valor','$this->tipoPago','$this->identificacionP','$this->id')";
    $sentencia = $conex->prepare($sql);
    //$ejecutar=mysql_query($sql,$con); 
        try {
        if(!$sentencia->execute()){
            print_r($sentencia->errorInfo());
        }
        $resultado = $sentencia->fetchAll();
        //$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
    }
    catch(PDOException $e){
        echo "Error al ejecutar la sentencia: \n";
            print_r($e->getMessage());
    }
    
    return $resultado;

    } 
} 
?>  