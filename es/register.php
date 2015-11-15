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
        <h2 class="text-center" style="color:#fff;">Registrate</h2>
      </div>
      <div class="panel-body">
        <form name="register" action="registerPOST.php" method="post">
          <div class="col-md-offset-0 col-md-12">
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
<script src="../en/bootstrap/js/bootstrap.js"></script>
</body>
</html>
