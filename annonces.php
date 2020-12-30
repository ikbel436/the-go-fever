<?php

class annonce
{
    private $titre;
    private $description;
    private $image;
    private $commentaire;




    public function getidannonce()
    {
        return $this->idannonce;
    }

    public function gettitre()
    {
        return $this->titre;
    }
    public function getdescription()
    {
        return $this->description;
    }
    public function getimage()
    {
        return $this->image;
    }
    public function getcommentaire()
    {
        return $this->commentaire;
    }
    public function getUrlImage()
    {
        return $this->urlImage;
    }

    public function settitre($titre)
    {
        $this->titre = $titre;
    }
    public function setdescription($description)
    {
        $this->description = $description;
    }
    public function setimage($image)
    {
        $this->image = $image;
    }
    public function setcommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }


    public function __construct($titre, $description, $image, $commentaire)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->image = $image;
        $this->commentaire = $commentaire;

    }
}
