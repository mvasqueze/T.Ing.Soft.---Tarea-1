
<?php
    $server='localhost';
    $username='root';
    $password='';
    $database='registro_login_db';

    try{
        $conn=new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    }catch(PDOException $e){
        die("Conexión fallida con la base de datos: ".$e->getMessage());
    }

?>