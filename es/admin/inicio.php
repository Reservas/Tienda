<html lang="en">
    <head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <title>ExamenViolacion</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
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
       <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="panel panel-primary">
           <h2 class="text-center" style="color:#0000;">Agregar producto</h2>
        </div>
            <div  class="panel-body">
        <form name="agregar" action="Agregar.php" method="post">
            <div>
                <label>ID</label>
                <input type="text" name="id_producto" placeholder="ID del producto" autocomplete="off" required="">
            <label>Nombre</label>
                <input type="text"  name="name" placeholder="Nombre del producto" autocomplete="off" required > 
            <label>Precio</label>
                <input type="text" name="precio" placeholder="PRecio del producto" onkeypress="return soloNumeros(event)" autocomplete="off"required="" >
            <label>Cantidad</label>
                <input type="text" name="stock" placeholder="Cantidad del producto" onKeyPress="return soloNumeros(event)" autocomplete="off" required>

                <input type="submit" class="btn btn-success form-control btn-sm" value="Agregar">
            </div>
            </form>            
        </div>
           
           
          <div>
           <h2 class="text-center" style="color:#0000;">Lista de productos</h2>
           </div> 
           <div>
           <?php
include "../conexion.php";
$query = "SELECT `id_producto`, `nombre`, `precio`, `stock` FROM `producto` WHERE 1";
$resultado = mysql_query($query, $link);
$total = mysql_num_rows($resultado);
if($total>0)
{
?>
        <table class="table table-striped">
            <thead><tr><td>ID</td><td>Nombre del producto</td><td>Precio</td><td>Existencia</td></tr></thead><tbody>          
<?php
    while($row = mysql_fetch_array($resultado))
	{
        echo "<tr><td>".$row['id_producto']."</td>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>".$row['precio']."</td>";
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
    
    
    
    
        <script src="docs/js/bootstrap.js"></script>
    </body>
</html>