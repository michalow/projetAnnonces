<?php

abstract class Model
{
    private const HOST = 'localhost';
    private const DB = 'projet_annonces';
    private const USER = 'root';
    private const PWD = '';
    
    private static $database; //on le met en static pour qu'il soit partagé avec toutes les instances des
    // classes qui heriteront de la class Model (classes filles de Model)

    /**
     * Cette fonction sera appellée par getDatabase() la premiere fois pour
     * initialiser la connexion avec la base de données
     */
    private static function initDatabase(){
            self::$database = new PDO('mysql:host='. self::HOST . ';dbname='. self::DB,
                self::USER,
                self::PWD,
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']
            );
            //gestion des erreurs
            self::$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    //design pattern singleton
    protected function getDatabase()
    {
        // la premiere fois on initialise self::$database
        if (self::$database === null) {
            self::initDatabase();
        }
        // et on renvoie l'objet qui sert à effectuer les requêtes
        return self::$database;
    }
}

?>