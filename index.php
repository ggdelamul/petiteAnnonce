<?php
use App\Autoloader;
use App\modeles\AnnonceModel;

require_once('Autoloader.php');
Autoloader::register();
$model = new AnnonceModel;
$annonces = $model->findBy(['actif' => 1]);
// var_dump($annonces);

$donnees = [
    'titre'=>'annonce hydrate ',
    'description'=>'description hydraté',
    'actif'=>0
];
//methode d'injection des donnée par hydratation
$annonce1 =$model ->hydrate($donnees);
var_dump($annonce1);

$model-> create($annonce1);

$annonce = $model
->setTitre('nouvelle annonce la 3')
->setDescription('consequat interdum varius sit amet mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan tortor')
->setActif(1);

$model->create($annonce);
// var_dump($annonce);