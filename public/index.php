<?php

require '../app/Autoloader.php';
App\Autoloader::register();

$app = App\app::getInstance();
$app->title = "Titre de test";

$app2 = App\app::getInstance();
echo $app2->title; 


var_dump($config = App\config::getInstance()->get('db_user'));


?>