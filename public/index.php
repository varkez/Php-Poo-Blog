<?php
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';

App::load();


$app = App::getInstance();

var_dump($app);
//var_dump($config);

$posts = $app->getTable('Posts');
var_dump('$posts', $posts);

var_dump($posts->all());

?>