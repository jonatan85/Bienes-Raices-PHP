<!-- Cerramos la sesion -->

<?php

// Iniciamos la session y la cerramos con un arreglo vacio
session_start();

// La iniciamos y la reescribimos con un arreglo vacio al hacer click sobre cerrar sesion
$_SESSION = [];

// Redirigimos a el usuario hacia la raiz de el proyecto
header('Location: /');