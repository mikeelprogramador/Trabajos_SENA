<?php 

$documento = $_GET['doc'];//El documento del ususario extraido por URl
include("funciones.php");//inclucion de el archivo funciones 

echo MostrarNombre($documento);
//Como su nombre lo indica es una funcion para mostara el usuario
//que tenga el documento extraido por URL
echo "Tu carrito de compras";
//mensaje que se muestra en pantalla
echo MostrarCarrito($documento);
//funcion para mostrar las compras que haya echo el usuario 
//tambie se pueden eliminar articulos agregados


