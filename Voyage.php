<?php

class Voyage
{

    private $id;
    private $heureDepart;
    private $heureArrive;
    private $dateDepart;
    private $dateArrive;
    private $prix;
    private $duree;
    private $nbrPlace;
    private $description;
    private $ville;
    private $idType;
    function __construct($heureDepart,$heureArrive,$dateDepart,$dateArrive,$prix,$description,$ville,$duree,$nbrPlace,$idType)
    {
       // $this->id=$id;
        $this->heureDepart=$heureDepart;
        $this->heureArrive=$heureArrive;
        $this->dateDepart=$dateDepart;
        $this->dateArrive=$dateArrive;
        $this->prix=$prix;
        $this->description=$description;
        $this->ville=$ville;
        $this->duree=$duree;
        $this->nbrPlace=$nbrPlace;
        $this->idType=$idType;
    }
   /* function getid()
    {
        return $this->id;

    }
    function setid($id)
    {
        $this->id=$id;

    }*/
    function getheureDepart()
    {
        return $this->heureDepart;

    }
    function setHeureDepart($heureDepart)
    {
        $this->heureDepart=$heureDepart;

    }
    function getHeureArrive()
    {
        return $this->heureArrive;
    }
    function setHeureArrive($heureArrive)
    {
        $this->heureArrive=$heureArrive;

    }
    function getDateDepart()
    {
        return $this->dateDepart;
    }
    function  setDateDepart($dateDepart)
    {
        $this->dateDepart=$dateDepart;

    }
    function getDateArrive()
    {
        return $this->dateArrive;
    }
    function  setDateArrive($dateArrive)
    {
        $this->dateArrive=$dateArrive;

    }

    function getPrix()
    {
        return $this->prix;
    }
    function  setPrix($prix)
    {
        $this->prix=$prix;
    }

    function  getDuree()
    {
        return $this->duree;
    }
    function setDuree($duree)
    {
        $this->duree=$duree;
    }
    function getNbrPlace()
    {
        return $this->nbrPlace;
    }
    function  setNbrPlace($nbrPlace)
    {
        $this->nbrPlace=$nbrPlace;
    }

    function  getDescription()
    {
        return $this->description;
    }
    function  setDescription($description)
    {$this->description=$description;
    }
    function  getVille()
    {
        return $this->ville;

    }
    function  setVille($ville)
    {$this->ville=$ville;
    }
    function  getidType()
    {
        return $this->idType;
    }
    function setidType($idType)
    {$this->idType=$idType;
    }


}
?>