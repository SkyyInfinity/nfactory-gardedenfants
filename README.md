Projet NFactory School Kid'oma
=============

Bienvenue sur le code source du projet Kid'oma !

Le projet à pour but de mettre en relation des particuliers voulant faire garder leurs enfants avec des professionnels de la garde d'enfants qui souhaitent proposer leurs services.
Ce projet est programmé en HTML, CSS, PHP, JS et MySQL pour la gestion des bases de données.


Crédits
--------

Kid'oma utilise les librairies suivantes:

* [Mapbox](https://www.mapbox.com/) (Geolocalisation)
* [geo.api.gouv (API Adresse)](https://geo.api.gouv.fr/) (Geolocalisation)
* [Font Awesome](https://fontawesome.com/) (Icônes)
* [Tippy.js](https://atomiks.github.io/tippyjs/) (Tooltips)
* [Parallax.js](https://matthew.wagerfield.com/parallax/) (Parallax)
* [Overlay Scrollbars](https://kingsora.github.io/OverlayScrollbars/#!overview) (Scrollbar)


Installation
----------------------

Si vous voulez installer ce prototype sur votre PC ou MAC, veuillez suivre ses indications:


1. Télécharger le code source en .zip via **"Code"** en haut à droite et ensuite **"Download ZIP"**.

2. Installer la base de données `(kidoma.sql)` sur votre application de gestions de base de données, par exemple **PHPMyAdmin**.
  
3. Vous rentre dans les deux fichier `.htaccess` (le second est dans le dossier "Pro") et changer les urls, comme ceci:

```html
RewriteEngine on

RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^/?([a-zA-Z]+)/([0-9]+)$ /your/path/here/Public/?page=$1&id=$2 [L]
RewriteRule ^/?([a-zA-Z]+)$ /your/path/here/Public/?page=$1 [L]
RewriteRule ^/?()$ /your/path/here/Public/index.php [L]
```
 
4. Modifier le fichier `url.php` dans `Public/inc/` , comme ceci:

```html
<?php 
define('URL', 'http://localhost/your/path/here/');
```

5. Ensuite vous pouvez explorer le site en toute tranquillité ! :)


Remerciements
---------------------------

Merci à la [NFactory School](https://nfactory.school/) de nous avoir proposer ce projet pour améliorer nos compétences.

