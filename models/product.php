<?php

class Product{
    private $id;
    private $src;
    private $name;
    private $description;
    private $uploaded_on;
    private $uploaded_by;

    function __construct($id, $src, $name, $description, $uploaded_on, $uploaded_by){
        $this->id = $id;
        $this->src = $src;
        $this->name = $name;
        $this->description = $description;
        $this->uploaded_on = $uploaded_on;
        $this->uploaded_by = $uploaded_by;
    }

    function getId(){
        return $this->id;
    }
    function getSrc(){
        return $this->src;
    }
    function getName(){
        return $this->name;
    }
    function getDescription(){
        return $this->description;
    }
    function getUploaded_On(){
        return $this->uploaded_on;
    }
    function getUploaded_By(){
        return $this->uploaded_by;
    }
}

?>