<?php 
    session_start();
    require_once 'config.php'; 
   
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }

   
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vipers Compta - Accueil</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    
    <div class="navbar">

        <img class="logo-image" src="img/Vipers PNG.png" alt="Logo Vipers">

        
        <button class="navbar-button" onclick="redirigerVers('accueil.php')">Accueil</button>
        <button class="navbar-button" onclick="redirigerVers('calendrier.php')">Calendrier</button>
        <button class="navbar-button" onclick="redirigerVers('membre.php')">Membres</button>
        <button class="navbar-button" onclick="redirigerVers('idc.php')">Indépendant du crime</button>
        <button class="navbar-button" onclick="redirigerVers('agangs.php')">Autres Gangs</button>
        <button class="navbar-button" onclick="redirigerVers('entreprises.php')">Entreprises</button>
        <button class="navbar-button" onclick="redirigerVers('armes.php')">Armements</button>
        <button class="navbar-button" onclick="redirigerVers('accueil.php')">Statistiques</button>
        <button class="navbar-button" onclick="redirigerVers('contact.php')">Répertoire</button>
		<button class="navbar-button" onclick="redirigerVers('landing.php')">Mon compte</button>
        <button class="navbar-button" onclick="redirigerVers('deconnexion.php')">Se déconnecter</button>
    </div>
    
    <script>
        
        function redirigerVers(url) {
            window.location.href = url;
        }
    </script>
</body>
</html>
