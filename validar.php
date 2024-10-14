<?php
include_once"Conexion.php";
// Comprobar si los datos han sido enviados a través de POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recepcionar los datos usando $_POST
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password =md5(isset($_POST['password']) ? $_POST['password'] : '');
}else{
    header("login.php") ;
}

$slq = "SELECT * FROM usuarios";
$row;    
$usuarios = $conexion->query($slq);

if ($email == " " || $password == " ") {
    header("location:login.php");
}

if ($usuarios->num_rows >0) {
    while ($row = $usuarios->fetch_assoc()) {
        if ($email == $row["correo"] && $password == $row["contraseña"]) {
            session_start();
            $_SESSION['nombres'] = $row["nombres"];
            header("location:index.php");
        }else{
            header("location:login.php");
        }
    }
}else{
    header("location:login.php");
}
?>