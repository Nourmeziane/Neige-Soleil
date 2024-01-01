<?php
	session_start();
	require_once("controleur/controleur.class.php");
	//instanciation de la classe Controleur
	$unControleur = new Controleur (); 
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">	
	<?php
		if(!isset($_SESSION['email'])){
			require_once("vue/vue_connexion.php");

			if(isset($_POST['Connexion'])){
				$email = $_POST['email'];
				$mdp = $_POST['mdp'];
				$unUser = $unControleur->verifConnexion($email, $mdp);
				if($unUser != null){
					$_SESSION['email'] = $unUser['email'];
					$_SESSION['nom'] = $unUser['nom'];
					$_SESSION['prenom'] = $unUser['prenom'];
					$_SESSION['role'] = $unUser['role'];
					$unControleur->insertLogs("login");
					header("Location: index.php?page=1");
				} else {
					echo "<br> Logs incorrect.";
				}
			}
		}
	?>
	<title>Air France</title>
	<meta charset="utf-8">
</head>
<body>
<center>
	<?php if(isset($_SESSION['email'])){
	?>
	<h1> Air France Administration </h1>
	<a href="index.php?page=1"> 
			<img src="images/Logo-air-france.png" height="100" width="100"> </a>
	<a href="index.php?page=2"> 
			<img src="images/icone-avion.png" height="100" width="100"> </a>
	<a href="index.php?page=3"> 
			<img src="images/icone-pilote.png" height="100" width="100"> </a>
	<a href="index.php?page=4"> 
			<img src="images/icone-vol.png" height="100" width="100"> </a>
	<a href="index.php?page=5">
			<img src="images/deconnexion.jpeg" height="100" width="100"></a>

	<?php 
	}
	if (isset($_GET['page'])){
		if(isset($_SESSION['email'])){
			$page = $_GET['page'];
		} else {
			header('Location: index.php');
			exit();
		}
	}else {
		$page = 1; 
	}
	switch ($page){
		case 1 : require_once ("home.php"); break; 
		case 2 : require_once ("gestion_avion.php"); break; 
		case 3 : require_once ("gestion_pilote.php"); break; 
		case 4 : require_once ("gestion_vol.php"); break; 
		case 5 : 
			$unControleur->insertLogs("logoff");
			session_destroy();
			unset($_SESSION);
			header("Location: index.php");
			break;
		default : require_once("erreur.php"); break;
	}
	?>
</center>
</body>
</html>