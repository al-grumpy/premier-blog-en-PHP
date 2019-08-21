<?php

namespace App\Model;

class View
{
    private $file;
    private $title;
    
    public function render($template, $data = [])
    {
        $this->file = '../public/templates/'.$template.'.twig';
        $content = $this->renderFile($this->file, $data);
        $view = $this->renderFile('../public/templates/base.twig', [
            'title' => $this->title,
            'content' => $content
        ]);
        echo $view;
    }
    
    private function renderFile($file, $data)
    {
        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            
            return ob_get_clean();
        }
        else{
            echo 'Fichier inexistant';
        }
    }
}

