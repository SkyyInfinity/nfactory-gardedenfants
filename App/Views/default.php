<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
	<!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Search Engine -->
    <meta name="description" content="max 156 caractères">
    <meta name="keywords" content="html,css,formation">
	<!-- Twitter Card -->
	<meta name="twitter:card" content="résumé">
	<meta name="twitter:title" content="title"/>
	<meta name="twitter:description" content="max 156 caractères"/>
	<meta name="twitter:image" content="https://com1pub.com/wp-content/uploads/2019/11/Composant-3-–-1-2.png"/>
	<!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>title | <?php if(isset($title)){echo $title;}else{echo 'undefined';} ?></title>
</head>

<body>
    <!-- HEADER -->
    <header id="l-header">
		
    </header>

    <!-- CONTENT -->
    <main id="l-content">
		<?= $content ?>
    </main>

    <!-- FOOTER -->
    <footer id="l-footer">

    </footer>

    <!-- JAVASCRIPT -->
    <script src="./assets/js/app.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>