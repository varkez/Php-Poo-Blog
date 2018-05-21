<?php
    use App\App;
    use App\Table\Article;
    use App\Table\Categorie;

    $post = Article::find($_GET['id']);
    if($post === false){
        App::notFound();
    }

    App::setTitle($post->titre);
    


//$post = App\App::getDatabase()->prepare(
    //'SELECT * FROM articles WHERE id = ?', [$_GET['id']], 'App\Table\Article', true);

?>

<h1><?= $post->titre; ?></h1>

<p><em><?= $post->categorie; ?></em></p>

<p><?= $post->contenu; ?></p>