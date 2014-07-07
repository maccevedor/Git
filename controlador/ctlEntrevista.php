<?php
include("../clases/clsEntrevista.php"); 
    //crear el objeto con base en la clase 
    $objEnt=new clsEntrevista(); 

    $objEnt->setQuienSoy($_GET['quienSoy']); 
    $objEnt->setInterpersonal($_GET['interpersonal']); 
    $objEnt->setProgramaAcademico($_GET['programaAcademico']); 
    $objEnt->setExperiencia($_GET['experiencia']); 
    $objEnt->setVirtual($_GET['virtual']); 
    $objEnt->setUmb($_GET['umb']); 
    $objEnt->setFinanciacion($_GET['financiacion']); 
    $objEnt->setComputadora($_GET['computadora']);
    $objEnt->setTIC($_GET['TIC']); 
    $objEnt->setLaboral($_GET['laboral']); 
    $objEnt->setInstitucionT($_GET['institucionT']); 
    $objEnt->setFchInicio($_GET['fchInicio']);   
    $objEnt->setFchfinal($_GET['fchFinal']); 
    $objEnt->setTelefonoT($_GET['telefonoT']);
    $objEnt->setCiudadt($_GET['ciudadT']); 
    $objEnt->setCargo($_GET['cargo']); 
    $objEnt->settipoVinculacion($_GET['tipoVinculacion']); 
    $objEnt->setFuncionPrincipal($_GET['funcionPrincipal']); 

     
//metodo guardar 
    $objEnt->guardar();   


    $objEnt->guardar2();   


?>