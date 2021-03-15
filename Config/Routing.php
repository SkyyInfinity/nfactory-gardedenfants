<?php

// use App\Controller\ConnectionController;

// $connection = new ConnectionController();

if (isset($_GET['page']) && $_GET['page'] == 'singup') {
    $connection->signup();
} elseif (isset($_GET['page']) && $_GET['page'] == 'login') {
    $connection->login();
} elseif (isset($_GET['page']) && $_GET['page'] == 'logout') {
    $connection->logout();
} elseif (isset($_GET['page']) && $_GET['page'] == 'removeUser') {
    $connection->removeUser();
}

/**
 * Créer routing
 * Dans controller proposer des url de base.
 */

/**
 * Au téléchargement si juste back-end envoyer sauvegarde comme ça. Prévoir dans le controller les url des templates à appeler.
 * Ajouter dans notice quelles routes appeler
 * 
 * Si ajout template, adapter template à routing et incorporer les url dans les controller
 * 
 * Si ajout d'autres modules prévoir script qui incorpore les diférrents modules et donc modifier routing et url de pages pour chaque site
 */