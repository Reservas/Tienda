<?php
if(isset($_POST["id_producto"]) AND isset($_POST["name"]) AND isset($_POST["precio"]) AND isset($_POST["stock"]))
{
    $id_producto = $_POST["id_producto"];
    $name = $_POST["name"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    include "../conexion.php";
    $query = mysql_query("UPDATE producto SET nombre = '$name', precio = '$precio', stock = '$stock' WHERE id_producto = $id_producto");
    if($query)
    {
        echo "<script>alert('El producto se  registró exitosamente')</script>";
        echo"<script>location.href='inicio.php'</script>";
    }
    else
    {
        echo "<script>alert('Error: No se guardo el producto')</script>";
      echo"<script>location.href='inicio.php'</script>";
    }
}
else
{
    if(isset($_GET["id_producto"]))
    {
        include "../conexion.php";
        $idr = $_GET["id_producto"];
        $query = "SELECT `id_producto`, `nombre`, `precio`, `stock` FROM `producto` WHERE id_producto = '$idr'";
        $resultado = mysql_query($query, $link);
        $total = mysql_num_rows($resultado);
        if($total == 1)
        {
            while($row = mysql_fetch_array($resultado))
            {
?>
 <script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}
</script>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="panel panel-primary">
           <h2 class="text-center" style="color:#0000;">Editar producto</h2>
        </div>
            <div  class="panel-body">
        <form name="agregar" action="modificar.php" method="post">
            <div>
                <label>ID</label>
                <input type="text" name="id_producto" placeholder="ID del producto" autocomplete="off" readonly value="<?=$row["id_producto"]?>">
            <label>Nombre</label>
                <input type="text"  value="<?=$row["nombre"]?>" name="name" placeholder="Nombre del producto" autocomplete="off" required > 
            <label>Precio</label>
                <input type="text" value="<?=$row["precio"]?>" name="precio" placeholder="PRecio del producto" onkeypress="return soloNumeros(event)" autocomplete="off"required >
            <label>Cantidad</label>
                <input type="text" name="stock" value="<?=$row["stock"]?>" placeholder="Cantidad del producto" onKeyPress="return soloNumeros(event)" autocomplete="off" required>

                <input type="submit" class="btn btn-success form-control btn-sm" value="Guardar">
            </div>
            </form>            
        </div>
<?php
            }
        }
        else
        {
			echo "<script>alert('Error: El producto no existe.')</script>";
        echo"<script>location.href='inicio.php'</script>";
            
        }
    }
    else
    {
		echo "<script>alert('Error: no hay id de producto')</script>";
        echo"<script>location.href='inicio.php'</script>";
    
    }
}
?>