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
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./Public/assets/css/style.min.css">
    <title>title | <?php if(isset($title)){echo $title;}else{echo 'undefined';} ?></title>
</head>

<body>
    <!-- LOADER -->
    <div id="loader">
        <img src="./Public/assets/img/loader.gif" alt="loading image">
    </div>
    <!-- HEADER -->
    <header id="l-header">
		<div class="wrap">
            <nav>
                <ul>
<<<<<<< HEAD
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Connexion</a></li>
                    <li><a href="#">Inscription</a></li>
                    <li><a href="../Pro/Public/index.php">Partie Pro</a></li>
=======
                    <li><a href="./">Accueil</a></li>
                    <li><a href="login">Connexion</a></li>
                    <li><a href="signup">Inscription</a></li>
>>>>>>> 8ec177ca2d035105ab8fcdae6fd40464fbeb61eb
                </ul>
            </nav>
        </div>
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
    <script src="./Public/assets/js/loader.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>