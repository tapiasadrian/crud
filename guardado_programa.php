<?php
include('funciones.php');   
  $vnombre=$_POST['nombre'];
  $vtipo=$_POST['otipo'];
  
  
  $miconexion=conectar_bd('', 'cbc1');
  $resultado=consulta($miconexion,"insert into programa (nombrepro,progra_tipo) values ('{$vnombre}','{$vtipo}')");

  if ($resultado)
  {
    echo '<script language="javascript">';
    echo 'alert("Programa creado correctamente");';
    echo 'window.location="crear_programa.php";';
    echo '</script>';
}
else{ 
  echo '<script language="javascript">';
  echo 'alert("  Error al crear Programa");';
  echo 'window.location="crear_programa.php";';
  echo '</script>';
}
  ?>

<input style="width: 10%;" class="btn btn-success" type="button" onclick="location.href ='menu.php'" value="↺">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>