<?php

require_once "config.php";

class reservationC
{


    function ajouterReservation($reservation)
    {
        $sql = "insert into reservation (date,nbrPlace,etat,idVoyage) values (:date,:nbrPlace,:etat,:idVoyage)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
           // $req->bindValue(':id', $voyage->getid());
            $req->bindValue(':date', $reservation->getdate());
            $req->bindValue(':nbrPlace', $reservation->getnbrPlace());
            $req->bindValue(':etat', $reservation->getetat());
            $req->bindValue(':idVoyage', $reservation->getidVoyage());

            $req->execute();

        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    function afficher()
    {
        $sql="SELECT * from reservation";
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
        $sql = "SELECT a.*,b.nom  from reservation  a inner join type  b on a.idVoyage = b.id";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' .$e->getMessage());
        }
    }
function delete($id)
{	$sql="DELETE FROM reservation where id= :id";
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
    function recupererReservation($id){
        $sql="SELECT * from reservation where id=$id";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
function update($reservation ,$id)
{try {
    $db = config::getConnexion();
    $query = $db->prepare(
        'UPDATE reservation SET 
						date = :date, 
						nbrPlace = :nbrPlace,
						etat = :etat,
						idVoyage= :idVoyage
					WHERE id = :id'
    );

    $query->execute([
        'date'=>$reservation->getdate(),
        'nbrPlace'=>$reservation->getnbrPlace(),
        'etat'=>$reservation->getetat(),
        'idVoyage'=>$reservation->getidVoyage(),
        'id'=>$id
    ]);
    echo $query->rowCount() . " records UPDATED successfully <br>";
} catch (PDOException $e) {
    $e->getMessage();
}

}

}






