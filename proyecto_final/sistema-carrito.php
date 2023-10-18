<?php

require("funciones.php");

$documento = $_GET['documento'];


if( encontrar_compras($documento) == 0 )
{
    echo("No has realizado ninguna compra<a href='sesion_inico.php?documento=$documento'>Regresar</a>");
}else 
{
    echo compra_persona($documento)."<br>";
     echo encontrar_compras($documento);

}