<?php 
class clsAcademica
{ 

    // Tomas el valor del campo
   
    private $nivel; 
    private $titulo; 
    private $institucion; 
    private $fchEgreso;
    private $identificacion;
    private $insertId;
    

    #--------------------------------------------------------------------------- 
    //conecion a la base de datos 

    #---------------------------------------------------------------------------- 
    //propiedades de la clase 




    function setNivel($nivel) 
    { 
    $this->nivel=$nivel; 
      
    } 
          
    function setTitulo($titulo) 
    { 
    $this->titulo=$titulo;  
    } 
          
    function setInstitucion($institucion) 
    { 
    $this->institucion=$institucion; 
    } 
          
    function setFchEgreso($fchEgreso) 
    { 
    $this->fchEgreso=$fchEgreso; 
      
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
    //$sql="insert into academico(Tipo,Titulo,Institucion,FchEgreso,identificacion) values ('this->nivel','this->titulo','this->institucion','this->fchEgreso')"; 
    $sql="insert into academico(Tipo,Titulo,Institucion,FchEgreso,idEstudiante) values('$this->nivel','$this->titulo','$this->institucion','$this->fchEgreso','$this->insertId')";
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