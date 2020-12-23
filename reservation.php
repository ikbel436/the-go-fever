<?php

class reservation
{

    private $id;
    private $date;
    private $nbrPlace;
    private $etat;
    private $idVoyage;
    function __construct($date,$nbrPlace,$etat,$idVoyage)
    {
       // $this->id=$id;
        $this->date=$date;
        $this->nbrPlace=$nbrPlace;
        $this->etat=$etat;
        $this->idVoyage=$idVoyage;
    }
   /* function getid()
    {
        return $this->id;

    }
    function setid($id)
    {
        $this->id=$id;

    }*/
    function getdate()
    {
        return $this->date;

    }
    function setdate($date)
    {
        $this->date=$date;

    }
    function getnbrPlace()
    {
        return $this->nbrPlace;
    }
    function setnbrPlace($nbrPlace)
    {
        $this->nbrPlace=$nbrPlace;

    }
    function getetat()
    {
        return $this->etat;
    }
    function  setetat($etat)
    {
        $this->etat=$etat;

    }

    function  getidVoyage()
    {
        return $this->idVoyage;
    }
    function setidVoyage($idVaoyage)
    {$this->idVoyage=$idVoyage;
    }


}
?>