<?php

namespace App\src\DAO;

use App\src\model\Article;

class ArticleDAO extends DAO
{
    public function getArticles()
    {
        $sql = 'SELECT id, title, chapo, content, author, date_added FROM article ORDER BY id DESC';
        $result = $this->sql($sql);
        $articles = [];
        foreach ($result as $row) {
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        
        return $articles;
    }
    
    public function getArticle($idArt)
    {
        $sql = 'SELECT id, title, chapo, content, author, date_added FROM article WHERE id = ?';
        $result = $this->sql($sql, [$idArt]);
        $row = $result->fetch();
        if($row) {
            return $this->buildObject($row);
        } else {
            echo 'Aucun article existant avec cet identifiant';
        }
    }
    
    public function addArticle($article)
    {
        //Permet de recuperer les variables $title, $content et $author
        extract($article);
        $sql = 'INSERT INTO article (title, chapo, content, author, date_added) VALUES (?, ?, ?, ?, NOW())';
        $this->sql($sql, [$title, $chapo, $content, $author]);
    }

    private function buildObject(array $row)
    {
        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setChapo($row['chapo']);
        $article->setContent($row['content']);
        $article->setAuthor($row['author']);
        $article->setDateAdded($row['date_added']);
        
        return $article;
    }
}