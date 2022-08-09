<!DOCTYPE html>
<html>
  <head>
    <title>Crear Ficha</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="estilos.css" rel="stylesheet"/>
    <script src="js/bootstrap.js"></script>
  </head>
  <body>
    <div id="div1" class="container">
        <br>
        <div id="div2">
           <div id="div3">
             <form id="formulario" role="form" method="post" action="guardado_ficha.php">
             <div class="cold-md-12">
               <strong class="lgris">Crear la ficha</strong>
               <br>
               <label class="lgris">Numero:</label>
                <input class="btn btn-outline-warning" class="form-control" type="number" name="nombre" min="9999" max="9999999999" value="" placeholder="Numero" required/>
                <br>
               <label class="lgris">Nombre del programa:</label>
               <div class="form-group col-xs-2">
                <?php 
                                include('funciones.php');
                                $miconexion=conectar_bd('','cbc1');
                                $consulta = "SELECT * FROM programa";
                                $resultado = mysqli_query ($miconexion, $consulta) or die (mysqli_error($miconexion));
                                
                                ?>
                  <select class="form-control" name="progra">
                    <option value="" selected></option>
                    <?php while ($opcion = $resultado -> fetch_object()) { ?>
                    <option value="<?php echo $opcion->id_prog;?>"><?php echo $opcion->nombrepro;?></option>
                                    <?php } ?>
                  </select>
               <br>
               <input class="btn btn-warning" type="submit" value="Guardar">
               <input style="width: 20%;" class="btn btn-warning" type="button" onclick="location.href ='menu.php'" value="Volver">
             </div>
             </form>
            <br>
           </div>
        </div>
    </div>
  </body>
</html>