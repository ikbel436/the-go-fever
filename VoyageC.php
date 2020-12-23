<?php

require_once "config.php";

class VoyageC
{


    function ajouterVoyage($voyage)
    {
        $sql = "insert into voyage (heureDepart,heureArrive,dateDepart,dateArrive,prix,duree,nbrPlace,description,ville,idType) values (:heureDepart,:heureArrive,:dateDepart,:dateArrive,:prix,:duree,:nbrPlace,:description,:ville,:idType)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
           // $req->bindValue(':id', $voyage->getid());
            $req->bindValue(':heureDepart', $voyage->getHeureDepart());
            $req->bindValue(':heureArrive', $voyage->getHeureArrive());
            $req->bindValue(':dateDepart', $voyage->getDateDepart());
            $req->bindValue(':dateArrive', $voyage->getDateArrive());

            $req->bindValue(':prix', $voyage->getPrix());
            $req->bindValue(':duree', $voyage->getDuree());
            $req->bindValue(':nbrPlace', $voyage->getNbrPlace());
            $req->bindValue(':description', $voyage->getDescription());
            $req->bindValue(':ville', $voyage->getVille());
            $req->bindValue(':idType',$voyage-> getidType());
            $req->execute();

        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    function afficher()
    {
        $sql="SELECT * from voyage";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }}
    function afficherC()
    {
        $sql = "SELECT a.*,b.nom  from voyage  a inner join  type  b on a.idType = b.id";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' .$e->getMessage());
        }
    }
function delete($id)
{	$sql="DELETE FROM voyage where id= :id";
    $db = config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':id',$id);
    try{
        $req->execute();
        // header('Location: index.php');
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
   }
    function recupererVoyage($id){
        $sql="SELECT * from voyage where id=$id";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function getvoybyville($ville) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'SELECT a.*,b.nom  from Voyage a inner join type  b on a.idtype = b.id  WHERE ville = :ville'
            );
            $query->execute([
                'ville' => $ville
            ]);
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function rechercher($ville) {
        $sql = "SELECT * from Voyage where ville=:ville";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'ville' => $ville->getVille(),
            ]);
            $result = $query->fetchAll();
            return $result;
        }
        catch (PDOException $e) {
            $e->getMessage();
        }


    }
    function triec(){
        $sql = "SELECT a.*,b.nom  from voyage  a inner join type  b on a.idtype = b.id  order by ville asc ";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
function update($voyage ,$id)
{try {
    $db = config::getConnexion();
    $query = $db->prepare(
        'UPDATE voyage SET 
						heureDepart = :heureDepart, 
						heureArrive = :heureArrive,
						dateDepart = :dateDepart,
						dateArrive = :dateArrive,
						prix=:prix,
						duree = :duree,
						nbrPlace=:nbrPlace,
						description=:description,
						ville=:ville,
						idType=:idType
					WHERE id = :id'
    );

    $query->execute([
        'heureDepart'=>$voyage->getheureDepart(),
        'heureArrive'=>$voyage->getHeureArrive(),
        'dateDepart'=>$voyage->getDateDepart(),
        'dateArrive'=>$voyage->getDateArrive(),
        'prix'=>$voyage->getPrix(),
        'duree'=>$voyage->getDuree(),
        'nbrPlace'=>$voyage->getNbrPlace(),
        'description'=>$voyage->getDescription(),
        'ville'=>$voyage->getVille(),
        'idType'=>$voyage->getidType(),

        'id'=>$id
    ]);
    echo $query->rowCount() . " records UPDATED successfully <br>";
} catch (PDOException $e) {
    $e->getMessage();
}

}

}






