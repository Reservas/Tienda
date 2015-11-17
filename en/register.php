<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="" />
    <title>ExamenViolacion</title>
    <link href="../en/bootstrap/css/bootstrap.css" rel="stylesheet" />

</head>
<body>
    <section>
            <div class="row">
<div class="col-md-offset-4 col-md-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h2 class="text-center" style="color:#fff;">Register</h2>
      </div>
      <div class="panel-body">
        <form name="register" action="registerPOST.php" method="post">
          <div class="col-md-offset-0 col-md-12">
            <label>Username</label>
            <input type="text" class="form-control input-sm" name="user" placeholder="Username" autocomplete="off" required >
            <label>Password</label>
            <input type="password" class="form-control input-sm" name="pass" placeholder="Password" autocomplete="off" required pattern=".{6,12}"   required title="6 caractères como mìnimo ">
                <label>Name</label>
            <input type="text" class="form-control input-sm" name="nombre" placeholder="Name" autocomplete="off" required
            onkeypress="return alpha(event)" >
            <label>Last name</label>
            <input type="text" class="form-control input-sm" name="apellido" placeholder="Last bane" autocomplete="off" required
            onkeypress="return alpha(event)" >
            <label>Address</label>
            <input type="text" class="form-control input-sm" name="Address" placeholder="Dirección" autocomplete="off" required>
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
            <input type="date" class="form-control input-sm" name="fecha_nac" placeholder="Birthday" autocomplete="off" required onkeypress="compruebaFecha">
            <label>Telephone</label>

            <input type="text" class="form-control input-sm" name="telefono" maxlength="8" placeholder="7*******" autocomplete="off" required
            onKeyPress="return soloNumeros(event)"required="" pattern="7[0-9]{7}">


            <label>E-mail</label>
            <input type="text" class="form-control input-sm" name="email" placeholder="E-mail" autocomplete="off" required>
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
<script src="../en/bootstrap/js/bootstrap.js"></script>
</body>
</html>
