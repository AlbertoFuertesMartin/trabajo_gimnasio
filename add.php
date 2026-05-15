<?php
$conexion = mysqli_connect("localhost", "root", "", "gimnasio");

if (isset($_POST['enviar'])) {
    $id_p = $_POST['persona'];
    $id_c = $_POST['clase'];
    mysqli_query($conexion, "INSERT INTO asiste (id_persona, id_clase) VALUES ('$id_p', '$id_c')");
    header("Location: index.php");
}

$personas = mysqli_query($conexion, "SELECT DNI_NIE, Nombre_Persona FROM persona");
$clases = mysqli_query($conexion, "SELECT id, Nombre_Clase FROM clase");
?>

<form method="POST">
    Alumno: <select name="persona">
        <?php while($p = mysqli_fetch_assoc($personas)) { ?>
            <option value="<?php echo $p['DNI_NIE']; ?>"><?php echo $p['Nombre_Persona']; ?></option>
        <?php } ?>
    </select><br>
    Clase: <select name="clase">
        <?php while($c = mysqli_fetch_assoc($clases)) { ?>
            <option value="<?php echo $c['id']; ?>"><?php echo $c['Nombre_Clase']; ?></option>
        <?php } ?>
    </select><br>
    <input type="submit" name="enviar" value="Guardar">
</form>