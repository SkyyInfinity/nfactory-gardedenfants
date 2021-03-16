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
                <li><a href="index.php" class="nav-link">Acceuil</a></li>
                <?php if(isset($_SESSION["user"])): ?>
                <li><a href="index.php?page=logout" class="nav-link">Déconnexion</a></li>
            <?php else: ?>
                <li><a href="index.php?page=registration" class="nav-link">Inscription</a></li>
                <li><a href="index.php?page=login" class="nav-link">Connexion</a></li>
            <?php endif; ?>
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

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JAVASCRIPT -->
    <script src="./assets/js/loader.js" type="text/javascript" charset="utf-8"></script>
    <script src="./assets/js/userAjax.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>