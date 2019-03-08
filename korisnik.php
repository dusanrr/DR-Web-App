<?php session_start();
  if($_SESSION['ulogovan'] == false)
  {
    header("location:index.php");
  }
  include("includes/connection.php");
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

                                  while(($row = $stmtts->fetch()))
                                  { ?>
                                    <li>
                                        <a href="ts.php?ts=<?php echo $row['id'] ?>">Trafo stanica - <?php echo $row['naziv'] ?></a>
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

                              while(($row = $stmtts->fetch()))
                              { ?>
                                <li>
                                    <a href="ts.php?ts=<?php echo $row['id'] ?>">Trafo stanica - <?php echo $row['naziv'] ?></a>
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
                                        <li class="list-inline-item">Korisnici</li>
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
                  <!-- STATISTIC-->
                  <section class="statistic statistic2">
                      <div class="container">
                          <div class="row justify-content-center">
                              <div class="col-md-6 col-lg-6">
                                  <div class="statistic__item statistic__item--orange">
                                    <?php
                                    include("includes/connection.php");

                                    $query="select count(*) as total from korisnici";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute();

                                    $totalrow = $stmt->fetch();
                                    echo '<h2 class="number">'.$totalrow['total'].'</h2>';
                                     ?>

                                      <span class="desc">Ukupno korisnika</span>
                                      <div class="icon">
                                          <i class="zmdi zmdi-account-o"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </section>
                  <!-- END STATISTIC-->

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

                  <!-- DATA TABLE-->
                  <section class="p-t-20">
                      <div class="container">
                          <div class="row">
                              <div class="col-md-12">
                                  <h3 class="title-5 m-b-35">Korisnici</h3>
                                  <div class="table-data__tool">
                                      <div class="table-data__tool-left">
                                          <!--<div class="rs-select2--light rs-select2--md">
                                              <select class="js-select2" name="property">
                                                  <option selected="selected">All Properties</option>
                                                  <option value="">Option 1</option>
                                                  <option value="">Option 2</option>
                                              </select>
                                              <div class="dropDownSelect2"></div>
                                          </div>
                                          <div class="rs-select2--light rs-select2--sm">
                                              <select class="js-select2" name="time">
                                                  <option selected="selected">Today</option>
                                                  <option value="">3 Days</option>
                                                  <option value="">1 Week</option>
                                              </select>
                                              <div class="dropDownSelect2"></div>
                                          </div>
                                          <button class="au-btn-filter">
                                              <i class="zmdi zmdi-filter-list"></i>filters</button>-->
                                      </div>
                                      <div class="table-data__tool-right">
                                          <a href="kkorisnika.php" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                              <i class="zmdi zmdi-plus"></i>Kreiraj korisnika</a>
                                          <!--<div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                              <select class="js-select2" name="type">
                                                  <option selected="selected">Export</option>
                                                  <option value="">Option 1</option>
                                                  <option value="">Option 2</option>
                                              </select>
                                              <div class="dropDownSelect2"></div>
                                          </div>-->
                                      </div>
                                  </div>
                                  <div class="table-responsive table-responsive-data2" style="margin-bottom: 50px;">
                                      <table class="table table-data2">
                                          <thead>
                                              <tr>
                                                  <!--<th>
                                                      <label class="au-checkbox">
                                                          <input type="checkbox">
                                                          <span class="au-checkmark"></span>
                                                      </label>
                                                  </th>-->
                                                  <th>ID</th>
                                                  <th>Ime i prezime</th>
                                                  <th>Email</th>
                                                  <th>Lozinka</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                              include("includes/connection.php");

                                              $totalq="select count(*) \"total\" from korisnici";
                                              $stmt = $conn->prepare($totalq);
                                              $stmt->execute();

                                              $totalrow = $stmt->fetch();

                                            	$page_per_page=10;
                                            	$page_total_rec=$totalrow['total'];
                                            	$page_total_page=ceil($page_total_rec/$page_per_page);


                                            	if(!isset($_GET['page']))
                                            	{
                                            		$page_current_page=1;
                                            	}
                                            	else
                                            	{
                                            		$page_current_page=$_GET['page'];
                                            	}


                                              $k=($page_current_page-1)*$page_per_page;

                                        			$query="select * from korisnici LIMIT ".$k .",".$page_per_page;
                                              $stmt = $conn->prepare($query);
                                              $stmt->execute();

                                              $count = 0;
                                              while(($row = $stmt->fetch()))
                                              {
                                                echo '  <tr class="tr-shadow">
                                                      <td><span class="badge badge-danger" style="width:25px; height:18px;">'.$row['id'].'</span></td>
                                                      <td class="desc">'.$row['ime_prezime'].'</td>
                                                      <td>
                                                          <span class="block-email">'.$row['email'].'</span>
                                                      </td>
                                                      <td class="desc">'.$row['lozinka'].'</td>
                                                      <td>
                                                          <div class="table-data-feature">
                                                              <a href="izmenakorisnika.php?kid='.$row['id'].'&page='.$page_current_page.'" class="item" data-toggle="tooltip" data-placement="top" title="Izmeni">
                                                                  <i class="zmdi zmdi-edit"></i>
                                                              </a>
                                                              <a href="obrisi.php?kid='.$row['id'].'&page='.$page_current_page.'" class="item" data-toggle="tooltip" data-placement="top" title="Obrisi">
                                                                  <i class="zmdi zmdi-delete"></i>
                                                              </a>
                                                          </div>
                                                      </td>
                                                  </tr>
                                                  <tr class="spacer"></tr>';
                                                $count++;
                                              }
                                              ?>
                                          </tbody>
                                      </table>
                                      <!-- PAGINATION-->
                                      <nav style="margin-top:50px;">
                                        <ul class="pagination justify-content-center">
                                  			<?php  if($page_total_page>$page_current_page)
                                        {

                                          echo '<li class="page-item">
                                            <a class="page-link" href="korisnik.php?page='.($page_current_page+1).'">Napred</a>
                                          </li>';
                                        }
                                  			for($i=1;$i<=$page_total_page;$i++)
                                        {
                                          ?>
                                          <li <?php if ($page_current_page == $i) { echo ' class="page-item active"'; } ?>><a class="page-link" href="korisnik.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                          <?php
                                        }
                                        if($page_current_page>1)
                                        {
                                          echo'<li class="page-item">
                                            <a class="page-link" href="korisnik.php?page='.($page_current_page-1).'">Nazad</a>
                                          </li>';
                                   } ?>
                                        </ul>
                                      </nav>
                                      <!-- END PAGINATION-->
                                  </div>
                              </div>
                          </div>
                      </div>
                  </section>
                  <!-- END DATA TABLE-->
                </div>

            <!-- COPYRIGHT-->
                <div class="row bg-dark" style="height:50px;">
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
