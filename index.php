<?php
$conexion = mysqli_connect("localhost", "root", "", "gimnasio");

$sql = "SELECT persona.Nombre_Persona, clase.Nombre_Clase, asiste.id_persona, asiste.id_clase 
        FROM asiste 
        INNER JOIN persona ON asiste.id_persona = persona.DNI_NIE 
        INNER JOIN clase ON asiste.id_clase = clase.id";

$resultado = mysqli_query($conexion, $sql);
?>

<h1>Lista de Asistencias</h1>

<table border="1">
    <tr>
        <th>Alumno</th>
        <th>Clase</th>
        <th>Acciones</th>
    </tr>

    <?php while($fila = mysqli_fetch_assoc($resultado)) { ?>
    <tr>
        <td><?php echo $fila['Nombre_Persona']; ?></td>
        <td><?php echo $fila['Nombre_Clase']; ?></td>
        <td>
            <a href="delete.php?id_p=<?php echo $fila['id_persona']; ?>&id_c=<?php echo $fila['id_clase']; ?>">Borrar</a>
        </td>
    </tr>
    <?php } ?>
</table>

<br>
<a href="add.php">Añadir Nueva Asistencia</a>