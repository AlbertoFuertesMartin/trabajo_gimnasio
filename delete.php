<?php
$conexion = mysqli_connect("localhost", "root", "", "gimnasio");

$id_p = $_GET['id_p'];
$id_c = $_GET['id_c'];

mysqli_query($conexion, "DELETE FROM asiste WHERE id_persona = '$id_p' AND id_clase = '$id_c'");

header("Location: index.php");
?>