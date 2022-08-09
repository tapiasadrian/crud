<!DOCTYPE html>
<html>
  <head>
    <title>Crear Programa</title>
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
             <form id="formulario" role="form" method="post" action="guardado_programa.php">
             <div class="cold-md-12">
               <strong class="lgris">Cree el programa</strong>
               <br>
               <label class="lgris">Nombre:</label>
               <input class="form-control" style="text-transform:uppercase;" type="text" name="nombre" value="" placeholder="Nombre" required/>

               <label class="lgris">Tipo Programa:</label>
                <div class="form-group col-xs-2">
                <?php 
                                include('funciones.php');
                                $miconexion=conectar_bd('','cbc1');
                                $consulta = "SELECT * FROM tiposprograma";
                                $resultado = mysqli_query ($miconexion, $consulta) or die (mysqli_error($miconexion));
                                
                                ?>
                  <select class="form-control" name="otipo">
                    <option value="" selected></option>
                    <?php while ($opcion = $resultado -> fetch_object()) { ?>
                    <option value="<?php echo $opcion->id_tipos;?>"><?php echo $opcion->tiposp_tipos;?></option>
                                    <?php } ?>
                  </select>
                </div>              
                  <br><br>
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