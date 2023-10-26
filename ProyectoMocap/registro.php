<?php
require("funciones.php");
echo "Registrar! :)";


$nombreUsuario=$_GET['nom'];//el nombre del doliente
$correo=$_GET['cor'];//el correo del doliente
$clave=$_GET['cla'];//la clave del doliente


?>

<a href="verificacionRegistro.php?nom=<?php echo $nombreUsuario; ?>&cor=<?php echo $correo; ?>&cla=<?php echo $clave; ?>">Verificar</a>
