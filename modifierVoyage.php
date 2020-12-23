
<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ajouter event</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <?php require_once 'sidebar.php';
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php require_once 'topbar.php';
            ?>

<?php

include  "../../entity/voyage.php";
include  "../../controller/VoyageC.php";
if(isset($_GET["id"]))
{
    $vc=new VoyageC();
    $result=$vc->recupererVoyage($_GET["id"]);
    foreach ($result as $row){


?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div>
                    <form method="post" >
                        <div class="form-group">
                            <label for="heureDepart">Heure depart</label>
                            <input type="time" class="form-control" name="heureDepart" id="heureDepart" value="<?php echo $row["heureDepart"]?>
                            " >
                        </div>


                        <div class="form-group">
                            <label for="heureArrive">Heure arrive</label>
                            <input type="time" class="form-control" name="heureArrive" id="heureArrive" value="<?php echo $row["heureArrive"]?>">
                        </div>
                        <div class="form-group">
                            <label for="dateDepart">Date depart</label>
                            <input type="date" class="form-control" name="dateDepart" id="dateDepart" value="<?php echo $row["dateDepart"]?>>
                        </div>
                        <div class="form-group">
                            <label for="dateArrive">Date arrive</label>
                            <input type="date" class="form-control" name="dateArrive" id="dateArrive" value="<?php echo $row["dateArrive"]?>>
                        </div>

                        <div class="form-group">
                            <label for="nbrPlace">Nombre de place</label>
                            <input type="number" class="form-control" name="nbrPlace" value="<?php echo $row["nbrPlace"]?>">
                        </div>
                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="number" class="form-control" name="prix" value="<?php echo $row["prix"]?>">
                        </div>
                        <div class="form-group">
                            <label for="duree">Duree</label>
                            <input type="number" class="form-control" name="duree" value="<?php echo $row["duree"]?>">
                        </div>

                        <div class="form-group">
                            <label for="description">Description </label>
                            <textarea class="form-control" name="description" > <?php echo $row["description"]?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" name="ville" value="<?php echo $row["ville"]?>">
                        </div>
                        <?php
                        include "../../controller/typeC.php";
                        $bc=new typeC();
                        $listeB=$bc->afficherb();
                        ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nom"> nom </label>
                                <div class="cal-icon">
                                    <select name="nom">
                                        <?php
                                        foreach ($listeB as $r)
                                        {
                                            ?>
                                            <option value="<?php echo $r['id'];?>"><?php echo $r['nom'];?></option>
                                        <?php }?>
                                </div>
                            </div>
                        </div>
<input type="submit" value="Envoyer" class="btn btn-primary" name="modifier" >
                        <input type="hidden" name="idi" value="<?PHP echo $row["id"];?>" >

                    </form>

<?php

}}
if (isset($_POST['modifier'])){
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
        $_POST['nom']
    );
    $vc->update($voyage,$_POST['idi']);

    header('Location: listeVoyage.php');
  //  var_dump($_POST['idi']);
    ob_end_flush();
}
?>

                </div>






            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>