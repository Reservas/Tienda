<?php
    require_once 'conexion.php';
    if(isset($_POST['id_producto'],$_POST['nombre'],$_POST['precio'],$_POST['cantidad']))
    {
        if(!empty($_POST['nombre']) and !empty($_POST['precio']) and !empty($_POST['cantidad'])) 
        {
        
            $id_producto = $_POST"id_producto"[]
            $nombre = $_POST['nombre'];
            $apellido = $_POST['precio'];
            $direccion = $_POST['cantidad'];
           

            $checknombre=mysql_query("SELECT * FROM costumers WHERE id_producto='$id_producto'",$link);
            $check_nombre=mysql_num_rows($checknombre);
                    if($check_nombre>0){
                        echo '<script language="javascript">alert("ERROR! El producto ya existe")</script>';
                        echo"<script>location.href='inicio.php'</script>";
                    }
                        {
                            $db = new PDO("mysql:host=". $hostname . ";dbname=". $database, $username, $password);
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $db->prepare("INSERT INTO costumers VALUES('', :id_producto, :nombre, :precio, :cantidad,"); 
                            $stmt->bindParam(":id_producto", $name, PDO::PARAM_STR);
                            $stmt->bindParam(':nombre',$name, PDO::PARAM_STR);
                            $stmt->bindParam(':precio',$address, PDO::PARAM_STR);
                            $stmt->bindParam(':cantidad',$city, PDO::PARAM_STR);
                            $stmt->execute();
                            echo "<script>alert('El producto se  registró exitosamente')</script>";
                            echo"<script>location.href='inicio.php'</script>";
                        }{
                            echo $e->getMessage();
                        }
                    }
                }
?>

