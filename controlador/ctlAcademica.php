<?php
include("../clases/clsAcademica.php"); 
    //crear el objeto con base en la clase 
    $objAca=new clsAcademica(); 

    include("../modelo/conexion.php"); 
        $con=$conexion; 

for($i = 0; $i < count($_GET['nivel']); $i++) {

    $objAca->setNivel($_GET['nivel'][$i]); 
    $objAca->setTitulo($_GET['titulo'][$i]); 
    $objAca->setInstitucion($_GET['institucion'][$i]); 
    $objAca->setFchEgreso($_GET['fchEgreso'][$i]); 
    $objAca->setIdentificacion($_GET['identificacion']);


    $objAca->guardar($con);   

}
    

?>