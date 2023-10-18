<?php

$nombre = $_GET['nombre'];
?>

<a href="usuario.php?nombre=<?php echo $nombre; ?>">ver usuario</a>
<a href="eliminar.php?nombre=<?php echo $nombre; ?>">eliminar</a>