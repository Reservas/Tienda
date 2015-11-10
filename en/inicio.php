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
<body>
    <section>
            <div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

                            <h2 class="text-center" style="color:#0000;">Clients</h2>

                          <div class="panel-body">
                            <form action="validate.php" method="post">
                              <label>Username</label>
                              <input type="text"  class="form-control input-sm" id="user" name="user" placeholder="Username" autocomplete="off" required  > 
                              <label>Password</label>
                              <input type="password"  class="form-control input-sm" name="pass" placeholder="Password" autocomplete="off" required>
                              <?php
                                if(isset($_SESSION['error'])) 
                                {
                                    $error = $_SESSION['error'];
                                    if ($error == 1) 
                                    {
                                        echo '
                                            <div class="alert alert-dismissible alert-danger">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                User or password incorrect
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
                                            
                          <div class="panel-footer">
                              <a><input type="button" id="airlbtn" class="btn btn-success btn-xs" value="Inicio de sesion" style="width:100%;"></a>
                          </div>
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
                            <h2 class="text-center" style="color:#fff;">Register</h2>
                          </div>
                          <div class="panel-body">
                            <form name="register" action="register.php" method="post">
                              <div class="col-md-10"> 
                                <label>Username</label>
                                <input type="text" class="form-control input-sm" name="user" placeholder="Username" autocomplete="off" required > 
                                <label>Password</label>
                                <input type="password" class="form-control input-sm" name="pass" placeholder="Password" autocomplete="off" required pattern=".{6,12}"   required title="6 caractères como mìnimo ">  
                                    <label>Name</label>
                                <input type="text" class="form-control input-sm" name="nombre" placeholder="Name" autocomplete="off" required
                                onkeypress="return alpha(event)" > 
                                <label>Last name</label>
                                <input type="text" class="form-control input-sm" name="apellido" placeholder="Last name" autocomplete="off" required
                                onkeypress="return alpha(event)" > 
                                <label>Address</label>
                                <input type="text" class="form-control input-sm" name="address" placeholder="Address" autocomplete="off" required> 
                                <label>Birthday</label>
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
                                <input type="date" class="form-control input-sm" name="nac" placeholder="Birthday" autocomplete="off" required onkeypress="compruebaFecha"> 
                                <label>Phone</label>
                                  
                                <input type="text" class="form-control input-sm" name="phone" maxlength="8" placeholder="7*******" autocomplete="off" required
                                onKeyPress="return soloNumeros(event)"required="" pattern="7[0-9]{7}"> 
                              </div>
                              <div class="col-md-6">
                                <label>E-mail</label>
                                <input type="text" class="form-control input-sm" name="mail" placeholder="E-mail" autocomplete="off" required> 
                                <label>Category</label>
                                <input type="text" class="form-control input-sm" name="categoria" placeholder="Category" autocomplete="off" required> 
                              </div>
                          </div> 
                          <div class="panel-footer">
                              <input type="submit" class="btn btn-success form-control btn-sm" value="Register">
                            </form>
                          </div>
                        </div>
                    </div>
                
    </section>

    <script src="../en/bootstrap/js/bootstrap.js"></script>
</body>
</html>