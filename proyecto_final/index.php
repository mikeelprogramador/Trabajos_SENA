<?php
//$correo = $_GET['correo'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mi Página Web</title>
    <link rel="stylesheet" href="stile.css">
    <script>
        function toggleMenu() {
            var menuOptions = document.querySelector(".menu-options");
            menuOptions.style.display = menuOptions.style.display === "none" ? "block" : "none";
        }
    </script>
</head>
<body>
    <div class="menu">
        <button class="menu-button" onclick="toggleMenu()">Menú</button>
        <img src="tu_imagen.png" alt="Imagen a la izquierda" style="width: 40px; height: 40px;">
        <div class="menu-options">
            <button>Iniciar</button>
            <button>Ver</button>
            <button>Salir</button>
        </div>
        <input type="text" class="search-bar" placeholder="Buscar...">
        <div class="user-avatar"></div>
        <span class="cart-icon"><a href="carrito.php?correo=<?php $a?>">&#128722;</a></span>
    </div>
    <!-- El contenido de tu página iría aquí -->
</body>
</html>
