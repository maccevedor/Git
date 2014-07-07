<?php 
class clsEntrevista
{ 
 
    private $programaAcademico; 
    private $experiencia; 
    private $virtual; 
    private $umb; 
    private $financiacion; 
    private $computadora; 
    private $TIC; 
    private $laboral; 
    private $institucionT; 
    private $fchInicio; 
    private $fchFinal; 
    private $telefonoT; 
    private $ciudadT; 
    private $cargo; 
    private $identificacion; 
    private $insertId;
    

    #--------------------------------------------------------------------------- 
    //conecion a la base de datos 

    //propiedades de la clase 
      
    function setProgramaAcademico($programaAcademico) 
    { 
    $this->programaAcademico=$programaAcademico; 
      
    } 
    function setExperiencia($experiencia) 
    { 
    $this->experiencia=$experiencia; 
      
    } 
    function setVirtual($virtual) 
    { 
    $this->virtual=$virtual; 
      
    } 
    function setUmb($umb) 
    { 
    $this->umb=$umb; 
      
    } 

    function setFinanciacion($financiacion) 
    { 
    $this->financiacion=$financiacion; 
      
    }
    function setComputadora($computadora) 
    { 
    $this->computadora=$computadora; 
      
    }
     function setTIC($TIC) 
    { 
    $this->TIC=$TIC; 
      
    }




    function setLaboral($laboral) 
    { 
    $this->laboral=$laboral; 
      
    }      
    function setInstitucionT($institucionT) 
    { 
    $this->institucionT=$institucionT; 
      
    }
    function setFchInicio($fchInicio) 
    { 
    $this->fchInicio=$fchInicio; 
      
    }
    function setFchFinal($fchFinal) 
    { 
    $this->fchFinal=$fchFinal; 
      
    }
    function setTelefonoT($telefonoT) 
    { 
    $this->telefonoT=$telefonoT; 
      
    }
    function setCiudadT($ciudadT) 
    { 
    $this->ciudadT=$ciudadT; 
      
    }
    function setCargo($cargo) 
    { 
    $this->cargo=$cargo; 
      
    }

     function setIdentificacion($identificacion) 
    { 
    $this->identificacion=$identificacion; 
      
    }
    function setInsertId($insertId) 
    { 
    $this->insertId=$insertId; 
      
    }


    function guardar($conex) 
    { 
    $sql="insert into entrevista(ProgramaAcademico,Experiencia,Virtual,UMB,Financiacion,Computadora,TIC,idEstudiante) values('$this->programaAcademico','$this->experiencia','$this->virtual','$this->umb','$this->financiacion','$this->computadora','$this->TIC','$this->insertId')";    
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

    function guardar2($conex) 
    { 
        if ($this->institucionT=="" && $this->cargo=="") {
             

              $sql="insert into laboral(Tipo,idEstudiante) values('No labora','$this->insertId')";
                   $sentencia = $conex->prepare($sql);
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


        }else{

                $sql="insert into laboral(Tipo,Institucion,FchInicio,FchFinal,Telefono,CiudadT,Cargo,idEstudiante) values('$this->laboral','$this->institucionT','$this->fchInicio','$this->fchFinal','$this->telefonoT','$this->ciudadT','$this->cargo','$this->insertId')";
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

      function guardar3($conex) 
    { 
                 $sql="insert into laboral(Tipo,idEstudiante) values('No labora','$this->insertId')";
                   $sentencia = $conex->prepare($sql);
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