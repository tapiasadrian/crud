<?php
  include('funciones.php');
  session_start();
  $vnombre=$_POST['id_ficha'];
  $vfp=$_POST['fichapro'];


  $miconexion=conectar_bd('', 'cbc1');
  $resulado=consulta($miconexion,"update fichas set id_ficha='{$vnombre}',fichapro='{$vfp}'");

  if ($miconexion->affected_rows>0)
  {
      echo "Actualizacion exitosa";
  }
?>

<input style="width: 40%;" class="btn btn-warning" type="button" onclick="location.href ='menu.php'" value="Volver">
