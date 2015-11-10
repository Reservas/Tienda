<html lang="en">
    <head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <title>ExamenViolacion</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
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
       <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" align="center">
        <div class="panel panel-primary">
           <h2 class="text-center" style="color:#0000;">Add product</h2>
        </div>
            <div  class="panel-body">
        <form name="agregar" action="agregar.php" method="POST">
            <div>
            <label>Name</label>
                <input type="text"  name="name" placeholder="Name of the product" autocomplete="off" required > 
            <label>Price</label>
                <input type="text" name="precio" placeholder="Price of the product" onkeypress="return soloNumeros(event)" autocomplete="off"required="" >
            <label>Amount</label>
                <input type="text" name="cantidad" placeholder="Amount of the product" onKeyPress="return soloNumeros(event)" autocomplete="off" required>

                <input type="submit" class="btn btn-success form-control btn-sm" value="Add">
            </div>
            </form>            
        </div>
           <div>
               <h2 class="text-center" style="color:#0000;"> Edit product</h2>
               
               <div>
               <form name="edit" action="modificar.php" method="post">
                   <div>
                   <label>Name</label>
                       <input type="text" name="name" placeholder="Edit Name of the product" autocomplete="off" required>
                   <label>Price</label>
                       <input type="text" name="precio" placeholder="Edit Price of the product" autocomplete="off" onKeyPress="return soloNumeros(event)" required>
                       <label>Amount</label>
                       <input type="text" name="cantidad" placeholder="Edit Amount of the product" autocomplete="off" onKeyPress="return soloNumeros(event)" required="">
                       
                       <input type="submit" class="btn btn-success form-control btn-sm" value="Modify">
                       
                   </div>
                   </form>
               </div>
            </div>
           <div> 
               <h2 class="text-center" style="color:#0000;">Delete product</h2>
               <div>
               <form name="eliminar" action="eliminar.php" method="post">
                   <div>
                   <label>Name</label>
                       <input type="text" name="name" placeholder="Write what product you want to remove" autocomplete="om"  required>
                   
                   
                       <input type="submit" class="btn btn-success form-control btn-sm" value="Delete">
                   </div>
                   </form>
               </div>
        </div>
          <div>
           <h2 class="text-center" style="color:#0000;">List of product</h2>
           </div> 
           <div>
           <form name="mostrar" action="mostrar.php" method="post">
               <div>
               <label>Name</label>
                   <input type="list" name="name" autocomplete="off" required>
                   
               </div>
               
               </form>
           </div>
</div>
        </div>
    </section>
    
    
    
    
        <script src="../bootstrap/js/bootstrap.js"></script>
    </body>
</html>