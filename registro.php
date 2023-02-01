<?php
require "db.php";
$mensaje='';

if(!empty($_POST['nombre'])&&!empty($_POST['apellido1'])&&!empty($_POST['apellido2'])&&!empty($_POST['correo'])&&!empty($_POST['pass'])){
 $sql="INSERT INTO usuarios (nombre, apellido1, apellido2, correo, pass) VALUES (:nombre, :apellido1, :apellido2, :correo, :pass)";
 $statmnt= $conn->prepare($sql);
 $statmnt->bindParam(":nombre", $_POST['nombre']);
 $statmnt->bindParam(":apellido1", $_POST['apellido1']);
 $statmnt->bindParam(":apellido2", $_POST['apellido2']);
 $statmnt->bindParam(":correo", $_POST['correo']);
 $password=password_hash($_POST['pass'], PASSWORD_BCRYPT);
 $statmnt->bindParam(":pass", $password);

 if($statmnt->execute()){
    $mensaje="El usuario se creó correctamente.";
 } else {
    $mensaje="El usuario no pudo ser creado.";
 }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registro</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <?php if(!empty($mensaje)): ?>
        <p><?= $mensaje ?></p>
        <?php endif; ?>
        <h1>Regístrate</h1>
        <form action="registro.php" method="post">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="apellido1" placeholder="Primer apellido">
            <input type="text" name="apellido2" placeholder="Segundo apellido">
            <input type="text" name="correo" placeholder="Correo">
            <input type="password" name="pass" placeholder="Contraseña">
            <input type="submit" value="Registrarme">
        </form>
    </body>
</html>