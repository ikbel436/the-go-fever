<?php

include "../../entity/Voyage.php";
include "../../controller/VoyageC.php";
$VC = new VoyageC();
if (
    isset($_POST["heureDepart"]) &&
    isset($_POST["heureArrive"]) &&
    isset($_POST["dateArrive"]) &&
    isset($_POST["dateDepart"])&&
    isset($_POST["duree"])&&
    isset($_POST["prix"])&&
    isset($_POST["description"])&&
    isset($_POST["ville"]) &&
    $_POST["nbrPlace"]!=null and
   $_POST["typee"]!=null

) {
    if (
        !empty($_POST["heureDepart"]) &&
        !empty($_POST["heureArrive"]) &&
        !empty($_POST["dateDepart"]) &&
        !empty($_POST["dateArrive"]) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["duree"]) &&
        !empty($_POST["ville"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["nbrPlace"]) &&
        !empty($_POST["typee"])

    ) {
        $voyage = new Voyage(
            $_POST['heureDepart'],
            $_POST['heureArrive'],
            $_POST['dateDepart'],
            $_POST['dateArrive'],
            $_POST['prix'],
            $_POST['description'],
            $_POST['ville'],
            $_POST['duree'],
            $_POST['nbrPlace'],
            $_POST['typee']
        );
        $VC->ajouterVoyage($voyage);
        header('location:listeVoyage.php');
        // var_dump( $voyage);
        //console.log($voyage);
    }
}  else
       header('location:AjoutVoyage.php');
    //echo "problem !!";


?>
