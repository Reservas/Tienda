<?php
	session_start();
	include "../conexion.php";
 
	
	$db = new PDO("mysql:host=". $hostname . ";dbname=". $database, $username, $password);
	$date = date("Y-m-d H:i:s");
	try{
		//CREAR FACTURA
		$db->beginTransaction();
		$stmt = $db->prepare("INSERT INTO factura VALUES(NULL,:cliente, :fecha)");
		$stmt->bindParam(':cliente',$_SESSION['id'], PDO::PARAM_STR);
		$stmt->bindParam(':fecha',$date, PDO::PARAM_STR);
		$stmt->execute();
		$lastId = $db->lastInsertId();
		
		//LLENAR DETALLES
		$stmt2 = $db->prepare("SELECT `cart`.`cantidad`,`producto`.`id_producto`, `producto`.`precio`  FROM `cart` INNER JOIN `producto` ON `cart`.`producto` = `producto`.`id_producto` WHERE `cart`.`user`=:user");
		$stmt2->bindParam(':user',$_SESSION['id'], PDO::PARAM_STR);
		$stmt2->execute();
		while($row=$stmt2->fetch(PDO::FETCH_OBJ)) {
			$stmt3 = $db->prepare("INSERT INTO `detalle`(`id_factura`, `id_producto`, `cantidad`, `precio`) VALUES (:idfactura, :idproducto, :cantidad, :precio)");
			$stmt3->bindParam(':idfactura',$lastId, PDO::PARAM_STR);
			$stmt3->bindParam(':idproducto',$row->id_producto, PDO::PARAM_STR);
			$stmt3->bindParam(':cantidad',$row->cantidad, PDO::PARAM_STR);
			$stmt3->bindParam(':precio',$row->precio, PDO::PARAM_STR);
			$stmt3->execute();
			//ACTUALIZAR STOCK
			$stmt5 = $db->prepare("UPDATE `producto` SET `stock`= `stock` - :cantidad WHERE `id_producto` = :idproducto");
			$stmt5->bindParam(':cantidad',$row->cantidad, PDO::PARAM_STR);
			$stmt5->bindParam(':idproducto',$row->id_producto, PDO::PARAM_STR);
			$stmt5->execute();
			
		}
		//LIMPIAR CARRITO
		$stmt4 = $db->prepare("DELETE FROM `cart` WHERE `user` = :user");
		$stmt4->bindParam(':user',$_SESSION['id'], PDO::PARAM_STR);
		$stmt4->execute();
		$db->commit();     		
		echo "OK";
	}catch(PDOException $e)
    {
        $db->rollBack();
		echo $e;
    }    
 
 ?>