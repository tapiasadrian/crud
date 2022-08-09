<!doctype html>
<html>
    <head>
        <title>Consulta de programas</title>
        <meta hhtp-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="js/bootstrap.js"></script>
    </head>
    <body>
        <div id="divconsulta" class="container">
            <br>
            <div id="div2">
                <div id="div4" >
                    <form name="formulario" role="form" method="post">
                        <div class="col-md-12">
                            <strong class="lgris">Ingrese los datos de la ficha</strong>
                            <br><br>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                <input class="form-control" type="number" name="numid" min="1" max="9999999999999" autofocus value="" placeholder="Digite el numero de ficha" />
                                </div>
                            </div>
<div class="form-group col-md-3">
    <br>
    <input class="btn btn-warning" type="submit" value="Consultar">
    <input style="width: 40%;" class="btn btn-warning" type="button" onclick="location.href ='menu.php'" value="volver">
</div>
</div>
<br>
</div>
</form>
<br>
</div>

<div id="divconsulta2">
    <?php
    if ($_SERVER['REQUEST_METHOD']=='POST')
    {
    include('funciones.php');
    $miconexion=conectar_bd('', 'cbc1');
    $vficha=$_POST['numid'];
    $resultado=consulta($miconexion,"select * from fichas where trim(id_ficha) like '%{$vficha}%'");
    if($resultado->num_rows>0)
    {
    while ($fila = $resultado->fetch_object())
    {   
        echo $fila->id_ficha." ".$fila->fichapro."<br>";
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