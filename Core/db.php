<?php 
namespace App\Core;
// on importe PDO
use PDO;
use PDOException;
class Db extends PDO
{
    //instance unique de la classe
    private static  $instance;
    private const DBHOST ='localhost';
    private const DBUSER='root';
    private const DBPASS='';
    private const DBNAME='demo_poo';
 
    private function __construct()
    {
        // DSN de connexion 
        $_dsn ='mysql:dbname='. self::DBNAME . ';host='.self::DBHOST;
    //on apelle le constructeur de la classe PDO
    try {
        parent::__construct($_dsn, self::DBUSER, self::DBPASS);
        $this ->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');//commande sql qui deifnit l'encodage 
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);//retour de requete sous forme de tableau associatifs 
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//permet de gérer le renvoie d erreur 
    }catch(PDOException $e){
        die($e->getMessage());
    }
    

    }
    public static function getInstance():self//->valeur de return 
    {
        if(self::$instance === null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
}