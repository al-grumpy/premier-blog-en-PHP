<?php

namespace App\Model;

class Article
{
    private $id;
        
    private $title;
    
    private $chapo;
    
    private $content;
    
    private $author;
    
    private $date_added;

    private $date_maj;

    
    /**
    * @return mixed
    */
    public function getId()
    {
        return $this->id;
    }
    
    /**
    * @param mixed $id
    */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /** 
    * @return mixed
    */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
    * @param mixed $title
    */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
    * @return mixed
    */
    public function getChapo()
    {
        return $this->chapo;
    }
    
    /**
    * @param mixed $chapo
    */
    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
    }
    
    /**
    * @return mixed
    */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
    * @param mixed $content
    */
    public function setContent($content)
    {
        $this->content = $content;
    }
    
    /**
    * @return mixed
    */
    public function getAuthor()
    {
        return $this->author;
    }
    
    /**
    * @param mixed $author
    */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
    * @return mixed
    */
    public function getDateAdded()
    {
        return $this->date_added;
    }
    
    /**
    * @param mixed $date_added
    */
    public function setDateAdded($date_added)
    {
        $this->date_added = $date_added;
    }

    /**
    * @return mixed
    */
    public function getDateMaj()
    {
        return $this->date_maj;
    }
    
    /**
    * @param mixed $date_maj
    */
    public function setDateMaj($date_maj)
    {
        $this->date_maj = $date_maj;
    }
}