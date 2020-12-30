<?php
include "ajouterannonce.php";

$annonces = new annonceC();

if (isset($_POST['idannonce'])) {
    $annonces->supprimerannonce($_POST['idannonce']);
    header('location:../views/back/ModifierAnnonce.php');
} else {
    echo 'Erreur : try again';
    echo $_POST['idannonce'];
}