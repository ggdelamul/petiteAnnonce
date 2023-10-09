<?php
namespace App\modeles;
class AnnonceModel extends Model 
{
     //AJOUT DES CHAMPS DE FORMULAIRE POUR LE CREATE 
        protected $id;
        protected $titre;
        protected $description;
        protected $date_publication;
        protected $actif;
    public function __construct()
    {
        $this->table= ' annonce';//attention a l'espace
    }
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }
        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
        /**
         * Get the value of titre
         */ 
        public function getTitre()
        {
                return $this->titre;
        }
        /**
         * Set the value of titre
         *
         * @return  self
         */ 
        public function setTitre($titre)
        {
                $this->titre = $titre;

                return $this;
        }
        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }
        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }
        /**
         * Get the value of date_publication
         */ 
        public function getDate_publication()
        {
                return $this->date_publication;
        }
        /**
         * Set the value of date_publication
         *
         * @return  self
         */ 
        public function setDate_publication($date_publication)
        {
                $this->date_publication = $date_publication;

                return $this;
        }
         /**
         * Get the value of actif
         */ 
        public function getActif()
        {
                return $this->actif;
        }
        /**
         * Set the value of actif
         *
         * @return  self
         */ 
        public function setActif($actif)
        {
                $this->actif = $actif;

                return $this;
        }
}