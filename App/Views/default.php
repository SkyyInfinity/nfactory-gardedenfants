<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
	<!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Search Engine -->
    <meta name="description" content="max 156 caractères">
    <meta name="keywords" content="html,css,formation">
	<!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.min.css">
    <title>Kid'oma | <?php if(isset($title)){echo $title;}else{echo 'undefined';} ?></title>
</head>

<body>
    <!-- LOADER -->
    <div id="loader">
        <img src="./assets/img/loader.gif" alt="loading image">

    </div>
    <!-- HEADER -->
    <header id="l-header">
		<div class="wrap">
            <nav>
                <!-- <ul>
                <li><a href="index.php" class="nav-link">Acceuil</a></li>
            <?php if(isset($_SESSION["user"])): ?>
                <li><a href="index.php?page=userSettings&id=".$>Paramètre</a></li>
                <li><a href="index.php?page=logout">Déconnexion</a></li>
            <?php else: ?>
                <li><a href="index.php?page=registration">Inscription</a></li>
                <li><a href="index.php?page=login">Connexion</a></li>
            <?php endif; ?>
                </ul>
            </nav>
        </div> -->
                <div id="js_hamburger" class="hamburger">
                    <div class="bar top"></div>
                    <div class="bar middle"></div>
                    <div class="bar bottom"></div>
                </div>
                <div class="right-links">
                    <ul>
                        <?php if(isset($_SESSION["user"])): ?>
                            <li><a href="index.php?page=logout">Déconnexion</a></li>
                        <?php else: ?>
                            <li><a href="index.php?page=registration">Inscription</a></li>
                            <li><a href="index.php?page=login">Connexion</a></li>
                        <?php endif; ?>
                        <li><a href="./"><img src="./Public/assets/img/logo_without_text.svg" alt="logo du site"></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <ul id="js_nav-links" class="nav-links">
            <li><a href="./">Accueil</a></li>
            <li><a href="./Pro">Partie Pro</a></li>
            <li><a href="contact">Contact</a></li>
        </ul>
    </header>

    <!-- CONTENT -->
    <main id="l-content">
		<?= $content ?>
    </main>

    <!-- FOOTER -->
    <footer id="l-footer">
        <div class="wrap">
            <p>&copy; Copyright Kidoma 2021 | Tous droits réservés</p>
        </div>
    </footer>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JAVASCRIPT -->
    <script src="./assets/js/userAjax.js" type="text/javascript" charset="utf-8"></script>
    <script src="./assets/js/loader.js" type="text/javascript" charset="utf-8"></script>
    <script src="./assets/js/hamburger.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>