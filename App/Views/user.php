<?php
if(empty($_SESSION['user'])) {
    redirect('home');
}

if(date('H') >= 17) {
    $hello = 'Bonsoir';
} else {
    $hello = 'Bonjour';
}

$title = 'Acceuil Utilisateur'; 
?>

<h2>Bienvenue <?php echo $_SESSION['user']->name . ' ' . $_SESSION['user']->surname;?></h2>

<p>Votre profil est complété à 0%</p>

<h2>Vos garderies favorites</h2>

<h2>Vos nounous favorites</h2>

<h2>Etablisements à proximité</h2>

<div id='map' style='width: 100%; height: 600px;'></div>



