<?php

class BD {
    //Crea una variable estática que almacena la única instancia de la conexión a la base de datos.
    public static $instancia = null;
    //Define un método estático que se utiliza para crear la instancia única de la conexión a la base de datos.

    public static $host = "localhost";
    public static $dbname = "veterinaria";
    public static $username = "root";
    public static $password = "root";

    public static function crearInstancia(){
        $host = self::$host;
        $dbname = self::$dbname;
        $username = self::$username;
        $password = self::$password;

        //Verifica si la instancia única de la conexión a la base de datos ya ha sido creada.
        if(!isset(self::$instancia)){
            //Define una opción para PDO que establece el modo de error en "excepción", lo que significa que PDO lanzará excepciones en caso de errores en lugar de simplemente mostrar un mensaje de advertencia.
            $opciones[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            //Crea una nueva instancia de la clase PDO para conectarse a una base de datos MySQL
            
            self::$instancia = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, options: $opciones);
            // echo "conectado";
        }
        return self::$instancia;
    }
}
?>