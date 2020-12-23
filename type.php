<?php
class type

{
    private $id;
    private   $nom;
    private  $description;


    function __construct($id,$nom,$description ){
        $this->id=$id;
        $this->nom=$nom;
        $this->description=$description;
    }
    public function getid()
    {
        return $this->id;
    }
    public function setid($id)
    {
        $this->id = $id;

        return $this;
    }
    function getnom()
    {
        return $this->nom;
    }
    function getdescription()
    {
        return $this->description;
    }
    function setnom($nom)
    {
        $this->nom=$nom;
    }

    function setdescription($description)
    {
        $this->description=$description;
    }

}
?>