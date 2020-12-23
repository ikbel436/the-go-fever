<?php
include "../../entity/type.php";
include "../../controller/typeC.php";

if (isset($_POST['id']) ){

    $typeC = new  typeC();
    $type = new type($_POST['id'],$_POST['nom'],$_POST['description']
    );

    $typeC->ajouterb($type);
    header('Location: listeType.php');
//var_dump($besoin);
}


?>