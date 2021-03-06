<?php
 session_start();
 include "../conexion.php";
if(isset($_GET["id_producto"]))
{

    $idr = $_GET["id_producto"];

      $db = new PDO("mysql:host=". $hostname . ";dbname=". $database, $username, $password);
      //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $db->prepare("INSERT INTO cart VALUES(NULL,:user, :producto)");
      $stmt->bindParam(':user',$_SESSION['id'], PDO::PARAM_STR);
      $stmt->bindParam(':producto',$idr, PDO::PARAM_STR);
      $stmt->execute();
  }elseif (isset($_GET["cmd"]) && isset($_GET["id"])) {
    $idr=$_GET["id"];
    $query2 = "DELETE FROM cart WHERE id = '$idr'";
    $resultado2 = mysqli_query($conexion,$query2);
    if($resultado2)
    {
        echo "<script>alert('El producto se  elimino exitosamente')</script>";
echo"<script>location.href='index.php'</script>";
    }
  }
  else{

    if(isset($_SESSION['id'])) {
      $nohayCompras = 1;
    }
    else {
      # code...
      $nohayCompras = 0;
    }


  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ShoppingCart</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../bootstrap/css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ShoppingCart</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
<?php
if ($nohayCompras==0) {
  echo "<h1>No hay productos agregados</h1>";
}
else {
  $query = "SELECT a.id,a.producto,b.id_producto,b.nombre FROM `cart` a join `producto` b on a.producto=b.id_producto WHERE user=".$_SESSION['id'];
  $resultado = mysqli_query($conexion,$query);
  $total = mysqli_num_rows($resultado);
  while($row = mysqli_fetch_array($resultado))
  {



?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4><a href="#"><?php echo $row['nombre'];?></a></h4>
                                <a href='cart.php?cmd=eliminar&id=<?php echo $row['id'] ?>'><span class='glyphicon glyphicon-erase' aria-hidden='true'></span>Eliminar</a>
                            </div>
                        </div>
                    </div>
<?php }}?>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
