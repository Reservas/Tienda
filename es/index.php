<!DOCTYPE html>
<?php
session_start();
require_once "conexion.php";
$user_pool = mysqli_query($conexion,"SELECT user FROM cliente");
?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <title>ExamenViolacion</title>
    <link href="../en/bootstrap/css/bootstrap.css" rel="stylesheet" />

</head>
<body align ="center">
    <section>
            <div>
                                            <div class="col-md-offset-4 col-md-4" align ="center">

                            <h2 class="text-center" style="color:#0000;">Clientes</h2>

                          <div class="panel-body">
                            <form action="validate.php" method="post">
                              <label>Usuario</label>
                              <input type="text"  class="form-control input-sm" id="user" name="user" placeholder="Usuario" autocomplete="off"   >
                              <label>Contraseña</label>
                              <input type="password"  class="form-control input-sm" id="pass" name="pass" placeholder="Contraseña" autocomplete="off" >
                              <?php
                                if(isset($_SESSION['error']))
                                {
                                    $error = $_SESSION['error'];
                                    if ($error == 1)
                                    {
                                        echo '
                                            <div class="alert alert-dismissible alert-danger">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                Usuario o contraseña incorreecta
                                            </div>
                                        ';
                                        session_destroy();
                                    }
                                }
                              ?>
                                <script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}
</script>

                          </div>


                              <a><input type="submit" id="airlbtn" class="btn btn-info" value="Inicio de sesion" style="width:50%;float:left;"></a>
                              <a href="adminlog.php"><input type="button" id="airlbtn" class="btn btn-success" value="Admin" style="width:50%;"></a>

						  </form>
                               </div>



    </section>

    <script src="../en/bootstrap/js/bootstrap.js"></script>
</body>
</html>
