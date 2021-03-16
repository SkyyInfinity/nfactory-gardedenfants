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
    <title>title | <?php if(isset($title)){echo $title;}else{echo 'undefined';} ?></title>
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
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Connexion</a></li>
                    <li><a href="#">Inscription</a></li>
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

    </footer>

    <!-- JAVASCRIPT -->
    <script src="./assets/js/loader.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>