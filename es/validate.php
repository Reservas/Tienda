<?php
session_start();
require_once "conexion.php";
$noexist = false;
if(isset($_POST['user']))
{
    try
    {
        $md5 = md5($_POST['pass']);
        $db = new PDO("mysql:host=". $hostname . ";dbname=$database", $username, $password);
        $stmt = $db->prepare("SELECT * FROM `cliente` WHERE `user`  = :user AND `pass` = :pass");
        $stmt->bindParam(':user',$_POST['user'], PDO::PARAM_STR);
        $stmt->bindParam(':pass', $md5, PDO::PARAM_STR);
        $stmt->execute();
        $noexist = true;
            if($result = $stmt->fetchAll()) {
                foreach($result as $row){
                    switch($row['status'] ){
                        case 1:
                        header("location:./user/inicio.php");
                        $_SESSION['user'] = $row['user'];
                         $_SESSION['id'] = $row['id'];
                        exit();
                        case 0:
                        header("location: ./inicio.php");
                        $_SESSION['error'] = 1;
                        exit();
                    }
                }
            }else{
	           header("location: ./inicio.php");
               $_SESSION['error'] = 1;
	           exit();
            }
        
        $db = null; 
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>