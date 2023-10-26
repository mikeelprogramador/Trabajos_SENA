<?php

$id_pro = $_GET['pro'];
$documento = $_GET['doc'];

include("funciones.php");

echo DetallesProductos($id_pro,$documento);