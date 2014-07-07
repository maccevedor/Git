<?php 
class clsInscripcion 
{ 
    private $tipoId; 
    private $identificacion;
    private $nombre;
    private $apellido;
    private $programa;
    private $fchNacimiento;
    private $lNacimiento;
    private $direccion;
    private $ciudad;
    private $barrio;
    private $telefono;
    private $celular;
    private $genero;
    private $estCivil;
    private $fuente;
    private $fch;



    #--------------------------------------------------------------------------- 
    //conecion a la base de datos 

    #---------------------------------------------------------------------------- 
    //propiedades de la clase 
      
   
    function setPrograma($programa) 
    { 
    $this->programa=$programa; 
      
    }

    function setTipoId($tipoId) 
    { 
    $this->tipoId=$tipoId; 
      
    }
    function setIdentificacion($identificacion) 
    { 
    $this->identificacion=$identificacion; 
      
    }
    function setNombre($nombre) 
    { 
    $this->nombre=$nombre; 
      
    }
    
    function setApellido($apellido) 
    { 
    $this->apellido=$apellido; 
      
    }

      function setFchNacimiento($fchNacimiento) 
    { 
    $this->fchNacimiento=$fchNacimiento; 
      
    }
      function setLNacimiento($lNacimiento) 
    { 
    $this->lNacimiento=$lNacimiento; 
      
    }
      function setDireccion($direccion) 
    { 
    $this->direccion=$direccion; 
      
    }
      function setCiudad($ciudad) 
    { 
    $this->ciudad=$ciudad; 
      
    }

    function setTelefono($telefono) 
    { 
    $this->telefono=$telefono; 
      
    }
     function setBarrio($barrio) 
    { 
    $this->barrio=$barrio; 
      
    }

      function setCelular($celular) 
    { 
    $this->celular=$celular; 
      
    }
      function setEmail($email) 
    { 
    $this->email=$email; 
      
    }
      function setGenero($genero) 
    { 
    $this->genero=$genero; 
      
    }
      function setEstCivil($estCivil) 
    { 
    $this->estCivil=$estCivil; 
      
    }
         function setFuente($fuente) 
    { 
    $this->fuente=$fuente; 
      
    }
          function setFch($fch) 
    { 
    $this->fch=$fch; 
      
    }
    
    
 

    function guardar($conex) 
    { 
    $sql="insert into estudiante(TipoId,Identificacion,Nombre,Apellido,FchNacimiento,LNacimiento,Direccion,Ciudad,Barrio,Telefono,Celular,Email,Genero,EstadoCivil,Programa,Fuente,Fch,Estado) values('$this->tipoId','$this->identificacion','$this->nombre','$this->apellido','$this->fchNacimiento','$this->lNacimiento','$this->direccion','$this->ciudad','$this->barrio','$this->telefono','$this->celular','$this->email','$this->genero','$this->estCivil','$this->programa','$this->fuente','$this->fch','2')";
    //echo ($sql);
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
    $sql="update estudiante set Nombre='$this->nombre',Apellido='$this->apellido',FchNacimiento='$this->lNacimiento',LNacimiento='$this->lNacimiento',Direccion='$this->direccion',Ciudad='$this->ciudad',Barrio='$this->barrio',Telefono='$this->telefono',Celular='$this->celular',Email='$this->email',Genero='$this->genero',EstadoCivil='$this->estCivil',Programa='$this->programa',Fuente='$this->fuente',Fch='$this->fch' where Identificacion='$this->identificacion'"; 
    //echo ($sql);
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