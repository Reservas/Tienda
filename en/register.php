<?php
    require_once 'conexion.php';
    if(isset($_POST['user'],$_POST['pass'],$_POST['nombre'],$_POST['apellido'],$_POST['direccion'],$_POST['fecha_nac'],$_POST['telefono'],$_POST['email'],$_POST['categoria'])) 
    {
        if(!empty($_POST['user']) and !empty($_POST['pass']) and !empty($_POST['nombre']) and !empty($_POST['apellido']) and !empty($_POST['direccion']) and !empty($_POST['fecha_nac']) and !empty($_POST['telefono']) and !empty($_POST['email']) and !empty($_POST['categoria'])) 
        {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $md5 = md5($_POST['pass']);
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $direccion = $_POST['direccion'];
            $fecha_nac = $_POST['fecha_nac'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $categoria = $_POST['categoria'];

            $checkuser=mysql_query("SELECT * FROM costumers WHERE user='$user'",$link);
            $check_user=mysql_num_rows($checkuser);
                    if($check_user>0){
                        echo '<script language="javascript">alert("ERROR! El usuario ya existe")</script>';
                        echo"<script>location.href='inicio.php'</script>";
                    }
                        {
                            $db = new PDO("mysql:host=". $hostname . ";dbname=". $database, $username, $password);
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $db->prepare("INSERT INTO costumers VALUES('', :user, :pass, :nombre, :apellido, :direccion, :fecha_nac, :telefono, :email, :categoria,)"); 
                            $stmt->bindParam(':user',$name, PDO::PARAM_STR);
                            $stmt->bindParam(':pass',$address, PDO::PARAM_STR);
                            $stmt->bindParam(':nombre',$city, PDO::PARAM_STR);
                            $stmt->bindParam(':apellido',$state, PDO::PARAM_STR);
                            $stmt->bindParam(':direccion',$email, PDO::PARAM_STR);
                            $stmt->bindParam(':fecha_nac',$nac, PDO::PARAM_STR);
                            $stmt->bindParam(':telefono',$phone, PDO::PARAM_STR);
                            $stmt->bindParam(':email',$user, PDO::PARAM_STR);
                            $stmt->bindParam(':categoria',$md5, PDO::PARAM_STR);
                            $stmt->execute();
                            echo "<script>alert('El usuario registrado exitosamente')</script>";
                            echo"<script>location.href='inicio.php'</script>";
                        }{
                            echo $e->getMessage();
                        }
                    }
                }else{
                    echo '<script language="javascript">alert("La contraseña es incorrecta")</script>';
                    echo"<script>location.href='index.php'</script>";
                }

?>