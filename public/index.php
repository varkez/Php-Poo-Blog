<?php
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';

App::load();

<<<<<<< HEAD
$app = App\app::getInstance();
$app->title = "Titre de test";

$app2 = App\app::getInstance();
echo $app2->title; 


var_dump($config = App\config::getInstance()->get('db_user'));
 
=======

$app = App::getInstance();

var_dump($app);
//var_dump($config);

$posts = $app->getTable('Posts');
var_dump('$posts', $posts);

var_dump($posts->all());

>>>>>>> origin/master
?>