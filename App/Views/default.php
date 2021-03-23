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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/all.css" integrity="sha256-5a0xpHkTzfwkcKzU4wSYL64rzPYgmIVf7PO4TB5/6jQ=" crossorigin="anonymous">
    <link rel="stylesheet" href="./Public/assets/css/style.css">
    <title>Kid'oma | <?php if(isset($title)){echo $title;}else{echo 'undefined';} ?></title>
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
                <div id="js_hamburger" class="hamburger">
                    <div class="bar top"></div>
                    <div class="bar middle"></div>
                    <div class="bar bottom"></div>
                </div>
                <div class="right-links">
                    <ul>
                        <?php if (isset($_SESSION["user"])) : ?>
                            <?php if ($title == 'Compte') : ?>
                                <li><a class="btn" href="home">Accueil</a></li>
                                <li><a class="btn" href="logout">Déconnexion</a></li>
                            <?php else : ?>
                                <li><a class="btn" href="account">Mon Compte</a></li>
                                <li><a class="btn" href="logout">Déconnexion</a></li>
                            <?php endif; ?> 

                        <?php else : ?>
                            <?php if ($title == 'Inscription') : ?>
                                <li><a class="btn" href="home">Acceuil</a></li>
                                <li><a class="btn" href="login">Connexion</a></li>
                            <?php elseif ($title == 'Connexion') : ?>
                                <li><a class="btn" href="home">Acceuil</a></li>
                                <li><a class="btn" href="signup">Inscription</a></li>
                            <?php else : ?>
                                <li><a class="btn" href="signup">Inscription</a></li>
                                <li><a class="btn" href="login">Connexion</a></li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li><a class="logo" href="./"><img src="./Public/assets/img/logo_without_text.svg" alt="logo du site"></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <ul id="js_nav-links" class="nav-links">
            <li><a href="./">Accueil</a></li>
            <li><a href="Pro">Partie Pro</a></li>
            <li><a href="contact">Contact</a></li>
        </ul>
        <div class="wrap">
            <?php if (isset($_SESSION['user'])) : ?>
            <div class="user-card">
                <p><?= helloTime() ?>
                    <span><?php echo $_SESSION['user']->name . ' ' . $_SESSION['user']->surname; ?></span>
                </p>
                <?php
                // echo $_SESSION['user']->picture 
                ?>
                <img class="avatar" src="./Public/assets/img/profile.svg" alt="avatar">
            </div>
            <?php endif; ?>
            <div class="clear"></div>
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
    <!-- MapBox -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
    <!-- PARALLAX JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <!-- JAVASCRIPT -->
    <script src="./Public/assets/js/UserAjax.js" type="text/javascript" charset="utf-8"></script>
    <script src="./Public/assets/js/loader.js" type="text/javascript" charset="utf-8"></script>
    <script src="./Public/assets/js/hamburger.js" type="text/javascript" charset="utf-8"></script>
    <?php if ($title == 'Acceuil Utilisateur') : ?>
        <script src="./Public/assets/js/mapbox.js" type="text/javascript" charset="utf-8"></script>
    <?php endif; ?>

    <script src="./Public/assets/js/parallax.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>