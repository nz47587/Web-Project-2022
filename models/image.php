<?php

class Image{
    private $id;
    private $file_name;
    private $uploaded_on;
    private $uploaded_by;

    function __construct($id, $file_name, $uploaded_on, $uploaded_by){
        $this->id=$id;
        $this->file_name=$file_name;
        $this->uploaded_on=$uploaded_on;
        $this->uploaded_by=$uploaded_by;
    }

    function getId(){
        return $this->id;
    }
    function getFile_Name(){
        return $this->file_name;
    }
    function getUploaded_On(){
        return $this->uploaded_on;
    }
    function getUploaded_By(){
        return $this->uploaded_by;
    }
}

?>
