<?php

namespace App\DAO;

use App\Model\Comment;

class CommentDAO extends DAO
{
    //Récupération des commentaires liés à un article
    public function getCommentsFromArticle($idArt)
    {
        $sql = 'SELECT id, pseudo, content, date_added FROM comment WHERE article_id = ? AND confirmed = 1';
        $result = $this->sql($sql, [$idArt]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        
        return $comments;
    }
    
    //Fonction pour insérer des commentaires dans la BDD
    public function addComment($comment)
    {
        if(!empty($_POST))
        {
            //Permet de recuperer les variables
            extract($comment);
            $sql = 'INSERT INTO comment (article_id, pseudo, content, date_added, confirmed) VALUES (?, ?, ?,  NOW(), 0)';
            $this->sql($sql, [$article_id, $pseudo, $content]); 

        }

    }

    public function getCommentsCheckFromArticle($idArt)
    {
        $sql = 'SELECT id, pseudo, content, date_added FROM comment WHERE article_id = ? AND confirmed = 0';
        $result = $this->sql($sql, [$idArt]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        
        return $comments;
    }

    public function checkComment($comment)
    {
        extract($comment);
        $sql = 'UPDATE comment SET confirmed = 1 WHERE id = ?';
        $this->sql($sql, [$confirmed]);
    }
    
    private function buildObject(array $row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setDateAdded($row['date_added']);
        
        return $comment;
    }
}