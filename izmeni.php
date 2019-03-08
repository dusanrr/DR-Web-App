<?php session_start();

	include("includes/connection.php");
	$page = $_GET['page'];
	//IZMENA KORISNIKA
	if (isset($_POST['id']))
	{
		$kid = $_POST['id'];
		$ip = $_POST['imeprezime'];
		$email = $_POST['email'];
		$lozinka = $_POST['lozinka'];

		$query = "update korisnici set ime_prezime='{$ip}', email='{$email}', lozinka='{$lozinka}' where id='{$kid}'";
	  $stmt = $conn->prepare($query);
	  $stmt->execute();

		$_SESSION['porukas'] = "Uspesno ste izmenili korisnika.";
		header("Location: korisnik.php?page=".$page."");
	}

	//IZMENA MATERIJALA
	if (isset($_POST['mid']))
	{
		$mid = $_POST['mid'];
		$nm = $_POST['nm'];
		$stanje = $_POST['stanje'];

		$query = "update materijal set naziv='{$nm}', stanje='{$stanje}' where id='{$mid}'";
	  $stmt = $conn->prepare($query);
	  $stmt->execute();

		$_SESSION['porukas'] = "Uspesno ste izmenili materijal.";
		header("Location: pocetna.php?page=".$page."");
	}

	//IZMENA MATERIJALA U NEKOJ OD TRAFO STANICA
	if (isset($_POST['midtsb1']))
	{
		$midtsb1 = $_POST['midtsb1'];
		$mat = $_POST['mat'];
		$pkmd = $_POST['pkmd'];

		$ts = $_GET['ts'];

		if($mat == 0)
		{
			$query = "update tsmaterijal set potrebno_komada='{$pkmd}' where id='{$midtsb1}'";
		}
		else
		{
			$query = "update tsmaterijal set materijal_id='{$mat}', potrebno_komada='{$pkmd}' where id='{$midtsb1}'";
		}

	  $stmt = $conn->prepare($query);
	  $stmt->execute();

		$_SESSION['porukas'] = "Uspesno ste izmenili materijal u trafo stanici.";
		header("Location: ts.php?ts=".$ts."&page=".$page."");
	}
	//IZMENA TRAFO STANICE
	if (isset($_POST['tsid']))
	{
		$tsid = $_POST['tsid'];
		$nazivts = $_POST['nazivts'];

		$query = "update ts set naziv='{$nazivts}' where id='{$tsid}'";
	  $stmt = $conn->prepare($query);
	  $stmt->execute();

		$_SESSION['porukas'] = "Uspesno ste izmenili trafo stanicu.";
		header("Location: trafostanice.php?page=".$page."");
	}

	//IZMENA RADNIKA
	if (isset($_POST['rid']))
	{
		$rid = $_POST['rid'];
		$ip=$_POST['ip'];
		$satnica=$_POST['satnica'];
		$dani=$_POST['dani'];
		$tsati=$_POST['tsati'];
		$sati=$_POST['sati'];

		$radnisati=$tsati+$sati;
		$zarada = ($tsati+$sati)*$satnica;

		$query = "update radnici set imeprezime='{$ip}', satnica='{$satnica}', radni_dani='{$dani}', radni_sati='{$radnisati}', mesecna_zarada='{$zarada}'  where id='{$rid}'";
	  $stmt = $conn->prepare($query);
	  $stmt->execute();

		$_SESSION['porukas'] = "Uspesno ste izmenili radnika.";
		header("Location: radnici.php?page=".$page."");
	}

?>
