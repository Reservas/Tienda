<?php
    require_once 'conexion.php';
    if(isset($_POST['user'],$_POST['pass'],$_POST['nombre'],$_POST['apellido'],$_POST['direccion'],$_POST['fecha_nac'],$_POST['telefono'],$_POST['email'],$_POST['categoria'])) 
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

            $checkuser=mysql_query("SELECT * FROM cliente WHERE user='$user'",$link);
            $check_user=mysql_num_rows($checkuser);
                    if($check_user>0){
                        echo '<script language="javascript">alert("ERROR! The user already exist")</script>';
                        echo"<script>location.href='inicio.php'</script>";
                    }
                        {
                            $db = new PDO("mysql:host=". $hostname . ";dbname=". $database, $username, $password);
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $db->prepare("INSERT INTO cliente VALUES('', :user, :pass, :nombre, :apellido, :direccion, :fecha_nac, :telefono, :email, :categoria)"); 
                            $stmt->bindParam(':user',$user, PDO::PARAM_STR);
                            $stmt->bindParam(':pass',$md5, PDO::PARAM_STR);
                            $stmt->bindParam(':nombre',$nombre, PDO::PARAM_STR);
                            $stmt->bindParam(':apellido',$apellido, PDO::PARAM_STR);
                            $stmt->bindParam(':direccion',$direccion, PDO::PARAM_STR);
                            $stmt->bindParam(':fecha_nac',$fecha_nac, PDO::PARAM_STR);
                            $stmt->bindParam(':telefono',$telefono, PDO::PARAM_STR);
                            $stmt->bindParam(':email',$email, PDO::PARAM_STR);
                            $stmt->bindParam(':categoria',$categoria, PDO::PARAM_STR);
                            $stmt->execute();
                            echo "<script>alert('The user registered successfully')</script>";
                            echo"<script>location.href='inicio.php'</script>";
                        }{
                            echo $e->getMessage();
                        }
     }
	else{
		echo '<script language="javascript">alert("Incorrect password")</script>';
		echo"<script>location.href='index.php'</script>";
	}
	

?>