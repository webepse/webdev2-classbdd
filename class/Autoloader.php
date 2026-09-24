<?php
namespace App;
/**
 * autoload des fichiers class
 * @package App
 */
class Autoloader{
    /**
     * fonction register - automatise les chargements de fichier class
     *
     * @return void
     */
    public static function register(): void
    {
        spl_autoload_register([__CLASS__,'autoload']);
    }

    /**
     * fonction permettant de charger le fichier dans le bon dossier
     *
     * @param string $class Le nom de la classe à charger
     * @return void
     */
    public static function autoload(string $class): void
    {
        //var_dump($class);
        if(strpos($class, __NAMESPACE__."\\") === 0){
            $class = str_replace(__NAMESPACE__."\\","", $class);
            $class = str_replace("\\","/",$class);
            //var_dump('class/'.$class.".php");
            require_once __DIR__."/".$class.".php";
        }
    }


}
