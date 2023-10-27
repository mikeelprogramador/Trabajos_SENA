<?php 


echo "Inicia Sesion";//un mensaje que se muestra en pantalla
$correo= $_GET['cor'];//El dato del correo ingresado por URL
$clave= $_GET['cla'];//Password ingresado por URL



?>
<!-------Enlace que lleva con sigo la informasion suministrada por la persona--------!-->
<a href="verificarSesion.php?cor=<?php echo $correo; ?>&cla=<?php echo $clave; ?>">Verificar</a>