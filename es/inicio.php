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
                                            
                          
                              <a><input type="submit" id="airlbtn" class="btn btn-success btn-xs" value="Inicio de sesion" style="width:100%;"></a>
                         
						  </form>
                               </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" >
                      <div class="panel panel-primary">
                            <h2 class="text-center" style="color:#fff;">Admin</h2>
                          <div class="panel-footer">
                              <a href="adminlog.php"><input type="button" id="airlbtn" class="btn btn-success btn-xs" value="Admin" style="width:100%;"></a>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="panel panel-primary">
                          <div class="panel-heading">
                            <h2 class="text-center" style="color:#fff;">Registrate</h2>
                          </div>
                          <div class="panel-body">
                            <form name="register" action="register.php" method="post">
                              <div class="col-md-10"> 
                                <label>Usuario</label>
                                <input type="text" class="form-control input-sm" name="user" placeholder="Usuario" autocomplete="off" required > 
                                <label>Contraseña</label>
                                <input type="password" class="form-control input-sm" name="pass" placeholder="Contraseña" autocomplete="off" required pattern=".{6,12}"   required title="6 caractères como mìnimo ">  
                                    <label>Nombre</label>
                                <input type="text" class="form-control input-sm" name="nombre" placeholder="Nombre" autocomplete="off" required
                                onkeypress="return alpha(event)" > 
                                <label>Apellido</label>
                                <input type="text" class="form-control input-sm" name="apellido" placeholder="Apellido" autocomplete="off" required
                                onkeypress="return alpha(event)" > 
                                <label>Dirección</label>
                                <input type="text" class="form-control input-sm" name="direccion" placeholder="Dirección" autocomplete="off" required> 
                                <label>Fecha de nacimiento</label>
                                  <script>
                                  function compruebaFecha($date){
if ($date == "" || $date == "dd/mm/aaaa")
return false;
if (!ereg("^([[:digit:]]{2})/([[:digit:]]{2})/([[:digit:]]{4})$", $date, $vec))
return false;
else{
if ($vec[1] <= 31)
return false;
if ($vec[2] <= 12)
return false;
//if ($vec[3] <= date("Y") + 1)
//return false;
if ($date != date("d/m/Y",mktime(0,0,0, $vec[2], $vec[1], $vec[3])))
return false;
}
return true;
}
                                  </script>
                                <input type="date" class="form-control input-sm" name="fecha_nac" placeholder="Fecha de nacimient" autocomplete="off" required onkeypress="compruebaFecha"> 
                                <label>Teléfono</label>
                                  
                                <input type="text" class="form-control input-sm" name="telefono" maxlength="8" placeholder="7*******" autocomplete="off" required
                                onKeyPress="return soloNumeros(event)"required="" pattern="7[0-9]{7}"> 
                              

                                <label>Correo</label>
                                <input type="text" class="form-control input-sm" name="email" placeholder="Correo" autocomplete="off" required> 
                                <label>Categoría</label>
                                <input type="text" class="form-control input-sm" name="categoria" placeholder="Categoría" autocomplete="off" required> 
</div>
                          </div> 
                          <div class="panel-footer">
                              <input type="submit" class="btn btn-success form-control btn-sm" value="Registrate">
                            </form>
                          </div>
                        </div>
                    </div>
                
    </section>

    <script src="../en/bootstrap/js/bootstrap.js"></script>
</body>
</html>