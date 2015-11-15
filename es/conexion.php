<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'tienda';
    $conexion = mysqli_connect($hostname, $username, $password);
    mysqli_select_db($conexion, $database);
?>
