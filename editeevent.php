<?php
include "../../controller/ajouterevent.php";
include_once "../../model/events.php";


$eventC = new eventC();
$error = "";
if (
    isset($_POST["nomevent"]) &&
    isset($_POST["nbrplace"]) &&
    isset($_POST["imageevent"]) &&
    isset($_POST["descriptionevent"]) 
) {
    if (
        !empty($_POST["nomevent"]) &&
        !empty($_POST["nbrplace"]) &&
        !empty($_POST["imageevent"]) &&
        !empty($_POST["descriptionevent"])

    ) {
        $event = new event(
            $_POST['nomevent'],
            $_POST['nbrplace'],
            $_POST['imageevent'],
            $_POST['descriptionevent']

        );
        $eventC->modifierevent($event, $_GET['idevent']);
       // header('Location:../front/');
    } else
        echo "Missing information";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editer event</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
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

                <div id="error">
                    <?php echo $error; ?>
                </div>

                <?php
                if (isset($_GET['idevent'])) {
                    $event = $eventC->recupererevent($_GET['idevent']);
                ?>


                    <div class="container-fluid">

                        <div>
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="idevent">idevent</label>
                                    <input type="text" class="form-control" name="idevent" id="idevent" value="<?php echo $event['idevent']; ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="nomevent">nomevent</label>
                                    <input type="text" class="form-control" name="nomevent" id="nomevent" value="<?php echo $event['nomevent']; ?> ">
                                </div>


                                <div class="form-group">
                                    <label for="nbrplace">nbr places </label>
                                    <input type="number" class="form-control" name="nbrplace" rows="10" <?php echo $event['nbrplace']; ?> >
                                </div>

                                <div class="form-group">
                                    <label for="imageevent">imageevent</label>
                                    <input type="file" class="form-control-file"  name="imageevent" value="<?php echo $event['imageevent']; ?> ">
                                </div>
                                <div class="form-group">
                                    <label for="descriptionevent">descriptionevent</label>
                                    <textarea type="text" class="form-control" name="descriptionevent" ><?php echo $event['descriptionevent']; ?> </textarea>
                                </div>
                         





                                <button type="submit" value="Envoyer" class="btn btn-primary">Submit</button>

                            </form>
                        </div>
                        <script>
                            CKEDITOR.replace('descriptionevent');
                        </script>






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
<?php
                } else {
                    echo "errorrrr ";
                }
?>
</body>

</html>