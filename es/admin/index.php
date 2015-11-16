<html lang="en">
    <head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <title>ExamenViolacion</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
    </head>

<body>
    <section>
                                    <script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}
</script>
    <div>
       <div class="col-md-offset-0 col-md-12">

          <div>
           <h2 class="text-center" style="color:#0000;">Lista de productos</h2>
           </div>
           <div>
           <?php
include "../conexion.php";
$query = "SELECT `id_producto`, `nombre`, `precio`, `stock` FROM `producto` WHERE 1";
$resultado = mysqli_query($conexion,$query);
$total = mysqli_num_rows($resultado);
if($total>0)
{
?>
        <table class="table table-striped col-md-offset-0 col-md-12"  >
            <thead><tr><td>ID</td><td>Nombre del producto</td><td>Precio</td><td>Existencia</td><td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Agregar Producto</button></td></tr></thead><tbody>
<?php
setlocale(LC_MONETARY, 'en_US');

    while($row = mysqli_fetch_array($resultado))
	{
        echo "<tr><td>".$row['id_producto']."</td>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>$ ".number_format($row['precio'],2)."</td>";
		echo "<td>".$row['stock']."</td>";
        echo "<td><a href='modificar.php?id_producto=".$row['id_producto']."'><span class='glyphicon glyphicon-cog' aria-hidden='true'></span>  Editar</a> <a href='eliminar.php?id_producto=".$row['id_producto']."' class='text-danger'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span>  Borrar</a></td></tr> \n";
    }
}
else
{
    echo "<p class='text-danger text-center'>Error: la base de datos esta vacia </p>";
}
?>

           </div>
</div>
        </div>
    </section>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Agregar producto</h4>
            </div>
            <div class="modal-body">
                <div  class="panel-body">
                <form name="agregar" action="Agregar.php" method="post">
                <div class="col-md-offset-0 col-md-12">
                <label>Nombre</label>
                    <input class="form-control input-sm" type="text"  name="name" placeholder="Nombre del producto" autocomplete="off" required >
                <label>Precio</label>
                    <input class="form-control input-sm" type="text" name="precio" placeholder="Precio del producto" autocomplete="off"required="" >
                <label>Cantidad</label>
                    <input class="form-control input-sm" type="text" name="stock" placeholder="Cantidad del producto" onKeyPress="return soloNumeros(event)" autocomplete="off" required>

                    <input type="submit" class="btn btn-success form-control btn-sm" value="Agregar">
                </div>
                </form>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>


        <script src="../bootstrap/js/jquery.js"></script>
        <script src="../bootstrap/js/bootstrap.js"></script>
    </body>
</html>
