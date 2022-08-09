<!DOCTYPE html>
<html>
  <head>
    <title>Modificación de Programas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="estilos.css" rel="stylesheet"/>
    <script src="js/bootstrap.js"></script>
  </head>
  <body>
    <div id="divconsulta" class="container">
       <br>
       <div id="div2">
          <div id="div4">
               <form name="formulario" role="form" method="post">
                 <div class="col-md-12">
                    <strong class="lgris">Ingrese criterio de busqueda</strong>
                    <br><br>
                    <div class="form-row">
                     <div class="form-group col-md-5">
                     <input class="form-control" style="text-transform:uppercase;" type="text" name="nombre" value="" placeholder="Nombre" />
                     <br>
                     </div>
                       <div class="form-group cold-md-3">
                       <input class="btn btn-warning" type="submit" value="consultar" >
                       <input style="width: 20%;" class="btn btn-warning" type="button" onclick="location.href ='menu.php'" value="Volver">
                       </div>
                    </div>
                    <br>
                 </div>
               </form>
               <br>
          </div>

          <div id="divconsulta2">
          <?php
          if ($_SERVER['REQUEST_METHOD']==='POST')
          {
              include('funciones.php');
              session_start();
              $vnombre=$_POST['nombre'];
              $miconexion=conectar_bd('', 'cbc1');
              $resultado=consulta($miconexion,"select * from programa where nombrepro='{$vnombre}'");
              if($resultado->num_rows>0)
              {
                  $fila = $resultado->fetch_object();
                  $_SESSION['id_apre']=$fila->id_prog;
                  ?>
                <form id="formulario2" role="form" method="post" action="actualizar_programa.php">
                    <div class="col-md-12">
                       <strong class="lgris">Datos del Programa</strong><br>

                       <label class="lgris">Id:</label>
                       <input class="form-control" type="text" name="ide1" disabled="disabled" value="<?php echo $fila->id_prog?>"/>

                       <label class="lgris">Nombres:</label>
                       <input class="form-control" style="text-transform:uppercase;" type="text" name="nombre" required value="<?php echo $fila->nombrepro ?>"/>
                        
                       <label class="lgris">Tipo Programa:</label>
                       <input class="form-control" style="text-transform:uppercase;" type="text" name="otipo" value="<?php echo $fila->progra_tipo ?>" required/>

                       <br>
                       <input class="btn btn-success" type="submit" value="Actualizar">
                       <br>
                    </div>
                </form>
                <?php
              }
            else{ 
              echo '<script language="javascript">';
              echo 'alert("No existen registro");';
              echo 'window.location="modificar_programa.php";';
              echo '</script>';
            }
            $miconexion->close();
          }?>
          </div>
       </div>
    </div>
  </body>
</html>