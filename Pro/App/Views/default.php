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
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <!-- FullCalendar -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.min.css">
    <link rel="stylesheet" href="./Public/assets/css/style.min.css">
    <link rel="stylesheet" href="./Public/assets/css/style.css">
    <link rel="stylesheet" href="./Public/assets/css/main.css">
    <title><?php if(isset($title)){echo $title;}else{echo 'undefined';} ?></title>
</head>

<body>
    <!-- HEADER -->
    <header id="proHeader">
        <nav class="proNav">
            <ul>
                <li><a href="../">Partie Particulier</a></li>
                <li><a href="./home">Accueil</a></li>
                <?php if(!empty($_SESSION['user']['email'])) : ?>
                <li><a href="./Dashboard">Mon espace</a></li>
                <?php endif; ?>
                <?php if(!empty($_SESSION['user']['email']) && $_SESSION['user']['type'] === 'nursery') : ?>
                <li><a href="./logoutNursery">Deconnexion</a></li>
                <?php endif; ?>
                <?php if(!empty($_SESSION['user']['email']) && $_SESSION['user']['type'] === 'nounou') : ?>
                <li><a href="./logoutNounou">Deconnexion</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <div class="logoPro">
            <img src=".\Public\assets\img\logo_without_text.svg" alt="" >            
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
    <!-- BOOSTRAP -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <!-- JAVASCRIPT -->
    <script src="./Public/assets/js/loader.js" type="text/javascript" charset="utf-8"></script>
    <script src="./Public/assets/js/main.js" type="text/javascript" charset="utf-8"></script>
    <!-- FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.min.js"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/0e818bc5f3.js" crossorigin="anonymous"></script>
</body>
</html>