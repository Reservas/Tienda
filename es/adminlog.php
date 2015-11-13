<!DOCTYPE html>
<?php 
session_start();
require_once "conexion.php";
$user_pool = mysql_query("SELECT user FROM cliente");                          
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
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" align ="center">

                            <h2 class="text-center" style="color:#0000;">Administrador</h2>

                          <div class="panel-body">
                            <form action="validateadmin.php" method="post">
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
                                            
                          
                              <a><input type="submit" id="airlbtn" class="btn btn-success btn-xs" value="Inicio de sesion" style="width:100%;"></a>
                         
						  </form>
                               </div>
                        </div>
                    </div>
                
    </section>

    <script src="../en/bootstrap/js/bootstrap.js"></script>
</body>
</html>