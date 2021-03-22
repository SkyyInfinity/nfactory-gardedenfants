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
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/all.css" integrity="sha256-5a0xpHkTzfwkcKzU4wSYL64rzPYgmIVf7PO4TB5/6jQ=" crossorigin="anonymous">
    <!-- MAPBOX -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
    <!-- OVERLAYSCROLLBAR -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/css/OverlayScrollbars.min.css" integrity="sha512-jN4O0AUkRmE6Jwc8la2I5iBmS+tCDcfUd1eq8nrZIBnDKTmCp5YxxNN1/aetnAH32qT+dDbk1aGhhoaw5cJNlw==" crossorigin="anonymous" />
    <!-- MY STYLESHEET -->
    <link rel="stylesheet" href="./Public/assets/css/style.css">
    <title>Kid'oma | <?php if(isset($title)){echo $title;}else{echo 'undefined';} ?></title>
</head>

<body data-simplebar>
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
                            <?php if ($title == 'Mon compte') : ?>
                                <li><a class="btn" href="user">Mon espace</a></li>
                                <li><a class="btn" href="logout">Déconnexion</a></li>
                            <?php else : ?>
                                <li><a class="btn" href="account">Mon Compte</a></li>
                                <li><a class="btn" href="logout">Déconnexion</a></li>
                            <?php endif; ?>
                        <?php else : ?>
                            <?php if ($title == 'Inscription') : ?>
                                <li><a class="btn" href="./">Accueil</a></li>
                                <li><a class="btn" href="login">Connexion</a></li>
                            <?php elseif ($title == 'Connexion') : ?>
                                <li><a class="btn" href="./">Accueil</a></li>
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
            <?php if (isset($_SESSION["user"])) : ?>
                <?php if ($title == 'Mon compte') : ?>
                    <li><a href="user">Mon espace</a></li>
                    <li><a href="logout">Déconnexion</a></li>
                <?php else : ?>
                    <li><a href="account">Mon compte</a></li>
                    <li><a href="logout">Déconnexion</a></li>
                <?php endif ?>
            <?php else : ?>
                <li><a href="./">Accueil</a></li>
                <li><a href="Pro">Espace Pro</a></li>
            <?php endif ?>
            <li><a href="mention-legales">Mentions légales</a></li>
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
                    <a id="js_accountBtn" class="account-btn" aria-describedby="tooltip" href="account"><img class="avatar" src="./Public/assets/img/profile.svg" alt="avatar"></a>
                    <a id="js_logoutBtn" class="logout-btn" aria-describedby="tooltip" href="logout"><i class="fas fa-sign-out-alt"></i></a>
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

    <!-- JAVASCRIPT -->
    <!-- JQUERY (Library) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- MAPBOX (maps) -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <!-- PARALLAX JS (parallax) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js" type="text/javascript" charset="utf-8"></script>
    <!-- TIPPY JS (Tooltips) -->
    <script src="https://unpkg.com/@popperjs/core@2" type="text/javascript" charset="utf-8"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <!-- OVERLAYSCROLLBAR -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/OverlayScrollbars.min.js" integrity="sha512-B1xv1CqZlvaOobTbSiJWbRO2iM0iii3wQ/LWnXWJJxKfvIRRJa910sVmyZeOrvI854sLDsFCuFHh4urASj+qgw==" crossorigin="anonymous"></script>
    <!-- OUR SCRIPTS -->
    <script src="./Public/assets/js/UserAjax.js" type="text/javascript" charset="utf-8"></script>
    <script src="./Public/assets/js/loader.js" type="text/javascript" charset="utf-8"></script>
    <script src="./Public/assets/js/hamburger.js" type="text/javascript" charset="utf-8"></script>
    <?php if ($title == 'Mon espace') : ?>
        <script src="./Public/assets/js/mapbox.js" type="text/javascript" charset="utf-8"></script>
    <?php endif; ?>
    <script src="./Public/assets/js/parallax.js" type="text/javascript" charset="utf-8"></script>
    <script src="./Public/assets/js/tooltip.js" type="text/javascript" charset="utf-8"></script>
    <script src="./Public/assets/js/overlayScrollBar.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>