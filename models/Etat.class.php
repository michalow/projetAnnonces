<?php

class Annonce extends Model
{
    private $id;
    private $label;
    private $description;
    
    public function __construct($id, $label, $description){
        $this->id = $id;
        $this->label = $label;
        $this->description = $description;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getLabel(){
        return $this->label;
    }
    public function setLabel($label){
        $this->label = $label;
    }

    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }
}

?>