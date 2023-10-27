<?php
require("funciones.php");//inclucion de el archivo funciones 

echo "Registrar! :)";//un mensaje que se muestra en pantalla


$nombreUsuario=$_GET['nom'];//el nombre de la persona por URL 
$correo=$_GET['cor'];//El dato del correo ingresado por URL
$clave=$_GET['cla'];//Password ingresado por URL


?>
<!-------Enlace que lleva con sigo el nombre,correo y password del usuario-----------!-->
<a href="verificacionRegistro.php?nom=<?php echo $nombreUsuario; ?>&cor=<?php echo $correo; ?>&cla=<?php echo $clave; ?>">Verificar</a>
