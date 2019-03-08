<?php session_start();
  if($_SESSION['ulogovan'] == false)
  {
    header("location:index.php");
  }

    include("includes/connection.php");

    $nid=$_GET['nid'];
    $page = $_GET['page'];
    $q="select * from kvarovi where ID='$nid'";
    $stmt = $conn->prepare($q);
    $stmt->execute();

    $row=$stmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="images/logo.png" rel="icon" type="image/x-icon" />
    <meta name="description" content="DR WEB APP">
    <meta name="author" content="Dusan Rajkovic">
    <meta name="keywords" content="DR WEB APP">

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <title>DR WEB APP</title>

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/toastr.min.css">

    <script src="vendor/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/toastr.min.js"></script>

    <style type="text/css" media="print">
      @page
      {
        size: auto;
        margin: 0;
      }
      @media print {
  a[href]:after {
    content: none !important;
  }
}
    </style>
</head>

<body class="animsition" style="background: #F3F6F9;" onload="window.print()">
    <div class="page-wrapper">
        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <div class="container">
              <div class="row" style="padding-top: 90px;">
                <img src="images/logo.png" class="rounded mx-auto d-block" style="width: 330px; height: 200px;">
              </div>
              <div class="row" style="padding-bottom: 100px; padding-top:100px;">
                <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-center">
                        <strong>Nalog</strong>
                    </div>
                    <div class="card-body card-block">
                        <form>
                          <?php if($row != null)
                					{
                            echo'
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Ime i prezime radnika</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="ip" readonly="true" class="form-control" value="'.$row['radnik'].'">
                                    <small class="form-text text-muted">Ime i prezime radnika</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label">Vozilo</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="satnica" class="form-control" readonly="true" value="'.$row['vozilo'].'">
                                    <small class="help-block form-text">Vozilo</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label">Registracioni broj</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="dani" class="form-control" readonly="true" value="'.$row['reg_broj'].'">
                                    <small class="help-block form-text">Registracioni broj</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label">Opis kvara</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea class="form-control" readonly="true" style="resize:none;">'.$row['opis'].'</textarea>
                                    <small class="help-block form-text">Opis kvara</small>
                                </div>
                            </div>
                            <div class="row form-group" style="padding-bottom:50px;">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label">Datum i vreme nastanka kvara</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="sati" readonly="true" class="form-control" value="'.$row['datum'].'  -  '.$row['vreme'].'">
                                    <small class="help-block form-text">Datum i vreme nastanka kvara</small>
                                </div>
                            </div>
                            <div class="row">
                               <div class="col-6" align="center">
                                   <div class="form-group">
                                       <label for="cc-exp" class="control-label mb-1">Potpis radnika</label>
                                       <input id="cc-exp" name="cc-exp" type="tel" class="form-control cc-exp" value="" data-val="true"
                                           autocomplete="cc-exp">
                                       <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                   </div>
                               </div>
                               <div class="col-6" align="center">
                                   <label for="x_card_code" class="control-label mb-1">Potpis rukovodioca</label>
                                   <div class="input-group">
                                       <input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc" value="" data-val="true" autocomplete="off">

                                   </div>
                               </div>
                           </div>
                            ';
                          } ?>
                    </div>
                    </form>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
