<?php
$postTable = App::getInstance()->getTable('Post');
var_dump($postTable);
if(!empty($_POST)){
    $result = $postTable->create($_GET['id'], [
          'titre'       => $_POST['titre'],
          'contenu'     => $_POST['contenu'],
          'category_id' => $_POST['category_id']     
    ]);
    if($result){
        ?>
        <div class="alert alert-success">L'article a bien été ajouté</div>
        <?php
    }
}


$categories = App::getInstance()->getTable('Category')->extract('id', 'titre');
$form = new \Core\HTML\BootstrapForm($_POST);
?>


<form action="" method="post">
<button class="btn btn-primary">Sauvegarder</button>
      <?= $form->input('titre', 'Titre de l\'article'); ?>
      <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
      <?= $form->select('category_id', 'Catégorie', $categories); ?>
      

</form>