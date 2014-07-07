<?php
include("../clases/clsInscripcion.php"); 
    //crear el objeto con base en la clase 
    $objCon=new clsInscripcion(); 
    $objCon->setTipoId($_REQUEST['tipoId']);
    $objCon->setIdentificacion($_REQUEST['identificacion']);
    $objCon->setNombre($_REQUEST['nombre']);
    $objCon->setApellido($_REQUEST['apellido']);
    $objCon->setPrograma($_REQUEST['programa']);  
    $objCon->setFchNacimiento($_REQUEST['fchNacimiento']);  
    $objCon->setLNacimiento($_REQUEST['lNacimiento']);   
    $objCon->setDireccion($_REQUEST['direccion']);   
    $objCon->setCiudad($_REQUEST['ciudad']);   
    $objCon->setBarrio($_REQUEST['barrio']);   
    $objCon->setTelefono($_REQUEST['telefono']);   
    $objCon->setCelular($_REQUEST['celular']);
    $objCon->setEmail($_REQUEST['email']);
    $objCon->setGenero($_REQUEST['genero']);
    $objCon->setEstCivil($_REQUEST['estCivil']);
    $objCon->setFuente($_REQUEST['fuente']);

    

  
//metodo guardar
    $objCon->guardar();   

?>