<?php
require_once("conexion.php");
$conex = conectaBaseDatos();

$email = $_REQUEST['email'];
$programa = $_REQUEST['idPrograma'];

$consulta = "select e.* from estudiante e inner join programa  p on  p.id = e.Programa where e.email='$email'  and p.id= $programa";
$sql=$conex->query($consulta);
$sql->execute();
$result=$sql->fetchAll(PDO::FETCH_ASSOC);

if (empty($result)){
    echo '<input type="hidden" id="duplicado" name="duplicado" value=0>';
}else{
    echo '
    <div class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
      <span class="sr-only">Error:</span>
      Usted ya está registrado en nuestro sistema, si desea información adicional comuníquese al teléfono 5460600 ext 1470 - 1473 o al mail uvirtual@umb.edu.co
    </div>
    <input type="hidden" id="duplicado" name="duplicado" value=1>
';
}



