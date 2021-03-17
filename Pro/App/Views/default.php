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
    <link rel="stylesheet" href="./Public/assets/css/style.min.css">
    <link rel="stylesheet" href="./Public/assets/css/main.css">
    <title><?php if(isset($title)){echo $title;}else{echo 'undefined';} ?></title>
</head>

<body>
    <!-- HEADER -->
    <header id="proHeader">
        <nav class="proNav">
            <ul>
                <li><a href="../">Partie Particulier</a></li>
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
    <!-- JAVASCRIPT -->
    <script src="./Public/assets/js/loader.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>