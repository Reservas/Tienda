<?php
    if(isset($_GET["id_producto"]))
    {
        include "../conexion.php";
        $idr = $_GET["id_producto"];
        $query = "SELECT `id_producto`, `nombre`, `precio`, `stock` FROM `producto` WHERE id_producto = '$idr'";
        $resultado = mysqli_query($conexion,$query);
        $total = mysqli_num_rows($resultado);
        if($total == 1)
        {
            $query2 = "DELETE FROM producto WHERE id_producto = '$idr'";
            $resultado2 = mysqli_query($conexion,$query2);
            if($resultado2)
            {
                echo "<script>alert('El producto se  elimino exitosamente')</script>";
				echo"<script>location.href='index.php'</script>";
            }
            else
            {
                echo "<script>alert('Error al borrar')</script>";
				echo"<script>location.href='index.php'</script>";
            }
        }
        else
        {
            echo "<script>alert('Error')</script>";
			echo"<script>location.href='index.php'</script>";
        }
    }
    else
    {
        echo "<script>alert('No hay id de producto')</script>";
        echo"<script>location.href='index.php'</script>";
    }
?>
