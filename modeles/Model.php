<?php
namespace App\modeles;
use App\Db\Db;

class Model extends Db
{
    //table de la base de donnée 
    protected $table;
    // instance de Db 
    private $db ; 


    ////////////////realisation du crud////////////////////
    //////////////////////////READ/////////////////////////
    public function findAll()
    {
        $query = $this->myQuery('SELECT * FROM'. $this->table);
        return $query->fetchAll();
    }
    //recupérer une annonce selon un tableau de critère colonne valeur 
    public function findBy(array $criteres)
    {
        $champs = [];
        $valeurs = [];
        //on boucle pour éclater le tableau 

        foreach($criteres as $champ => $valeur){
            //select * from annonce where actif = ? 
            //bindValue(1, valeur);
            $champs[] = "$champ = ? ";
            $valeurs[] = $valeur;
           
        }
         var_dump($champs);
         var_dump($valeurs);
         //on transforme le tableau champs en une chaine de caractère 
         $liste_champ = implode('', $champs);//permet de tranformer le tableau en chaine de caractère
         var_dump($liste_champ);
         //on execute la requete 
         return $this->myQuery('SELECT * FROM '.$this-> table .' WHERE ' . $liste_champ , $valeurs)->fetchAll();
    }
    //récupérer une annonce par son id 
    public function find(int $id)
    {
        return $this->myQuery("SELECT * FROM $this->table WHERE id = $id")->fetch();//méthode double quote 
    }
    /////////////////////////CREATE////////////////////////













    //methode interne a model 
  public function myQuery( string $sql, array $attributs = null)
    {
        //on recupère l'instance de db  
       $this->db = Db::getInstance();
       // on verifie s'il y  a des attributs 
       if(/*$attributs != null*/!is_null($attributs))
       {
        //requete préparé 
        $query=$this-> db ->prepare($sql);
        $query->execute($attributs);
        return $query;
    }else{
        //requete non prpéaré 
        return $this->db->query($sql);
       }
    }
}