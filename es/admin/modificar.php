<?php
if(isset($_POST["id_producto"]) AND isset($_POST["name"]) AND isset($_POST["precio"]) AND isset($_POST["stock"]))
{
    $id_producto = $_POST["id_producto"];
    $name = $_POST["name"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    include "../conexion.php";
    $query = mysqli_query($conexion,"UPDATE producto SET nombre = '$name', precio = '$precio', stock = '$stock' WHERE id_producto = $id_producto");
    if($query)
    {
        echo "<script>alert('El producto se registro exitosamente')</script>";
        echo"<script>location.href='index.php'</script>";
    }
    else
    {
        echo "<script>alert('Error: No se guardo el producto')</script>";
      echo"<script>location.href='index.php'</script>";
    }
}
else
{
    if(isset($_GET["id_producto"]))
    {
        include "../conexion.php";
        $idr = $_GET["id_producto"];
        $query = "SELECT `id_producto`, `nombre`, `precio`, `stock` FROM `producto` WHERE id_producto = '$idr'";
        $resultado = mysqli_query($conexion,$query);
        $total = mysqli_num_rows($resultado);
        if($total == 1)
        {
            while($row = mysqli_fetch_array($resultado))
            {
?>

<html lang="en">
    <head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <title>ExamenViolacion</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
    </head>

<body>
      <div class="col-md-offset-4 col-md-4">
        <div class="panel panel-primary">
           <h2 class="text-center" style="color:#0000;">Editar producto</h2>
        </div>
            <div  class="panel-body">
        <form name="agregar" action="modificar.php" method="post">
            <div>
                <label>ID</label>
                <input class="form-control input-sm" type="text" name="id_producto" placeholder="ID del producto" autocomplete="off" readonly value="<?=$row["id_producto"]?>">
            <label>Nombre</label>
                <input  class="form-control input-sm" type="text"  value="<?=$row["nombre"]?>" name="name" placeholder="Nombre del producto" autocomplete="off" required >
            <label>Precio</label>
                <input  class="form-control input-sm" type="text" value="<?=$row["precio"]?>" name="precio" placeholder="PRecio del producto" onkeypress="return soloNumeros(event)" autocomplete="off"required >
            <label>Cantidad</label>
                <input  class="form-control input-sm" type="text" name="stock" value="<?=$row["stock"]?>" placeholder="Cantidad del producto" onKeyPress="return soloNumeros(event)" autocomplete="off" required>

                <input type="submit" class="btn btn-success form-control btn-sm" value="Guardar">
            </div>
            </form>
        </div>


                <script src="../bootstrap/js/jquery.js"></script>
                <script src="../bootstrap/js/bootstrap.js"></script>
                <script type="text/javascript">
               // Solo permite ingresar numeros.
               function soloNumeros(e){
                 var key = window.Event ? e.which : e.keyCode
                 return (key >= 48 && key <= 57)
               }
               </script>
             </body>
         </html>
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
