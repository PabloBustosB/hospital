<?php
session_start();
include "cconsultas.php";
$res = new Controler;
$path = "imagenes/" . basename($_FILES['foto']['name']);
if (move_uploaded_file($_FILES['foto']['tmp_name'], $path)) {
    $response = $res->login($_POST["username"], $path);
    // echo $response["nombre"];
    $_SESSION['nombre'] = $response["nombre"];
    $_SESSION['email'] = $response["email"];
    $_SESSION['usuario'] = $response["usuario"];
    $_SESSION['tipo'] = $response["tipo"];
    $_SESSION['foto'] = $response["imagen"]["secure_url"];
    header("Location: http://localhost/hospital_parcial2/home.php");
} else {
    echo "El archivo no se ha subido correctamente";
}