<?php session_start();
if(isset($_SESSION['ulogovan']))
{
	header("location:pocetna.php");
}
?>
<!DOCTYPE html>
<html lang="en">
		<head>
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>DR WEB APP ~ Login</title>
      <meta name="description" content="">
      <meta name="author" content="Dusan Rajkovic">
			<link href="images/logo.png" rel="icon" type="image/x-icon" />
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
			<link href="css/animate.css" rel="stylesheet" type="text/css" />
			<link href="css/aos.css" rel="stylesheet" type="text/css" />

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
      //LOGIN VALIDACIJA
      function formValidation()
      {
          var lozinka = document.logins.lozinka;
          var email = document.logins.email;

          if(ValidateEmail(email))
          {
          if(pass_validation(lozinka,7,12))
          {
              document.logins.submit();
              <?php
              if ($_SERVER['REQUEST_METHOD'] == 'POST')
              {

                  include("includes/connection.php");

                  $email=$_POST['email'];
                  $lozinka=$_POST['lozinka'];
                  $q="select * from korisnici where email='$email' and lozinka='$lozinka'";
                  $stmt = $conn->prepare($q);
                  $stmt->execute();

                  $row=$stmt->fetch();
                  if($row != null)
                  {
                        $_SESSION=array();
                        $_SESSION['ime_prezime']=$row['ime_prezime'];
                        $_SESSION['lozinka']=$row['lozinka'];
                        $_SESSION['email']=$row['email'];
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['ulogovan']=true;
                        header("location:pocetna.php");
                  }
                  else
                  {
                    $_SESSION['porukaf'] = "Korisnik sa unetim emailom i lozinkom ne postoji. Pokusajte ponovo.";
                  }
              }
              ?>
          }
          }
          return false;
      }
      function ValidateEmail(email)
      {
          var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          if(email.value.length == 0)
          {
              toastr.warning('Polje email mora biti popunjeno.', 'Warning',{timeOut: 8000, closeButton: true});
              email.focus();
              return false;
          }
          else if(!email.value.match(mailformat))
          {
              toastr.warning('Vaša email adresa nije u validnom formatu.', 'Warning',{timeOut: 8000, closeButton: true});
              email.focus();
              return false;
          }
          return true;
      }
      function pass_validation(lozinka,mx,my)
      {
          var lozinka_len = lozinka.value.length;
          if(lozinka_len == 0)
          {
              toastr.warning('Polje lozinka mora biti popunjeno.', 'Warning',{timeOut: 8000, closeButton: true});
              lozinka.focus();
              return false;
          }
          else if (lozinka_len >= my || lozinka_len < mx)
          {
              toastr.warning('Duzina lozinke mora biti\n izmedju 7 i 12 karaktera.', 'Warning',{timeOut: 8000, closeButton: true});
              lozinka.focus();
              return false;
          }
          return true;
      }
      </script>
		</head>

		<body class="animsition">

      <div class="page-wrapper">
              <div class="page-content--bge5">
                  <div class="container">
                      <div class="login-wrap">
                          <div class="login-content">
                              <div class="login-logo">
                                  <a href="#">
                                      <img src="images/logo.png" alt="" width="200" height="200">
                                  </a>
                              </div>
                              <div class="login-form">
                                  <form data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500" name="logins" method="POST">
                                    <?php if(isset($_SESSION['porukaf']))
                                    { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                      <strong>Greska:</strong>
                                      <p><?php echo $_SESSION['porukaf']; unset($_SESSION['porukaf']); ?></p>
                                    </div>
                                  <?php } ?>
                                      <div class="form-group">
                                          <label>Email Adresa</label>
                                          <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                      </div>
                                      <div class="form-group">
                                          <label>Lozinka</label>
                                          <input class="au-input au-input--full" type="password" name="lozinka" placeholder="Lozinka">
                                      </div>
                                      <button class="au-btn au-btn--block au-btn--green m-b-20" name="login" onclick="return formValidation();" type="submit">Login</button>
                                  </form>
                                  <p class="mt-5 mb-3 text-muted text-center">DR WEB APP &copy; 2019</p>
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
      <script src="js/aos.js"></script>
		  <script>
        AOS.init({
		      duration : 1000,
	       });
       </script>
		</body>
</html>
