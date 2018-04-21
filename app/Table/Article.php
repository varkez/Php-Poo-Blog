<?php
namespace App\Table;

use App\App;

class Article extends Table{


    protected static $table = 'articles';

    public function getURL(){
        return 'index.php?p=article&id=' . $this->id;
    }

    public static function lastByCategory($category_id){
        return self::query(
            "SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie
            FROM articles
            LEFT JOIN categories
                ON category_id = categories.id
            WHERE category_id = ?
            ORDER BY articles.date DESC            
        ", [$category_id]);

    }

    public static function find($id){
        return self::query(
            "SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
<<<<<<< HEAD
            WHERE articles.id = ?
            ", [$id], true);
=======
            WHERE articles.id = ?"
            
            , [$id], true);
>>>>>>> 731d51aea489a68f93abc088b27cda2eb3e5f335
    }


    public static function getLast(){
        return self::query(
            "SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            ORDER BY articles.date DESC
        ");
    }

    public function getExtrait(){
        $html ='<p>' . substr($this->contenu, 0, 250) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';

        return $html;
    }
}
