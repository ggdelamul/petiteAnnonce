<?php
use App\Autoloader;
use App\modeles\AnnonceModel;

require_once('Autoloader.php');
Autoloader::register();

$model = new AnnonceModel;
// $annonces = $model->findBy(['actif' => 1]);
$annonce = $model
->setTitre('nouvelle annonce la 3')
->setDescription('consequat interdum varius sit amet mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan tortor');
var_dump($annonces);