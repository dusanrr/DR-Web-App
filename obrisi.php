<?php session_start();

	$ts = $_GET['ts'];
	$page = $_GET['page'];

	include("includes/connection.php");

	//BRISANJE KORISNIKA
	if (isset($_GET['kid']))
	{
		$kid = $_GET['kid'];

		$query = "delete from korisnici where id='$kid'";
		$conn->exec($query);

		$_SESSION['porukas'] = "Uspesno ste obrisali korisnika.";
		header("Location: korisnik.php?page=".$page."");
	}

	//BRISANJE MATERIJALA
	if (isset($_GET['mid']))
	{
		$mid = $_GET['mid'];

		$query = "delete from materijal where id='$mid'";
		$conn->exec($query);

		$_SESSION['porukas'] = "Uspesno ste obrisali materijal.";
		header("Location: pocetna.php?page=".$page."");
	}

	//BRISANJE MATERIJALA IZ NEKE OD TRAFO STANICA
	if (isset($_GET['midb1']))
	{
		$midb1 = $_GET['midb1'];

		$query = "delete from tsmaterijal where id='$midb1'";
		$conn->exec($query);

		$_SESSION['porukas'] = "Uspesno ste obrisali materijal iz trafo stanice.";
		header("Location: ts.php?ts=".$ts."&page=".$page."");
	}
	//BRISANJE TRAFO STANICA
	if (isset($_GET['tsid']))
	{
		$tsid = $_GET['tsid'];

		$query = "delete from ts where id='$tsid'";
		$conn->exec($query);

		$_SESSION['porukas'] = "Uspesno ste obrisali trafo stanicu.";
		header("Location: trafostanice.php?page=".$page."");
	}

	//BRISANJE RADNIKA
	if (isset($_GET['rid']))
	{
		$rid = $_GET['rid'];

		$query = "delete from radnici where id='$rid'";
		$conn->exec($query);

		$_SESSION['porukas'] = "Uspesno ste obrisali radnika.";
		header("Location: radnici.php?page=".$page."");
	}

	//BRISANJE NALOGA
	//BRISANJE RADNIKA
	if (isset($_GET['nid']))
	{
		$nid = $_GET['nid'];

		$query = "delete from kvarovi where ID='$nid'";
		$conn->exec($query);

		$_SESSION['porukas'] = "Uspesno ste obrisali nalog.";
		header("Location: kvarovi.php?page=".$page."");
	}

?>
