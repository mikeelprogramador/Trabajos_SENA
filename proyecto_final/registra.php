<?php

require("funciones.php");

$a = $_GET['correo'];
$b = $_GET['password'];

echo existente("$a","$b");
echo id("$a")