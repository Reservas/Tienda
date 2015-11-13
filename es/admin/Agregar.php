<?php
    require_once '../conexion.php';
    if(isset($_POST['id_producto'],$_POST['name'],$_POST['precio'],$_POST['stock']))
    {
        if(!empty($_POST['name']) and !empty($_POST['precio']) and !empty($_POST['stock'])) 
        {
        
            $id_producto = $_POST['id_producto'];
            $nombre = $_POST['name'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
           

            $checknombre=mysql_query("SELECT * FROM producto WHERE id_producto='$id_producto'",$link);
            $check_nombre=mysql_num_rows($checknombre);
                    if($check_nombre>0){
                        echo '<script language="javascript">alert("ERROR! El producto ya existe")</script>';
                        echo"<script>location.href='inicio.php'</script>";
                    }
                        {
                            $db = new PDO("mysql:host=". $hostname . ";dbname=". $database, $username, $password);
                            //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $db->prepare("INSERT INTO producto VALUES(:id_producto, :nombre, :precio, :stock)"); 
                            $stmt->bindParam(":id_producto", $id_producto, PDO::PARAM_STR);
                            $stmt->bindParam(':nombre',$nombre, PDO::PARAM_STR);
                            $stmt->bindParam(':precio',$precio, PDO::PARAM_STR);
                            $stmt->bindParam(':stock',$stock, PDO::PARAM_STR);
                            $stmt->execute();
                            echo "<script>alert('El producto se  registró exitosamente')</script>";
                            echo"<script>location.href='inicio.php'</script>";
                        }{
                            echo $e->getMessage();
                        }
                    }
                }
?>

