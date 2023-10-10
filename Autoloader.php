<?php
namespace App;
class Autoloader 
{
    static function register()
    {
         spl_autoload_register([
            __CLASS__,
            "autoload"
         ]);
    }
   static function autoload($class)
   {//on récupère la totalité du namespace de la class concerné (ex: App\client\Compte)
        // echo $class;
        //retirer le App\ ajouter le.php
        //1 on retire App\
        $class= str_replace(__NAMESPACE__ .'\\', '',$class ) ;
        // 2 on tourne les antislash
        $class = str_replace('\\', '/', $class );
        echo $class;
        //onverifie l'existence du fichier 
        $fichier= __DIR__ . '/' .$class .'.php';
        if(file_exists($fichier)){
            require_once __DIR__ . '/' .$class .'.php';
        }
        
   }
}