<?php
session_start();

    include("includes/connection.php");

    $email=$_POST['email'];
    $lozinka=$_POST['lozinka'];
    global $poruka = "";
    $q="select * from korisnici where email='$email' and lozinka='$lozinka'";
    $stmt = $conn->prepare($q);
    $stmt->execute();

    $row=$stmt->fetch();
    if($row != null)
    {
          $_SESSION=array();
          $_SESSION['imeprezime']=$row['ime_prezime'];
          $_SESSION['lozinka']=$row['lozinka'];
          $_SESSION['email']=$row['email'];
          $_SESSION['id'] = $row['id'];
          $_SESSION['ulogovan']=true;
          header("location:pocetna.php");
    }
    else
    {
      $poruka [] = "Korisnik sa unetim emailom i lozinkom ne postoji. Pokusajte ponovo.";
      header("location:index.php");
    }
?>
