<?php

$id_pro = $_GET['pro'];//El codigo del producto extraido por URl
$documento = $_GET['doc'];//El documento del ususario extraido por URl

include ("funciones.php");//inclucion de el archivo funciones 

echo DetallesProductos($id_pro,$documento);
//Una funcion que muestra todos los detalles de los productos con mayor claridad 