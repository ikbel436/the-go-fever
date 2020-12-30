<?php
include "ajouterevent.php";

$events = new eventC();

if (isset($_POST['idevent'])) {
    $events->supprimerevent($_POST['idevent']);
    header('location:../views/back/ModifierEvent.php');
} else {
    echo 'Erreur : try again';
    echo $_POST['idevent'];
}
