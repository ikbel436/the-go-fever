<?PHP
include "../../controller/typeC.php";

$besoin=new typeC();
if (isset($_POST["id"])){
    $besoin->supprimerb($_POST["id"]);

    header('Location: listeType.php');
}

?>