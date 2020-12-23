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


            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?php
                include"../../controller/typeC.php";
                $ti=new typeC();
                $listet=$ti->afficherb();
                ?>
                <div>
                    <form name ="form1" method="POST" action="voyageAjout.php">
                        <div class="form-group">
                            <label for="heureDepart">Heure depart</label>
                            <input type="time" class="form-control" name="heureDepart" id="heureDepart" >
                        </div>


                        <div class="form-group">
                            <label for="heureArrive">Heure arrive</label>
                            <input type="time" class="form-control" name="heureArrive" id="heureArrive" >
                        </div>
                        <div class="form-group">
                            <label for="dateDepart">Date depart</label>
                            <input type="date" class="form-control" name="dateDepart" onblur="verif1(this.form)" id="dateDepart" >
                            <script>
                                function verif1(form1)
                                {
                                    var dat=new Date();
                                    var day=dat.getDate().toString();
                                    var year=dat.getFullYear().toString();
                                    var month=dat.getMonth().toString();
                                    var date=form1.dateDepart.value;
                                    var y=date.substr(0,4);
                                    if(month.length==1 )
                                    { var m=parseInt(month)+1;
                                        var p=m.toString();
                                        month="0"+m;
                                    }else if(day.length==1)
                                    {day="0"+day;
                                    }
                                    var real=year+"-"+month+"-"+day;
                                    if (date<real) {

                                        alert(" date d'Ajout : une date passé");
                                    } else if(y!=year)
                                    {
                                        alert("Veuillez saisir l'année courante");
                                    }
                                }
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="dateArrive">Date arrive</label>
                            <input type="date" class="form-control" name="dateArrive" onblur="verif1(this.form)" id="dateArrive" >
                            <script>
                                function verif1(form1)
                                {
                                    var dat=new Date();
                                    var day=dat.getDate().toString();
                                    var year=dat.getFullYear().toString();
                                    var month=dat.getMonth().toString();
                                    var date=form1.dateArrive.value;
                                    var y=date.substr(0,4);
                                    if(month.length==1 )
                                    { var m=parseInt(month)+1;
                                        var p=m.toString();
                                        month="0"+m;
                                    }else if(day.length==1)
                                    {day="0"+day;
                                    }
                                    var real=year+"-"+month+"-"+day;
                                    if (date<real) {

                                        alert(" date d'Ajout : une date passé");
                                    } else if(y!=year)
                                    {
                                        alert("Veuillez saisir l'année courante");
                                    }
                                }
                            </script>
                        </div>

                        <div class="form-group">
                            <label for="nbrPlace">Nombre de place</label>
                            <input type="number" class="form-control" name="nbrPlace">
                        </div>
                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="number" class="form-control" name="prix">
                        </div>
                        <div class="form-group">
                            <label for="duree">Duree</label>
                            <input type="number" class="form-control" name="duree">
                        </div>

                        <div class="form-group">
                            <label for="description">Description </label>
                            <textarea class="form-control" name="description"> </textarea>
                        </div>

                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" name="ville">
                        </div>

                        <div class="form-group">

                        <select name="typee">
                            <?php
                            foreach($listet as $row) {
                            ?>
                            <option value="<?php  echo $row['id']; ?>">

                                <?php  echo $row['nom']; ?>
                            </option>
                            <?php
                            }
                            ?>
                        </select>
</div>
                        <button type="submit" value="Envoyer" onclick="test()" class="btn btn-primary">Submit</button>
                        <script>
                            function test()
                            {
                                var x = form1.heureDepart.value;
                                var email = form1.heureArrive.value;
                                var x2 = form1.dateDepart.value;
                                var x3 = form1.dateArrive.value;
                                var x5 = form1.nbrPlace.value;
                                var x6 = form1.prix.value;
                                var x8 = form1.duree.value;
                                var x9 = form1.description.value;
                                var x10 = form1.ville.value;
                                var x7 = form1.typee.value;

                                if (x.length == 0 || email.length == 0 || x2.length == 0 || x3.length == 0  || x5.length == 0 || x7.length == 0 || x6.length == 0 || x8.length == 0 || x9.length == 0 || x10.length == 0  ) {
                                    alert("erreur il faut remplir les informations");}

                                if (x2>x3)
                                    alert("Verifier les dates ajout et Modif");
                            }
                        </script>

                    </form>
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