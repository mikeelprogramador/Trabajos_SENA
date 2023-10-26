<?php 


echo "Inicia Sesion";
$correo= $_GET['cor'];
$clave= $_GET['cla'];



?>
<a href="verificarSesion.php?cor=<?php echo $correo; ?>&cla=<?php echo $clave; ?>">Verificar</a>