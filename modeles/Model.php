<?php
namespace App\modeles;
use App\Db\Db;
//correspond au repositery de symfony
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
        //  var_dump($champs);
        //  var_dump($valeurs);
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

    public function create(Model $model)
    {
        $champs = [];
        $inter =[];//element champs dans la table
        $valeurs = [];
        //on boucle pour éclater le tableau 
        foreach($model as $champ => $valeur){
          //insert into annonce (titre, description,
           //actif ) VALUES (?,?,?)
           if($valeur !=null && $champ != 'db' && $champ !='table'){
            $champs[] = $champ ;
            $inter[]="?";
            $valeurs[] = $valeur;
           }  
        }
        //  var_dump($champs);
        //  var_dump($valeurs);
         //on transforme le tableau champs en une chaine de caractère 
         $liste_champ = implode(', ', $champs);//permet de tranformer le tableau en chaine de caractère
         $liste_inter =implode(', ' , $inter);
         //echo ($liste_champ) ; die($liste_inter);
         //on execute la requete 
         return $this->myQuery('INSERT INTO '.$this-> table .' (' . $liste_champ . ') VALUES('. $liste_inter.')', $valeurs);
    }
    //methode pour hydrater un model annonces 
    public function hydrate(array $donnees)
    {
        foreach($donnees as $key => $value)
        {
            //on récupère le nom du setteur correspondant à la clé key
            //titre -> setTitre
            $setter = 'set'.ucfirst($key);//methode pour mettre une majuscule à la première lettre 
            //on verifie si le setteur existe 
            if(method_exists($this, $setter))
            {
                //on apelle le setter 
                $this -> $setter($value);
            } 
        }
        return $this;
    }
    /////////////////////////UPDATE////////////////////////
public function update(int $id , Model $model)
    {
        $champs = [];
        $valeurs = [];
        //on boucle pour éclater le tableau 
        foreach($model as $champ => $valeur){
          //UPDATE annonce SET titre=?, description=? , actif=? WHERE id=?
           
           if($valeur !=null && $champ != 'db' && $champ !='table'){
            $champs[] = "$champ = ?" ;
            $valeurs[] = $valeur;
           }  
        }
        $valeurs[]=$id;
        //  var_dump($champs);
        //  var_dump($valeurs);
         //on transforme le tableau champs en une chaine de caractère 
         $liste_champ = implode(', ', $champs);//permet de tranformer le tableau en chaine de caractère
         //echo ($liste_champ) ; die($liste_inter);
         //on execute la requete 
         return $this->myQuery('UPDATE '.$this-> table.' SET ' . $liste_champ . ' WHERE id = ? ', $valeurs);
    }
    /////////////////////////DELETE////////////////////////
    public function delete(int $id)
    {
        return $this->myQuery("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
    //methode interne a model ////////////////////////////
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