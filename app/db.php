<?php
#Archivo que establezca la conexion entre mysql y config.php

#Tarea 1: Cargar configuracion
$config = require __DIR__ . "/config.php";
#Tarea 2: construir el Data Source Name (DSN)
#aqi contiene el controlador, el host, base de datos, codificacion
$dsn = "mysql:host={$config['host']};"
     . "port={$config['port']};"
     . "dbname={$config['database']};"
     . "charset=utf8mb4";

#Tarea 3: Configuracion del PDO
#ERRMORE_EXCEPTION: 
#Permite manejar los errores mediantes excepciones. 

#FETCH_ASSOC: Devolver filas como arreglos asociativos
#EMUKATE_PREPARES = False:
#Me permite utilizar consultas preparadas nativas 
# cuando el controladro lo permita.
# " :: " es un operador de resolucion que me permite acceder 
#constantes, metodos, propiedades de una clase.
# "=> " Operador de asociacion, relaciona uan clave valor dentro 
# de una rreglo asociativo.

$opciones = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];
# Paso4: necesito establecer conexion
# Utilizamos new PDO para crear el objeto de conexion con los
#parametros configirados.
try {
     $conexion = new PDO(
          $dsn,
          $config['username'],
          $config['password'],
          $opciones
     );
} catch (PDOException $error) {
     /*Registar el error tecnico en el servidor
     sin mostar credenciales al usuario*/
     error_log(
     "Error de conexion en MySql: "
     . $error->getMessage()
     );

     /*Interrumpir la ejecucion al servidor si
     falla la conexion con la base de datos*/
     throw new RuntimeException(
          "No fue posible conectar con la base de datos");
}
/* Paso 5. devolver el objeto PDO.
si se requiere usar esta conexion, utilizamos "require"*/
return $conexion; 

