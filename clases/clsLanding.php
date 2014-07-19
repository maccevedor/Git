<?php 
class clsLanding
{ 
    private $nombres; 
    private $apellidos;
    private $cedula;
    private $ciudad;
    private $correo;
    private $telefono;
    private $programa;
    private $fch;
      
   


    function setNombres($nombres) 
    { 
    $this->nombres=$nombres; 
      
    }
    function setApellidos($apellidos) 
    { 
    $this->apellidos=$apellidos; 
      
    }
    function setCedula($cedula) 
    { 
    $this->cedula=$cedula; 
      
    }
    
    function setCiudad($ciudad) 
    { 
    $this->ciudad=$ciudad; 
      
    }
     function setCorreo($correo) 
    { 
    $this->correo=$correo; 
      
    }
      function setTelefono($telefono) 
    { 
    $this->telefono=$telefono; 
      
    }
    function setPrograma($programa) 
    { 
    $this->programa=$programa; 
      
    }
    function setFch($fch) 
    { 
    $this->fch=$fch; 
      
    }
     function setFuente($fuente) 
    { 
    $this->fuente=$fuente; 
      
    }
    
    
 
    function guardar($conex) 
    { 
    $sql="insert into estudiante(Nombre,Apellido,Identificacion,Ciudad,Email,Telefono,Programa,Fch,Fuente) values('$this->nombres','$this->apellidos','$this->cedula','$this->ciudad','$this->correo','$this->telefono','$this->programa','$this->fch','$this->fuente')";

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

