<?php

$documento = $_GET['doc'];//El documento del ususario extraido por URl
$buscar = $_GET['bus']; 
include("funciones.php");//inclucion de el archivo funciones 

echo MostrarNombre($documento);
//Como su nombre lo indica es una funcion para mostara el usuario
//que tenga el documento extraido por URL

echo actualizarcarro($documento);
//Esta funcion se ejecuta una sola vez verifica si el usuario existente 
//no tiene un carriro, si no tiene carro se lo asigna y si tiene no hace nada 

//hay 2 enlaces 1 para ver el carrito de compras y otro para cerrar sesion 
?> 
    <a href="perfil.php?doc=<?php echo $documento; ?>">Perfil</a><br><br>
    <a href="factura.php?doc=<?php echo $documento; ?>">Ver Compras</a><br><br>
    <a href="carritoDeCompras.php?doc=<?php echo $documento; ?>">Carrito</a><br><br>
    <a href="index.php">Cerrar sesion</a>
<?php
//como su nombre lo dice esta funcion sirve para mostrar todos los 
//productos que hayan en la base de datos.
echo MostrarProductos($documento,$buscar);

