<?php

include "../../controller/VoyageC.php";
$vc=new VoyageC();
if (isset($_POST["id"])){
    $vc->delete($_POST["id"]);

    header('Location: listeVoyage.php');
}

 ?>