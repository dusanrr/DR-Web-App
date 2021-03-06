<?php session_start();

  $ts = $_GET['ts'];

  if($_SESSION['ulogovan'] == false)
  {
    header("location:index.php");
  }

    include("includes/connection.php");

    $midb1=$_GET['midb1'];
    $ts = $_GET['ts'];
    $page = $_GET['page'];
    $qz="select * from tsmaterijal where tsid='$ts' and id='$midb1'";
    $stmtz = $conn->prepare($qz);
    $stmtz->execute();

    $row=$stmtz->fetch();

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

    <title>DR WEB APP ~ Kontrolna tabla</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

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
    <script type="text/javascript">
    //DODAVANJE MATERIJALA VALIDACIJA
    function formValidation()
    {
      var pkmd = document.imat.pkmd;

      if(allnumeric(pkmd))
      {
          document.imat.submit();
      }
      return false;
    }
    function allnumeric(pkmd)
    {
        var numbers = /^[0-9]+$/;
        if(pkmd.value.length == 0)
        {
            toastr.warning('Polje potrebno komada mora biti popunjeno.', 'Warning',{timeOut: 8000, closeButton: true});
            pkmd.focus();
            return false;
        }
        else if(!pkmd.value.match(numbers))
        {
            toastr.warning('Polje potrebno komada može sadržati samo brojeve.', 'Warning',{timeOut: 8000, closeButton: true});
            pkmd.focus();
            return false;
        }
        else if(pkmd.value < 1)
        {
            toastr.warning('Polje potrebno komada mora biti vece od 0.', 'Warning',{timeOut: 8000, closeButton: true});
            pkmd.focus();
            return false;
        }
        return true;
    }
    </script>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block bg-dark">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <img src="images/logo.png" alt="DALKOM" style="width: 70px; height: 50px;"/>
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                          <li>
                              <a href="pocetna.php">
                                  <i class="fa fa-home"></i>
                                  <span class="bot-line"></span>Pocetna</a>
                          </li>
                          <li>
                              <a href="radnici.php">
                                  <i class="fas fa-male"></i>
                                  <span class="bot-line"></span>Radnici</a>
                          </li>
                            <li class="has-sub">
                                <a href="trafostanice.php">
                                    <i class="far fa-building"></i>Trafo stanice <span class="badge badge-danger">3</span>
                                    <span class="bot-line"></span>
                                </a>
                                <ul class="header3-sub-list list-unstyled">
                                  <?php
                                  $tra="select * from ts";
                                  $stmtts = $conn->prepare($tra);
                                  $stmtts->execute();

                                  while(($rowm = $stmtts->fetch()))
                                  { ?>
                                    <li>
                                        <a href="ts.php?ts=<?php echo $rowm['id']; ?>">Trafo stanica - <?php echo $rowm['naziv'] ?></a>
                                    </li>
                                  <?php
                                  }
                                   ?>
                                </ul>
                            </li>
                            <li>
                                <a href="kvarovi.php">
                                    <i class="far fa-times-circle"></i>
                                    <span class="bot-line"></span>Kvarovi</a>
                            </li>
                            <li class="has-sub">
                                <a href="korisnik.php">
                                    <i class="far fa-user"></i>Korisnici
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="header__tool">
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="images/logo1.png" alt="<?php echo $_SESSION['ime_prezime'] ?>" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?php echo $_SESSION['ime_prezime'] ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="images/logo1.png" alt="<?php echo $_SESSION['ime_prezime'] ?>" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?php echo $_SESSION['ime_prezime'] ?></a>
                                            </h5>
                                            <span class="email"><?php echo $_SESSION['email'] ?></span>
                                        </div>
                                    </div>
                                    <!--<div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Profil</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Podesavanja</a>
                                        </div>
                                    </div>-->
                                    <div class="account-dropdown__footer">
                                        <a href="odjava.php">
                                            <i class="zmdi zmdi-power"></i>Odjavi se</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/logo1.png" alt="DALKOM" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="pocetna.php">
                                <i class="fa fa-home"></i>
                                <span class="bot-line"></span>Pocetna</a>
                        </li>
                        <li>
                            <a href="radnici.php">
                                <i class="fas fa-male"></i>
                                <span class="bot-line"></span>Radnici</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="trafostanice.php">
                                <i class="far fa-building"></i>Trafo stanice <span class="badge badge-danger">3</span></a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                              <?php
                              $tra="select * from ts";
                              $stmtts = $conn->prepare($tra);
                              $stmtts->execute();

                              while(($rowm = $stmtts->fetch()))
                              { ?>
                                <li>
                                    <a href="ts.php?ts=<?php echo $rowm['id']; ?>">Trafo stanica - <?php echo $rowm['naziv'] ?></a>
                                </li>
                              <?php
                              }
                               ?>
                            </ul>
                        </li>
                        <li>
                            <a href="kvarovi.php">
                                <i class="far fa-times-circle"></i>
                                <span class="bot-line"></span>Kvarovi</a>
                        </li>
                        <li class="has-sub">
                            <a href="korisnik.php">
                                <i class="far fa-user"></i>Korisnici
                                <span class="bot-line"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="sub-header-mobile-2 d-block d-lg-none">
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="images/logo1.png" alt="<?php echo $_SESSION['ime_prezime'] ?>" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['ime_prezime'] ?></a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="images/logo1.png" alt="<?php echo $_SESSION['ime_prezime'] ?>" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#"><?php echo $_SESSION['ime_prezime'] ?></a>
                                    </h5>
                                    <span class="email"><?php echo $_SESSION['email'] ?></span>
                                </div>
                            </div>
                            <!--<div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-account"></i>Profil</a>
                                </div>
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-settings"></i>Podesavanja</a>
                                </div>
                            </div>-->
                            <div class="account-dropdown__footer">
                                <a href="odjava.php">
                                    <i class="zmdi zmdi-power"></i>Odjavi se</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">Navigacija:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="pocetna.php">Admin</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Izmena materijala trafo stanice</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Dobrodosli
                                <span><?php echo $_SESSION['ime_prezime'] ?>!</span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

                <div class="container">

                  <!-- ALERT-->
                  <section class="alert-wrap p-t-70 p-b-70">
                    <?php if(isset($_SESSION['porukaf']))
                    { ?>
                      <div class="alert au-alert-danger alert-dismissible fade show au-alert danger au-alert--70per" role="alert">
                          <i class="zmdi zmdi-check-circle"></i>
                          <span class="content"><?php echo $_SESSION['porukaf']; unset($_SESSION['porukaf']); ?></span>
                          <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">
                                  <i class="zmdi zmdi-close-circle"></i>
                              </span>
                          </button>
                      </div>
                  <?php } ?>
                  <?php if(isset($_SESSION['porukas']))
                  { ?>
                    <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
                        <i class="zmdi zmdi-check-circle"></i>
                        <span class="content"><?php echo $_SESSION['porukas']; unset($_SESSION['porukas']); ?></span>
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="zmdi zmdi-close-circle"></i>
                            </span>
                        </button>
                    </div>
                <?php } ?>
                  </select>
                    <!-- END ALERT-->
                </div>

            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-center">
                        <strong>Izmena materijala Trafo Stanica </strong>
                    </div>
                    <div class="card-body card-block">

                          <?php if($row != null)
                					{
                            echo'<form action="izmeni.php?page='.$page.'&ts='.$ts.'" method="post" name="imat" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label hidden="true" class=" form-control-label">ID</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="midtsb1" hidden="true" class="form-control" value="'.$row['id'].'">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Naziv materijala</label>
                                </div>';
                                ?>
                                <?php
                                include("includes/connection.php");

                                $qb="select * from tsmaterijal where id='$midb1'";
                                $stmtb = $conn->prepare($qb);
                                $stmtb->execute();

                                $rowb=$stmtb->fetch();

                                $qr="select * from materijal where id=".$rowb['materijal_id'] ."";
                                $stm = $conn->prepare($qr);
                                $stm->execute();

                                $rowa=$stm->fetch();



                                $qq="select * from materijal";
                                $stmq = $conn->prepare($qq);
                                $stmq->execute();

                                $rowq=$stmq->fetch();

                                 ?>
                                 <?php
                                echo '<div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="nm" disabled class="form-control" value="'.$rowa['naziv'].'">
                                    <small class="form-text text-muted">Naziv materijala</small>
                                </div>
                            </div>';
                            ?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Promeni materijal</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="mat" class="form-control">
                                      <option value="0"></option>
                                        <?php


                                        while($rowq=$stmq->fetch())
                                        {
                                          echo '<option value="'.$rowq['id'].'">'.$rowq['naziv'].'</option>';
                                        }
                                         ?>
                                    </select>
                                </div>
                            </div>
                            <?php
                            echo '<div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label">Potrebno komada</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="pkmd" class="form-control" value="'.$row['potrebno_komada'].'">
                                    <small class="help-block form-text">Potrebno komada</small>
                                </div>
                            </div>';
                          } ?>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="imtsb1" onclick="return formValidation();" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Potvrdi
                        </button>
                    </div>
                    </form>
                </div>
            </div>
            </div>
            </div>

            <!-- COPYRIGHT-->
                <div class="row bg-dark fixed-bottom" style="height:50px; margin-top:100px;">
                    <div class="col-md-12 bg-dark">
                        <div class="copyright text-white">
                            <p class="text-white">Copyright © 2019 DR WEB APP</p>
                        </div>
                    </div>
                </div>
            <!-- END COPYRIGHT-->
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
