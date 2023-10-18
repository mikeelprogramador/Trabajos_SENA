<?php

require("funciones.php");

$documento = $_GET['documento'];

 echo consultar_personas($documento);

