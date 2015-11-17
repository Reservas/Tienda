<?php
    require_once '../conexion.php';
    if(isset($_POST['name'],$_POST['precio'],$_POST['stock']))
    {
        if(!empty($_POST['name']) and !empty($_POST['precio']) and !empty($_POST['stock']))
        {


            $nombre = $_POST['name'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];


            $checknombre=mysqli_query($conexion,"SELECT * FROM producto WHERE nombre='$nombre'");
            $check_nombre=mysqli_num_rows($checknombre);
                    if($check_nombre>0){
                        echo '<script language="javascript">alert("ERROR! El producto ya existe")</script>';
                        echo"<script>location.href='inicio.php'</script>";
                    }
                        {
                            $db = new PDO("mysql:host=". $hostname . ";dbname=". $database, $username, $password);
                            //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $db->prepare("INSERT INTO producto VALUES(NULL,:nombre, :precio, :stock)");
                            $stmt->bindParam(':nombre',$nombre, PDO::PARAM_STR);
                            $stmt->bindParam(':precio',$precio, PDO::PARAM_STR);
                            $stmt->bindParam(':stock',$stock, PDO::PARAM_STR);
                            $stmt->execute();
                            echo "<script>alert('El producto se  registró exitosamente')</script>";
                            echo"<script>location.href='index.php'</script>";
                        }{
                            echo $e->getMessage();
                        }
                    }
                }
?>
