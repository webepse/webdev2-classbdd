<?php
namespace App;

class Article{

    public $id;
    public $title;
    public $content;
    public $creation_date;

    public function getURL(){
        return "index.php?action=article&id=".$this->id;
    }

    public function getExtrait(){
        $texte = strip_tags($this->content);
        if(preg_match("#(\w+\W+){20}\w+#s",$texte, $out)){
            $html = "<p class='card-text text-secondary mb-3 flex-grow-1'>".$out[0]."...</p><a href='".$this->getURL()."' class='btn btn-primary'>Voir la suite</a>";
        }else{
            $html = "<p class='card-text text-secondary mb-3 flex-grow-1'>".$texte."</p>";
        }

        return $html;
    }

    public function getDate(){
        $date = new \DateTime($this->creation_date);
        return $date->format("d - m - Y H\hi");
    }

}