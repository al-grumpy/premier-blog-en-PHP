<?php

class Article extends Database
{
    public function getArticles()
    {
        $sql = 'SELECT id, title, chapo, author, date_added FROM article ORDER BY id DESC';
        $result = $this->sql($sql);
        
        return $result;
    }
    
    public function getArticle($idArt)
    {
        $sql = 'SELECT id, title, content, author, date_added FROM article WHERE id = ?';
        $result = $this->sql($sql, [$idArt]);
        
        return $result;
    }
}