<!DOCTYPE html>
<html>
  <head>
    <title>Consulta de Programa</title>
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
                 <div class="form-group cold-md-3">
                  <input class="form-control" style="text-transform:uppercase;" type="text" name="nombre" value="" placeholder="Nombre" />
                 </div>
                 <br>
                 <div class="form-group col-md-3">
                  <input class="btn btn-outline-warning" class="form-control" style="text-transform: uppercase;" type="text" name="otipo" value="" placeholder="Tipo" />
                 </div>
                 <br>
                 <div class="form-group col-md-3">
                 <input class="btn btn-warning" type="submit" value="Consultar Programa" >

                 <input style="width: 30%;" class="btn btn-warning" type="button" onclick="location.href ='menu.php'" value="Volver">
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
          $vnombre=$_POST['nombre'];
          $vtipo=$_POST['otipo'];
          $miconexion=conectar_bd('', 'cbc1');
          $resultado=consulta($miconexion,"select * from programa where trim(nombrepro) like '%{$vnombre}%' and (trim(progra_tipo) like '%{$vtipo}%')");
          if($resultado->num_rows>0)
            {
              while ($fila = $resultado->fetch_object())
                {
                  echo $fila->id_prog." ".$fila->nombrepro." ".$fila->progra_tipo."<br>";
                }
            }
          else{
            echo "No existen registros";
              }  
          $miconexion->close();
        }?>
        </div>
      </div>
    </div>
  </body>
</html>