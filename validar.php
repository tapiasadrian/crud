<?php
include("confirmar.php");
session_start();

$nombreuser = $_POST['nombreuser'];
$contra = $_POST['contra'];
 
$nombreuser = $mysqli->real_escape_string($nombreuser);
 
$query = "SELECT nombreuser,contra FROM usuario WHERE nombreuser = '$nombreuser' AND contra='$contra';";
$result = $mysqli->query($query);
 
if($result->num_rows == 1) 
{
    $_SESSION['usuario'] = $nombreuser;
    echo '<script language="javascript">';
    echo 'alert("Bienvenido Admin");';
    echo 'window.location="menu.php";';
    echo '</script>';
}
else{ 
    echo '<script language="javascript">';
    echo 'alert("  Error al ingresar");';
    echo 'window.location="index.php";';
    echo '</script>';
}
?>