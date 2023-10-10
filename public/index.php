<?php
use App\Autoloader;
use App\Core\Main;
// Définissez la constante ROOT pour pointer vers la racine du projet
define('ROOT', dirname(__DIR__));
// Remplacez les barres obliques par des barres obliques inversées pour Windows
require_once ROOT . '\Autoloader.php';

// Enregistrez l'autoloader
Autoloader::register();
// On instancie Main (routeur)
$app = new Main();

//On demarre l'application 
$app->start();




// use App\Autoloader;
// use App\modeles\AnnonceModel;
// use App\modeles\UsersModel;

// require_once('Autoloader.php');
// Autoloader::register();
// $model = new AnnonceModel;
// $annonces = $model->findBy(['actif' => 1]);
// // var_dump($annonces);

// $donnees = [
//     'titre'=>'annonce update ',
//     'description'=>'description update',
//     'actif'=>0
// ];
// //methode d'injection des donnée par hydratation
// $annonce1 = $model ->hydrate($donnees);
// var_dump($annonce1);

// $model-> update(2,$annonce1);

// // $annonce = $model
// // ->setTitre('nouvelle annonce la 3')
// // ->setDescription('consequat interdum varius sit amet mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan tortor')
// // ->setActif(1);
// // $model->create($annonce);
// // var_dump($annonce);

// $model->delete(13);

// $model = new UsersModel;
// var_dump($model);

// $users = $model
// ->setEmail('contact@gmail.com')
// ->setPassword(password_hash('azerti', PASSWORD_ARGON2I));
// $model->create($users);