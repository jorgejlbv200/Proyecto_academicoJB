<?php
/* 
*Proporcionar una plantilla de configuracion para conectar
* la base de datos de mysql.*/

/*Este archivo no contiene contraseñas reales se puede cargar el git*/ 
# Establecer la direccion del servidor mysql
$host = "127.0.0.1";
$puerto = "3306";
#Nombre de la base de datos.
$basedatos = "proyecto_academicojb";
#susuario de ejemplo en SQL 
$usuario = "Academico_user";
#Definimos una contraseña de administrador 
$contrasena = "Academico_pass";
#Retornar estos valores como si fuera un arreglo asociativo
return[
    "host" => $host,
    "port" => $puerto,
    "database" => $basedatos,
    "username" => $usuario,
    "password" => $contrasena
];