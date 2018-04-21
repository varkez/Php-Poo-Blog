<?php
    use App\App;
    use App\Table\Categorie;
    use App\Table\Article;

    $categorie = Categorie::find($_GET['id']);
    if($categorie === false){
        App::notFound();
    }
    $articles = Article::lastByCategory($_GET['id']);
    $categories = Categorie::All();
?>

<h1>Catégorie : <?= $categorie->titre ?></h1>

<div class="row">
    <div class="col-sm-8">

    <?php foreach($articles as $post): ?>

    <?php //var_dump($post); ?>


            <h2><a href="<?= $post->pppppp ?>"><?= $post->titre; ?></a></h2>

            <h2><a href="<?= $post->url ?>"><?= $post->titre; ?></a></h2>

            <p><em><?= $post->categorie; ?></em></p>

            <p><?= $post->extrait; ?></p>

        <?php endforeach; ?>
    </div>

    <div class="col-sm-4">

        <ul>

        <?php foreach(\App\Table\Categorie::all() as $categorie): ?>
            
            <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>
            
        <?php endforeach; ?>
        </ul>
        
    </div>
</div>