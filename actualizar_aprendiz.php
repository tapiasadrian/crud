<?php
  include('funciones.php');
  session_start();
  $vide=$_SESSION['id_apre'];
  $vnombres=$_POST['nombres'];
  $vapellidos=$_POST['apellidos'];
  $vdireccion=$_POST['direccion'];
  $vtelefono=$_POST['telefono'];

  $miconexion=conectar_bd('', 'cbc1');
  $resulado=consulta($miconexion,"update aprendices set apre_nombre	='{$vnombres}',apre_apellidos='{$vapellidos}',apre_direccion='{$vdireccion}',apre_telefono='{$vtelefono}' where id_apre='{$vide}'");

  if ($miconexion->affected_rows>0)
  
  { 
    echo '<script language="javascript">';
    echo 'alert("Aprendiz Modificado Correctamente");';
    echo 'window.location="modificar_aprendiz.php";';
    echo '</script>';
}
?>

<input style="width: 20%;" class="btn btn-warning" type="button" onclick="location.href ='menu.php'" value="Volver">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>