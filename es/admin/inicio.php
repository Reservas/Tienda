<html lang="en">
    <head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <title>ExamenViolacion</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
    </head>
    
<body>
    <section>
                                    <script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}
</script>
    <div>
       <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="panel panel-primary">
           <h2 class="text-center" style="color:#0000;">Agregar producto</h2>
        </div>
            <div  class="panel-body">
        <form name="agregar" action="agregar.php" method="post">
            <div>
                <label>ID</label>
                <input type="text" name="id_producto" placeholder="ID del producto" autocomplete="off" required="">
            <label>Nombre</label>
                <input type="text"  name="name" placeholder="Nombre del producto" autocomplete="off" required > 
            <label>Precio</label>
                <input type="text" name="precio" placeholder="PRecio del producto" onkeypress="return soloNumeros(event)" autocomplete="off"required="" >
            <label>Cantidad</label>
                <input type="text" name="stock" placeholder="Cantidad del producto" onKeyPress="return soloNumeros(event)" autocomplete="off" required>

                <input type="submit" class="btn btn-success form-control btn-sm" value="Agregar">
            </div>
            </form>            
        </div>
           <div>
               <h2 class="text-center" style="color:#0000;">Edita el producto</h2>
               
               <div>
               <form name="edit" action="modificar.php" method="post">
                   <div>
                   <label>Nombre</label>
                       <input type="text" name="name" placeholder="Edite el nombre del producto" autocomplete="off" required>
                   <label>Precio</label>
                       <input type="text" name="precio" placeholder="Edite el precio del producto" autocomplete="off" onKeyPress="return soloNumeros(event)" required>
                       <label>Cantidad</label>
                       <input type="text" name="stock" placeholder="Edite la cantidad del producto" autocomplete="off" onKeyPress="return soloNumeros(event)" required="">
                       
                       <input type="submit" class="btn btn-success form-control btn-sm" value="Modificar">
                       
                   </div>
                   </form>
               </div>
            </div>
           <div> 
               <h2 class="text-center" style="color:#0000;">Elimine un producto</h2>
               <div>
               <form name="eliminar" action="eliminar.php" method="post">
                   <div>
                   <label>Nombre</label>
                       <input type="text" name="name" placeholder="Escribe el  nombre del producto que desea eliminar" autocomplete="om"  required>
                   
                   
                   <input type="submit" class="btn btn.success form-control btn-sm" value="Eliminar">
                   </div>
                   </form>
               </div>
        </div>
          <div>
           <h2 class="text-center" style="color:#0000;">Lista de productos</h2>
           </div> 
           <div>
           <form name="mostrar" action="mostrar.php" method="post">
               <div>
               <label>Nombre</label>
                   <input type="list" name="name" autocomplete="off" required>
                   
               </div>
               
               </form>
           </div>
</div>
        </div>
    </section>
    
    
    
    
        <script src="docs/js/bootstrap.js"></script>
    </body>
</html>